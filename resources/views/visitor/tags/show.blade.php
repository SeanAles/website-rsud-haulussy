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
        <!-- Articles Grid - Same structure as artikel page -->
        <div class="row g-4" id="articlesContainer">
            @if($articles->count() > 0)
                @foreach ($articles as $article)
                    @include('visitor.components.content-card', ['type' => 'artikel', 'item' => $article])
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="no-results">
                        <i class="fas fa-hashtag fa-3x mb-3 text-muted"></i>
                        <h3 class="mb-3">Belum ada artikel</h3>
                        <p class="text-muted mb-4">Artikel dengan topik "{{ $tag->name }}" belum tersedia saat ini.</p>
                        <a href="{{ route('artikel') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua artikel
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Pagination - Same style as artikel page -->
        <div class="pagination-container">
            <div class="pagination">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection