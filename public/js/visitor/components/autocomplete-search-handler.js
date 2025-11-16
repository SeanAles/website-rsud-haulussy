/**
 * Autocomplete Search Handler with Dropdown Functionality
 * Extended version of SidebarSearchHandler with dropdown results
 *
 * Usage:
 * const autocompleteSearch = new AutocompleteSearchHandler({
 *   searchInputId: 'sidebarArticleSearchInput',
 *   dropdownId: 'articleSearchDropdown',
 *   clearButtonId: 'sidebarArticleClearSearch',
 *   statusId: 'sidebarArticleSearchStatus',
 *   searchEndpoint: '/artikel/autocomplete',
 *   listEndpoint: '/artikel', // For "See all results"
 *   contentType: 'artikel',
 *   minSearchLength: 2,
 *   debounceDelay: 200
 * });
 */

class AutocompleteSearchHandler {
    constructor(options) {
        // Validate required options
        if (!options || !options.searchInputId || !options.dropdownId) {
            console.error('Missing required options for AutocompleteSearchHandler');
            throw new Error('searchInputId and dropdownId are required');
        }

        this.config = {
            debounceDelay: 200, // Faster for autocomplete
            minSearchLength: 2,
            maxResults: 5,
            ...options
        };

        this.typingTimer = null;
        this.currentSearchTerm = '';
        this.isDropdownOpen = false;
        this.keyboardHighlightedIndex = -1;
        this.searchResults = [];

        try {
            this.initElements();
            this.initEventListeners();
            this.initializeState();
        } catch (error) {
            console.error('AutocompleteSearchHandler initialization failed');
            throw error;
        }
    }

    initElements() {
        // Check if jQuery is available
        if (typeof $ === 'undefined') {
            throw new Error('jQuery is not available - make sure jQuery is loaded before this script');
        }

        // Find and validate required elements
        this.searchInput = $(`#${this.config.searchInputId}`);
        this.dropdown = $(`#${this.config.dropdownId}`);

        if (this.searchInput.length === 0) {
            throw new Error(`Search input element not found: #${this.config.searchInputId}`);
        }

        if (this.dropdown.length === 0) {
            throw new Error(`Dropdown element not found: #${this.config.dropdownId}`);
        }

        // Find optional elements (they may not exist, and that's okay)
        this.clearButton = $(`#${this.config.clearButtonId}`);
        this.statusElement = $(`#${this.config.statusId}`);
        this.resultsContainer = this.dropdown.find(`#${this.config.dropdownId}Results`);
        this.loadingContainer = this.dropdown.find(`#${this.config.dropdownId}Loading`);
        this.noResultsContainer = this.dropdown.find(`#${this.config.dropdownId}NoResults`);
        this.seeAllButton = this.dropdown.find(`#${this.config.dropdownId}SeeAll`);
        this.itemTemplate = $(`#${this.config.dropdownId}ItemTemplate`);
    }

    initializeState() {
        // Initialize clear button visibility
        if (this.searchInput.val().length > 0) {
            this.clearButton.css('display', 'flex');
            this.searchInput.addClass('has-content');
        } else {
            this.clearButton.hide();
            this.searchInput.removeClass('has-content');
        }
    }

    initEventListeners() {
        // Search input events
        this.searchInput.on('keyup', (e) => {
            this.handleKeyup(e);
        });

        this.searchInput.on('keydown', (e) => {
            this.handleKeydown(e);
        });

        this.searchInput.on('focus', () => {
            this.handleFocus();
        });

        this.searchInput.on('blur', () => {
            this.handleBlur();
        });

        // Clear button
        this.clearButton.on('click', () => this.handleClear());

        // See all results button
        this.seeAllButton.on('click', () => this.handleSeeAll());

        // Click outside to close dropdown
        $(document).on('click', (e) => this.handleDocumentClick(e));

        // Handle window resize for responsive positioning
        $(window).on('resize', () => this.handleResize());

        // Prevent form submission if wrapped in form
        this.searchInput.closest('form').on('submit', (e) => {
            e.preventDefault();
            this.performSearchRedirect();
        });
    }

