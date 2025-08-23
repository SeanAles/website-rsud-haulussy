@extends('visitor.layout.main')

@section('title', 'Artikel: ' . $tag->name)

@section('style')
    <!-- Same CSS structure as artikel page -->
    <link rel="stylesheet" href="{{ asset('css/visitor/components/search-and-filters.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/animations-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/category-badge.css') }}">
@endsection

@section('content')
    <!-- Page Header - Same style as artikel page -->
    <div class="page-header text-center">
        <div class="container">
            <h1 class="page-title">
                <i class="fas fa-hashtag me-2"></i>{{ $tag->name }}
            </h1>
            <p class="page-subtitle">{{ $tagData['total_articles'] }} artikel tentang {{ $tag->name }}</p>
        </div>
    </div>

    <div class="container">
        <!-- Search Form - Same as artikel page -->
        <div class="search-container mb-5">
            <div class="search-inner">
                <input type="text" id="searchInput" name="search" class="search-input" placeholder="Cari artikel dengan topik {{ $tag->name }}..." value="{{ $searchTerm }}" autocomplete="off">

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
        
        <!-- Articles Grid - Same structure as artikel page -->
        <div class="row g-4" id="articlesContainer">
            @if($articles->count() > 0)
                @foreach ($articles as $article)
                    @include('visitor.components.content-card', ['type' => 'artikel', 'item' => $article])
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="no-results">
                        @if($searchTerm)
                            <i class="fas fa-search fa-3x mb-3 text-muted"></i>
                            <h3 class="mb-3">Tidak ada artikel ditemukan</h3>
                            <p class="text-muted mb-4">Maaf, tidak ada artikel dengan topik "{{ $tag->name }}" yang sesuai dengan pencarian "{{ $searchTerm }}"</p>
                            <button type="button" id="backToAllArticles" class="btn btn-primary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel dengan topik {{ $tag->name }}
                            </button>
                        @else
                            <i class="fas fa-hashtag fa-3x mb-3 text-muted"></i>
                            <h3 class="mb-3">Belum ada artikel</h3>
                            <p class="text-muted mb-4">Artikel dengan topik "{{ $tag->name }}" belum tersedia saat ini.</p>
                            <a href="{{ route('artikel') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel
                            </a>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination - Same style as artikel page -->
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
        searchEndpoint: '{{ route("tags.show", $tag->slug) }}',
        contentType: 'artikel',
        backButtonId: 'backToAllArticles'
    });
});
</script>
@endsection