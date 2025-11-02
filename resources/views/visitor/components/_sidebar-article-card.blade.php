{{--
    Universal Sidebar Card Component
    Handles both Berita (News) and Artikel (Articles)
    Usage:
    @include('visitor.components._sidebar-article-card', [
        'article' => $article,           // Article/News object
        'type' => 'Berita|Artikel',     // Content type
        'overlayText' => 'Custom'       // Optional: override overlay text
    ])

    Note: Now uses unified category-badge component without inline CSS overrides
--}}

@php
    // Universal reading time calculation
    $readTime = strlen($article->description ?? '') > 0
        ? max(2, ceil(str_word_count(strip_tags($article->description)) / 200))
        : 2;

    // Type detection and configuration
    $contentType = $type ?? 'Artikel';
    $isBerita = $contentType === 'Berita';

    // Dynamic configurations based on type
    $imagePath = $isBerita ? 'news/thumbnails' : 'article/thumbnails';
    $url = $isBerita ? "/berita/{$article->slug}" : "/artikel/{$article->slug}";
    $overlayText = $overlayText ?? ($isBerita ? 'Berita' : 'Terkait');

    // Category handling
    // All types use unified category-badge component (Berita uses mock data from controller)
@endphp

<div class="sidebar-article-card">
    {{-- Thumbnail --}}
    <div class="sidebar-thumbnail">
        <img src="{{ asset('images/' . $imagePath . '/' . $article->thumbnail) }}"
             alt="{{ $article->title }}"
             loading="lazy">
        <div class="sidebar-overlay">{{ $overlayText }}</div>
    </div>

    {{-- Content --}}
    <div class="sidebar-content">
        <h4 class="sidebar-title">
            <a href="{{ $url }}">{{ $article->title }}</a>
        </h4>

        <div class="sidebar-meta">
            <span class="sidebar-date">
                <i class="far fa-calendar-alt"></i>
                {{ $article->created_at->format('d M Y') }}
            </span>
            <span class="sidebar-read-time">
                <i class="far fa-clock"></i>
                {{ $readTime }} menit
            </span>
        </div>

        <div class="sidebar-footer">
            <div class="sidebar-badge">
                @include('visitor.components.category-badge', [
                    'article' => $article,
                    'size' => 'sm',
                    'variant' => 'inline',
                    'fallbackLabel' => $isBerita ? 'Berita' : 'Umum'
                ])
            </div>
            <div class="sidebar-views">
                <i class="far fa-eye"></i>
                {{ number_format($article->views ?? 0) }}
            </div>
        </div>
    </div>
</div>