    handleKeyup(e) {
        // Skip if it's a navigation key
        if ([38, 40, 13, 27, 9].includes(e.which)) {
            return;
        }

        clearTimeout(this.typingTimer);

        // Update clear button visibility
        if (this.searchInput.val().length > 0) {
            this.clearButton.css('display', 'flex');
            this.searchInput.addClass('has-content');
        } else {
            this.clearButton.hide();
            this.searchInput.removeClass('has-content');
        }

        const searchTerm = this.searchInput.val().trim();

        if (searchTerm.length >= this.config.minSearchLength || searchTerm.length === 0) {
            this.typingTimer = setTimeout(() => {
                this.performAutocompleteSearch(searchTerm);
            }, this.config.debounceDelay);
        } else {
            this.hideDropdown();
        }
    }

    handleKeydown(e) {
        const items = this.dropdown.find('.search-dropdown-item');

        switch (e.which) {
            case 38: // Arrow Up
                e.preventDefault();
                this.navigateKeyboard(-1, items);
                break;

            case 40: // Arrow Down
                e.preventDefault();
                this.navigateKeyboard(1, items);
                break;

            case 13: // Enter
                e.preventDefault();
                if (this.keyboardHighlightedIndex >= 0) {
                    this.selectHighlightedItem(items);
                } else {
                    this.performSearchRedirect();
                }
                break;

            case 27: // Escape
                e.preventDefault();
                this.hideDropdown();
                this.searchInput.blur();
                break;

            case 9: // Tab
                this.hideDropdown();
                break;
        }
    }

    handleFocus() {
        const searchTerm = this.searchInput.val().trim();
        if (searchTerm.length >= this.config.minSearchLength) {
            this.showDropdown();
            if (this.searchResults.length > 0) {
                this.displayResults(this.searchResults);
            }
        }
    }

    handleBlur() {
        // Delay hiding to allow clicking on dropdown items
        setTimeout(() => {
            if (!this.dropdown.is(':hover')) {
                this.hideDropdown();
            }
        }, 200);
    }

    handleClear() {
        this.searchInput.val('');
        this.searchInput.removeClass('has-content');
        this.clearButton.hide();
        this.hideDropdown();
        this.searchResults = [];
        this.hideStatus();
    }

    handleSeeAll() {
        this.performSearchRedirect();
    }

    handleDocumentClick(e) {
        // Check if click is outside the search container
        if (!$(e.target).closest(this.searchInput).length &&
            !$(e.target).closest(this.dropdown).length) {
            this.hideDropdown();
        }
    }

    handleResize() {
        if (this.isDropdownOpen) {
            this.positionDropdown();
        }
    }

    navigateKeyboard(direction, items) {
        if (items.length === 0) return;

        // Remove previous highlight
        items.removeClass('keyboard-highlight');

        // Calculate new index
        this.keyboardHighlightedIndex += direction;

        // Wrap around
        if (this.keyboardHighlightedIndex < 0) {
            this.keyboardHighlightedIndex = items.length - 1;
        } else if (this.keyboardHighlightedIndex >= items.length) {
            this.keyboardHighlightedIndex = 0;
        }

        // Highlight new item
        $(items[this.keyboardHighlightedIndex]).addClass('keyboard-highlight');

        // Scroll into view if needed
        const highlightedItem = $(items[this.keyboardHighlightedIndex]);
        const container = this.resultsContainer;
        const itemTop = highlightedItem.position().top;
        const itemBottom = itemTop + highlightedItem.outerHeight();
        const containerTop = container.scrollTop();
        const containerBottom = containerTop + container.height();

        if (itemTop < 0) {
            container.scrollTop(containerTop + itemTop);
        } else if (itemBottom > containerBottom) {
            container.scrollTop(containerTop + itemBottom - containerBottom);
        }
    }

