/**
 * Sidebar Search Handler Component
 * Extended SearchHandler specifically for sidebar search in detail views
 *
 * Key differences from main SearchHandler:
 * - Redirects to list pages instead of AJAX content replacement
 * - Compact sidebar-optimized UI feedback
 * - Faster response for quick navigation from detail pages
 *
 * Usage:
 * const sidebarSearch = new SidebarSearchHandler({
 *   searchInputId: 'sidebarSearchInput',
 *   clearButtonId: 'sidebarClearSearch',
 *   statusId: 'sidebarSearchStatus',
 *   searchEndpoint: '/artikel', // or '/berita'
 *   contentType: 'artikel',     // or 'berita'
 *   redirectOnSearch: true       // default: true
 * });
 */

class SidebarSearchHandler {
    constructor(options) {
        this.config = {
            doneTypingInterval: 400, // Slightly faster for sidebar
            redirectOnSearch: true,
            minSearchLength: 2,
            showStatusMessages: true,
            ...options
        };

        this.typingTimer = null;
        this.currentSearchTerm = '';
        this.isSearching = false;

        this.initElements();
        this.initEventListeners();
        this.initializeState();
    }

    initElements() {
        this.searchInput = $(`#${this.config.searchInputId}`);
        this.clearButton = $(`#${this.config.clearButtonId}`);
        this.statusElement = $(`#${this.config.statusId}`);

        // Get current search term from URL if available
        const urlParams = new URLSearchParams(window.location.search);
        this.currentSearchTerm = urlParams.get('search') || '';
    }

    initializeState() {
        // Show clear button and add has-content class if there's text
        if (this.searchInput.val().length > 0) {
            this.clearButton.css('display', 'flex');
            this.searchInput.addClass('has-content');
        } else {
            this.clearButton.hide();
            this.searchInput.removeClass('has-content');
        }
    }

    initEventListeners() {
        // Event when user types in search input
        this.searchInput.on('keyup', (e) => {
            clearTimeout(this.typingTimer);

            // Show/hide clear button and has-content class
            if (this.searchInput.val().length > 0) {
                this.clearButton.css('display', 'flex');
                this.searchInput.addClass('has-content');
            } else {
                this.clearButton.hide();
                this.searchInput.removeClass('has-content');
            }

            // Handle Enter key for immediate search
            if (e.which === 13) {
                e.preventDefault();
                this.performSearch(true); // Immediate search on Enter
                return;
            }

            // Set timer to wait for user to finish typing
            if (this.searchInput.val().length >= this.config.minSearchLength || this.searchInput.val().length === 0) {
                this.typingTimer = setTimeout(() => this.performSearch(), this.config.doneTypingInterval);
            }
        });

        // Reset search when clear button is clicked
        this.clearButton.on('click', () => {
            this.resetSearch();
        });

        // Prevent form submission if wrapped in form
        this.searchInput.closest('form').on('submit', (e) => {
            e.preventDefault();
            this.performSearch(true);
        });

        // Add keyboard navigation hint
        this.searchInput.on('focus', () => {
            this.showStatus('Tekan Enter untuk mencari', 'hint');
        });

        this.searchInput.on('blur', () => {
            setTimeout(() => this.hideStatus(), 200);
        });
    }

    resetSearch() {
        this.searchInput.val('');
        this.searchInput.removeClass('has-content');
        this.clearButton.hide();
        this.currentSearchTerm = '';
        this.hideStatus();
    }

    performSearch(immediate = false) {
        const searchTerm = this.searchInput.val().trim();

        // Don't search if same as before and not immediate
        if (searchTerm === this.currentSearchTerm && !immediate && searchTerm !== '') return;

        this.currentSearchTerm = searchTerm;

        // Handle empty search
        if (searchTerm.length === 0) {
            this.hideStatus();
            return;
        }

        // Validate minimum search length
        if (searchTerm.length < this.config.minSearchLength) {
            this.showStatus(`Minimal ${this.config.minSearchLength} karakter`, 'warning');
            return;
        }

        // Show searching status
        this.showStatus('Mencari...', 'loading');

        // If redirect is enabled, navigate to search results page
        if (this.config.redirectOnSearch) {
            this.redirectToSearchResults(searchTerm);
            return;
        }

        // Otherwise, perform AJAX search (fallback to original behavior)
        this.performAjaxSearch(searchTerm);
    }

    redirectToSearchResults(searchTerm) {
        const targetUrl = `${this.config.searchEndpoint}?search=${encodeURIComponent(searchTerm)}`;

        // Add a brief delay to show loading state
        setTimeout(() => {
            window.location.href = targetUrl;
        }, 300);
    }

    performAjaxSearch(searchTerm) {
        if (this.isSearching) return;

        this.isSearching = true;

        $.ajax({
            url: this.config.searchEndpoint,
            type: 'GET',
            data: { search: searchTerm, ajax: 1 },
            success: (response) => this.handleSearchSuccess(response, searchTerm),
            error: () => this.handleSearchError(),
            complete: () => {
                this.isSearching = false;
            }
        });
    }

    handleSearchSuccess(response, searchTerm) {
        if (response.count > 0) {
            this.showStatus(`Ditemukan ${response.count} ${this.config.contentType}`, 'success');

            // Auto-redirect after brief delay
            setTimeout(() => {
                this.redirectToSearchResults(searchTerm);
            }, 1000);
        } else {
            this.showStatus('Tidak ada hasil', 'warning');
        }
    }

    handleSearchError() {
        this.showStatus('Terjadi kesalahan', 'error');
    }

    showStatus(message, type = 'info') {
        if (!this.config.showStatusMessages) return;

        // Remove all status classes
        this.statusElement.removeClass('loading success warning error visible');

        // Set message and appropriate class
        this.statusElement.text(message);

        // Add loading animation for loading status
        if (type === 'loading') {
            this.statusElement.html(`<div class="sidebar-search-loading">${message}</div>`);
        } else {
            this.statusElement.text(message);
        }

        // Add status class and show
        this.statusElement.addClass(type + ' visible');
    }

    hideStatus() {
        this.statusElement.removeClass('loading success warning error visible');
    }

    // Public method to get current search term
    getCurrentSearchTerm() {
        return this.currentSearchTerm;
    }

    // Public method to set search term programmatically
    setSearchTerm(term) {
        this.searchInput.val(term);
        this.initializeState();
        if (term) {
            this.performSearch(true);
        }
    }

    // Public method to destroy the handler
    destroy() {
        clearTimeout(this.typingTimer);
        this.searchInput.off();
        this.clearButton.off();
        this.hideStatus();
    }
}

// Export untuk digunakan di file lain
window.SidebarSearchHandler = SidebarSearchHandler;