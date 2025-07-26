/**
 * Universal Search Handler Component
 * Reusable search functionality for content pages (artikel, berita, galeri)
 * 
 * Usage:
 * const searchHandler = new SearchHandler({
 *   searchInputId: 'searchInput',
 *   clearButtonId: 'clearSearch',
 *   containerId: 'articlesContainer',
 *   searchResultsCountId: 'searchResultsCount',
 *   paginationContainerClass: 'pagination-container',
 *   searchEndpoint: '/artikel',
 *   contentType: 'artikel',
 *   backButtonId: 'backToAllArticles'
 * });
 */

class SearchHandler {
    constructor(options) {
        this.config = {
            doneTypingInterval: 500,
            ...options
        };
        
        this.typingTimer = null;
        this.currentSearchTerm = '';
        
        this.initElements();
        this.initEventListeners();
        this.initializeState();
    }
    
    initElements() {
        this.searchInput = $(`#${this.config.searchInputId}`);
        this.clearButton = $(`#${this.config.clearButtonId}`);
        this.container = $(`#${this.config.containerId}`);
        this.searchResultsCount = $(`#${this.config.searchResultsCountId}`);
        this.paginationContainer = $(`.${this.config.paginationContainerClass}`);
        this.currentSearchTerm = this.searchInput.val();
    }
    
    initializeState() {
        // Tampilkan tombol clear jika ada teks di input dan tambahkan kelas has-content
        if (this.searchInput.val().length > 0) {
            this.clearButton.show();
            this.searchInput.addClass('has-content');
        } else {
            this.clearButton.hide();
            this.searchInput.removeClass('has-content');
        }
    }
    
    initEventListeners() {
        // Event ketika user mengetik di input pencarian
        this.searchInput.on('keyup', () => {
            clearTimeout(this.typingTimer);
            
            // Tampilkan tombol clear jika ada teks dan tambahkan kelas has-content
            if (this.searchInput.val().length > 0) {
                this.clearButton.show();
                this.searchInput.addClass('has-content');
            } else {
                this.clearButton.hide();
                this.searchInput.removeClass('has-content');
            }
            
            // Set timer untuk menunggu user selesai mengetik
            this.typingTimer = setTimeout(() => this.performSearch(), this.config.doneTypingInterval);
        });
        
        // Reset pencarian ketika tombol clear diklik
        this.clearButton.on('click', () => {
            this.resetSearch();
        });
        
        // Reset pencarian ketika tombol "Kembali ke semua" diklik
        $(document).on('click', `#${this.config.backButtonId}`, () => {
            this.resetSearch();
        });
        
        // Menangani event ketika user menekan Enter pada input pencarian
        this.searchInput.on('keypress', (e) => {
            if (e.which === 13) {
                e.preventDefault();
                this.performSearch();
            }
        });
    }
    
    resetSearch() {
        this.searchInput.val('');
        this.searchInput.removeClass('has-content');
        this.clearButton.hide();
        this.currentSearchTerm = '';
        this.performSearch();
    }
    
    performSearch() {
        const searchTerm = this.searchInput.val();
        
        // Jika pencarian sama dengan sebelumnya, tidak perlu melakukan request
        if (searchTerm === this.currentSearchTerm && searchTerm !== '') return;
        
        this.currentSearchTerm = searchTerm;
        
        // Tampilkan loading state dengan animasi yang lebih menarik
        this.showLoadingState();
        
        $.ajax({
            url: this.config.searchEndpoint,
            type: 'GET',
            data: { search: searchTerm, ajax: 1 },
            success: (response) => this.handleSearchSuccess(response, searchTerm),
            error: () => this.handleSearchError()
        });
    }
    
    showLoadingState() {
        const loadingHtml = `
            <div class="col-12 text-center py-5">
                <div class="search-loading">
                    <div class="spinner-grow text-primary mx-1" role="status" style="animation-delay: 0s"></div>
                    <div class="spinner-grow text-info mx-1" role="status" style="animation-delay: 0.2s"></div>
                    <div class="spinner-grow text-primary mx-1" role="status" style="animation-delay: 0.4s"></div>
                </div>
                <p class="mt-3 search-loading-text">Mencari ${this.config.contentType}...</p>
            </div>`;
        this.container.html(loadingHtml);
    }
    
    handleSearchSuccess(response, searchTerm) {
        this.container.html(response.html);
        
        // Update URL tanpa refresh halaman
        const url = new URL(window.location);
        if (searchTerm) {
            url.searchParams.set('search', searchTerm);
            this.searchResultsCount.text(`Ditemukan ${response.count} ${this.config.contentType}`).addClass('visible');
        } else {
            url.searchParams.delete('search');
            this.searchResultsCount.text('').removeClass('visible');
        }
        window.history.pushState({}, '', url);
        
        // Perbarui dan tampilkan pagination
        if (response.pagination) {
            this.paginationContainer.html(response.pagination).show();
        } else {
            this.paginationContainer.hide();
        }
    }
    
    handleSearchError() {
        const errorHtml = `
            <div class="col-12 text-center py-5">
                <div class="no-results">
                    <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
                    <h3 class="mb-3">Terjadi kesalahan</h3>
                    <p class="text-muted mb-4">Maaf, terjadi kesalahan saat mencari ${this.config.contentType}</p>
                </div>
            </div>`;
        this.container.html(errorHtml);
    }
}

// Export untuk digunakan di file lain
window.SearchHandler = SearchHandler;