    selectHighlightedItem(items) {
        if (this.keyboardHighlightedIndex >= 0 && this.keyboardHighlightedIndex < items.length) {
            const item = $(items[this.keyboardHighlightedIndex]);
            const url = item.data('url');
            if (url) {
                window.location.href = url;
            }
        }
    }

    performAutocompleteSearch(searchTerm) {
        if (searchTerm === this.currentSearchTerm) {
            return;
        }
        this.currentSearchTerm = searchTerm;

        if (searchTerm.length < this.config.minSearchLength) {
            this.hideDropdown();
            return;
        }

        if (!this.config.searchEndpoint) {
            this.showStatus('Search endpoint tidak dikonfigurasi', 'error');
            return;
        }

        this.showLoading();

        $.ajax({
            url: this.config.searchEndpoint,
            type: 'GET',
            data: { search: searchTerm },
            dataType: 'json',
            timeout: 5000,
            success: (response) => {
                this.handleSearchSuccess(response);
            },
            error: (xhr, status, error) => {
                // Progressive enhancement: fallback to redirect for critical errors
                if (status === 'timeout' || status === 'error') {
                    this.showStatus('Server tidak merespons, mencoba search lengkap...', 'warning');
                    setTimeout(() => {
                        this.performSearchRedirect();
                    }, 1500);
                } else {
                    this.handleSearchError(xhr, status, error);
                }
            }
        });
    }

    performSearchRedirect() {
        const searchTerm = this.searchInput.val().trim();
        if (searchTerm.length >= this.config.minSearchLength) {
            window.location.href = `${this.config.listEndpoint}?search=${encodeURIComponent(searchTerm)}`;
        }
    }

    handleSearchSuccess(response) {
        // Validate response format
        if (!Array.isArray(response)) {
            this.showStatus('Format respons tidak valid', 'error');
            return;
        }

        // Check for error objects in response
        if (response.length > 0 && response[0].error) {
            this.showStatus(response[0].error, 'error');
            return;
        }

        this.searchResults = response;
        this.showDropdown();

        if (response.length > 0) {
            this.displayResults(response);
        } else {
            this.showNoResults();
        }
    }

    handleSearchError(xhr, status, error) {
        let errorMessage = 'Terjadi kesalahan saat mencari';

        if (xhr.status === 500) {
            errorMessage = 'Server error, coba lagi nanti';
        } else if (xhr.status === 404) {
            errorMessage = 'Fitur search tidak tersedia';
        } else if (xhr.status === 403) {
            errorMessage = 'Tidak memiliki akses';
        } else if (status === 'timeout') {
            errorMessage = 'Server terlalu lambat merespons';
        } else if (status === 'error') {
            errorMessage = 'Koneksi internet bermasalah';
        }

        this.hideDropdown();
        this.showStatus(errorMessage, 'error');

        // Auto-hide error message after 3 seconds
        setTimeout(() => {
            this.hideStatus();
        }, 3000);
    }

    displayResults(results) {
        this.resultsContainer.empty();
        this.loadingContainer.hide();
        this.noResultsContainer.hide();
        this.seeAllButton.show();

        const template = this.itemTemplate.html();

        results.forEach((item, index) => {
            const itemHtml = template
                .replace(/src=""/g, `src="${this.getImageUrl(item.thumbnail)}"`)
                .replace(/alt=""/g, `alt="${item.title}"`)
                .replace(/<div class="dropdown-item-title"><\/div>/g,
                    `<div class="dropdown-item-title">${this.escapeHtml(item.title)}</div>`)
                .replace(/<span class="date-text"><\/span>/g,
                    `<span class="date-text">${item.created_at}</span>`)
                .replace(/<span class="views-text"><\/span>/g,
                    `<span class="views-text">${this.formatNumber(item.views)}</span>`);

            const $item = $(itemHtml)
                .attr('data-url', item.url)
                .attr('data-index', index)
                .attr('tabindex', '0')
                .attr('role', 'option');

            // Add image error handling
            $item.find('.dropdown-item-img').on('error', function() {
                $(this).attr('src', '/images/placeholder-thumb.jpg');
                $(this).attr('onerror', null); // Prevent infinite loop
            });

            // Add click handler
            $item.on('click', () => {
                window.location.href = item.url;
            });

            this.resultsContainer.append($item);
        });

        this.keyboardHighlightedIndex = -1;
    }

