@extends('visitor.layout.main')

@section('title', 'Artikel')

@section('style')
    <!-- Modular CSS Components -->
    <link rel="stylesheet" href="{{ asset('css/visitor/components/search-and-filters.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/animations-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/category-badge.css') }}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">Artikel Terbaru</h1>
        </div>
    </div>

    <div class="container">
        <!-- Search Form -->
        <div class="search-container mb-5">
            <div class="search-inner">
                <input type="text" id="searchInput" name="search" class="search-input" placeholder="Cari artikel kesehatan..." value="{{ $searchTerm }}" autocomplete="off">

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
        <!-- Grid layout yang diperbaiki untuk format 3x2 -->
        <div class="row g-4" id="articlesContainer">
            @if($articles->count() > 0)
                @foreach ($articles as $index => $article)
                    @include('visitor.components.content-card', ['type' => 'artikel', 'item' => $article])
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="no-results">
                        <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                        <h3 class="mb-3">Tidak ada artikel ditemukan</h3>
                        <p class="text-muted mb-4">Maaf, tidak ada artikel yang sesuai dengan pencarian "{{ $searchTerm }}"</p>
                        <button type="button" id="backToAllArticles" class="btn btn-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel
                        </button>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination">
                {{ $articles->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/visitor/components/search-handler.js') }}"></script>
<script>
$(document).ready(function() {
    const searchHandler = new SearchHandler({
        searchInputId: 'searchInput',
        clearButtonId: 'clearSearch',
        containerId: 'articlesContainer',
        searchResultsCountId: 'searchResultsCount',
        paginationContainerClass: 'pagination-container',
        searchEndpoint: '/artikel',
        contentType: 'artikel',
        backButtonId: 'backToAllArticles'
    });
});
</script>
@endsection
