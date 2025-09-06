@extends('visitor.layout.main')

@section('title', 'Kategori: ' . $categoryData['name'])

@section('style')
    <!-- Modular CSS Components -->
    <link rel="stylesheet" href="{{ asset('css/visitor/components/search-and-filters.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/animations-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/category-badge.css') }}">
@endsection

@section('content')
    <!-- Category Header -->
    <div class="page-header text-center" style="background: linear-gradient(135deg, {{ $categoryData['color'] }}15, {{ $categoryData['color'] }}05);">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-3">
                <i class="{{ $categoryData['icon'] }} fa-2x mr-3" style="color: {{ $categoryData['color'] }};"></i>
                <h1 class="page-title mb-0">{{ $categoryData['name'] }}</h1>
            </div>
            @if($categoryData['description'])
                <p class="page-description">{{ $categoryData['description'] }}</p>
            @endif
            <div class="category-stats">
                <span class="stat-item">
                    <i class="fas fa-newspaper mr-1"></i>
                    {{ $categoryData['total_articles'] }} artikel
                </span>
                @if($categoryData['latest_article'])
                <span class="stat-item ml-3">
                    <i class="fas fa-clock mr-1"></i>
                    Update terakhir: {{ $categoryData['latest_article']->created_at->format('d M Y') }}
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Artikel</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $categoryData['name'] }}</li>
            </ol>
        </nav>

        <!-- Search Form -->
        <div class="search-container mb-5">
            <div class="search-inner">
                <input type="text" id="searchInput" name="search" class="search-input" placeholder="Cari artikel dalam kategori {{ $categoryData['name'] }}..." value="{{ $searchTerm }}" autocomplete="off">

                <div class="search-icon-container">
                    <svg class="search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <button type="button" class="clear-button" id="clearSearch">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <div class="search-results-count" id="searchResultsCount"></div>
        </div>
        
        <!-- Articles Grid -->
        <div class="row g-4" id="articlesContainer">
            @if($articles->count() > 0)
                @foreach ($articles as $index => $article)
                    @include('visitor.components.content-card', ['type' => 'artikel', 'item' => $article])
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="no-results">
                        <i class="{{ $categoryData['icon'] }} fa-3x mb-3" style="color: {{ $categoryData['color'] }};"></i>
                        <h3 class="mb-3">Belum ada artikel</h3>
                        <p class="text-muted mb-4">Kategori "{{ $categoryData['name'] }}" belum memiliki artikel. Silakan cek kembali nanti.</p>
                        <a href="{{ route('artikel') }}" class="btn btn-primary">
                            <i class="fas fa-newspaper mr-2"></i> Lihat Semua Artikel
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="pagination-container">
                {{ $articles->appends(request()->except('page'))->links() }}
            </div>
        @endif

        <!-- Back to Categories -->
        <div class="text-center mt-5 mb-4">
            <a href="{{ route('artikel') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Semua Artikel
            </a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Search Handler untuk category page
        class CategorySearchHandler {
            constructor(options) {
                this.searchInput = document.getElementById(options.searchInputId);
                this.clearButton = document.getElementById(options.clearButtonId);
                this.container = document.getElementById(options.containerId);
                this.searchEndpoint = options.searchEndpoint;
                this.contentType = options.contentType || 'artikel';
                this.debounceTimer = null;
                
                this.initializeEventListeners();
                this.updateSearchResults();
            }
            
            initializeEventListeners() {
                // Search input dengan debounce
                this.searchInput.addEventListener('input', (e) => {
                    clearTimeout(this.debounceTimer);
                    this.debounceTimer = setTimeout(() => {
                        this.performSearch(e.target.value);
                    }, 500);
                });
                
                // Clear button
                this.clearButton.addEventListener('click', () => {
                    this.searchInput.value = '';
                    this.performSearch('');
                });
                
                // Back to all articles button (for AJAX loaded content)
                document.addEventListener('click', (e) => {
                    if (e.target.id === 'backToAllArticles' || e.target.closest('#backToAllArticles')) {
                        e.preventDefault();
                        this.searchInput.value = '';
                        this.performSearch('');
                    }
                });
            }
            
            performSearch(query) {
                const url = new URL(this.searchEndpoint, window.location.origin);
                if (query) {
                    url.searchParams.set('search', query);
                }
                url.searchParams.set('ajax', '1');
                
                // Update URL tanpa reload
                const newUrl = query ? 
                    `${this.searchEndpoint}?search=${encodeURIComponent(query)}` : 
                    this.searchEndpoint;
                window.history.pushState({}, '', newUrl);
                
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        this.container.innerHTML = data.html;
                        this.updateSearchResults(data.count, query);
                        
                        // Update pagination
                        const paginationContainer = document.querySelector('.pagination-container');
                        if (paginationContainer && data.pagination) {
                            paginationContainer.innerHTML = data.pagination;
                        }
                    })
                    .catch(error => {
                        console.error('Search error:', error);
                    });
            }
            
            updateSearchResults(count = null, query = '') {
                const searchResultsCount = document.getElementById('searchResultsCount');
                if (!searchResultsCount) return;
                
                if (query && count !== null) {
                    searchResultsCount.textContent = `${count} artikel ditemukan untuk "${query}"`;
                    searchResultsCount.style.display = 'block';
                } else if (count !== null && count > 0) {
                    searchResultsCount.textContent = `Menampilkan ${count} artikel`;
                    searchResultsCount.style.display = 'block';
                } else {
                    searchResultsCount.style.display = 'none';
                }
            }
        }
        
        // Initialize search handler
        document.addEventListener('DOMContentLoaded', function() {
            const searchHandler = new CategorySearchHandler({
                searchInputId: 'searchInput',
                clearButtonId: 'clearSearch',
                containerId: 'articlesContainer',
                searchEndpoint: '{{ route('visitor.categories.show', $category->slug) }}',
                contentType: 'artikel'
            });
        });
    </script>
@endsection