    showNoResults() {
        this.resultsContainer.empty();
        this.loadingContainer.hide();
        this.noResultsContainer.show();
        this.seeAllButton.hide();
    }

    showLoading() {
        if (!this.isDropdownOpen) {
            this.showDropdown();
        }
        this.resultsContainer.empty();
        this.noResultsContainer.hide();
        this.seeAllButton.hide();
        this.loadingContainer.show();
    }

    showDropdown() {
        if (this.isDropdownOpen) {
            return;
        }

        this.isDropdownOpen = true;
        this.positionDropdown();
        this.dropdown.addClass('show');

        // Force a reflow to ensure CSS transitions work
        this.dropdown[0].offsetHeight;
    }

    hideDropdown() {
        if (!this.isDropdownOpen) {
            return;
        }

        this.isDropdownOpen = false;
        this.dropdown.removeClass('show');
        this.keyboardHighlightedIndex = -1;
    }

    positionDropdown() {
        const inputRect = this.searchInput[0].getBoundingClientRect();
        const isMobile = window.innerWidth <= 768;

        if (isMobile) {
            // Mobile positioning dengan proper width
            this.dropdown.css({
                position: 'fixed',
                top: 'auto',
                left: '0',
                right: '0',
                bottom: '0',
                width: '100vw',
                maxWidth: '100vw',
                margin: '0',
                boxSizing: 'border-box'
            });
        } else {
            // Desktop positioning dengan accurate width calculation
            const containerWidth = this.searchInput.parent().outerWidth();
            const maxWidth = Math.min(
                containerWidth,
                window.innerWidth - inputRect.left - 20 // Leave 20px margin
            );

            this.dropdown.css({
                position: 'absolute',
                top: '100%',
                left: '0',
                right: 'auto',
                bottom: 'auto',
                width: `${maxWidth}px`,
                maxWidth: `${maxWidth}px`,
                margin: '8px 0 0 0',
                boxSizing: 'border-box'
            });
        }
    }

    getImageUrl(thumbnail) {
        const contentType = this.config.contentType === 'artikel' ? 'article' : 'news';
        return thumbnail ? `/images/${contentType}/thumbnails/${thumbnail}` :
               '/images/placeholder-thumb.jpg';
    }

    formatNumber(num) {
        if (num >= 1000000) {
            return (num / 1000000).toFixed(1) + 'M';
        } else if (num >= 1000) {
            return (num / 1000).toFixed(1) + 'K';
        }
        return num.toString();
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    showStatus(message, type = 'info') {
        if (!this.config.showStatusMessages) return;

        this.statusElement.removeClass('loading success warning error visible');

        if (type === 'loading') {
            this.statusElement.html(`<div class="sidebar-search-loading">${message}</div>`);
        } else {
            this.statusElement.text(message);
        }

        this.statusElement.addClass(type + ' visible');
    }

    hideStatus() {
        this.statusElement.removeClass('loading success warning error visible');
    }

    // Public methods
    destroy() {
        clearTimeout(this.typingTimer);
        this.searchInput.off();
        this.clearButton.off();
        this.seeAllButton.off();
        $(document).off('click');
        $(window).off('resize');
        this.hideDropdown();
        this.hideStatus();
    }

    getCurrentSearchTerm() {
        return this.currentSearchTerm;
    }

    setSearchTerm(term) {
        this.searchInput.val(term);
        this.initializeState();
        if (term) {
            this.performAutocompleteSearch(term);
        }
    }
}

// Export for global use
window.AutocompleteSearchHandler = AutocompleteSearchHandler;

