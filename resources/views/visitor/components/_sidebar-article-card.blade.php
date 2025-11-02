{{--
    Universal Sidebar Card Component
    Handles both Berita (News) and Artikel (Articles)
    Usage:
    @include('visitor.components._sidebar-article-card', [
        'article' => $article,           // Article/News object
        'type' => 'Berita|Artikel',     // Content type
        'overlayText' => 'Custom'       // Optional: override overlay text
    ])
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
    // All types now use category-badge component (Berita uses mock data)
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
                @if($isBerita)
                    {{-- Berita: Use category-badge component with direct CSS override to match Artikel exactly --}}
                    <div class="berita-badge-wrapper" style="display: inline-block;">
                        @include('visitor.components.category-badge', [
                            'article' => $article, // Article already has articleCategory from controller
                            'size' => 'sm',
                            'variant' => 'inline',
                            'fallbackLabel' => 'Berita'
                        ])
                    </div>
                    <style>
                    .berita-badge-wrapper .category-badge-sm {
                        font-size: 10px !important;
                        padding: 4px 10px !important;
                        border-radius: 14px !important;
                        gap: 4px !important;
                        max-width: none !important;
                    }
                    .berita-badge-wrapper .category-badge-sm i {
                        font-size: 9px !important;
                        flex-shrink: 0 !important;
                    }
                    .berita-badge-wrapper .category-badge-sm span {
                        font-size: 10px !important;
                        line-height: 1.2 !important;
                        min-width: 0 !important;
                    }
                    </style>
                @else
                    {{-- Artikel: Use existing category-badge component --}}
                    @include('visitor.components.category-badge', [
                        'article' => $article,
                        'size' => 'sm',
                        'variant' => 'inline',
                        'fallbackLabel' => 'Umum'
                    ])
                @endif
            </div>
            <div class="sidebar-views">
                <i class="far fa-eye"></i>
                {{ number_format($article->views ?? 0) }}
            </div>
        </div>
    </div>
</div>