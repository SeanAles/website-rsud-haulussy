{{--
    Sidebar Article Card - Super Clean & Simple Design
    Fokus untuk Artikel Terkait dulu
--}}

@php
    // Simple reading time calculation
    $readTime = strlen($article->description ?? '') > 0 
        ? max(2, ceil(str_word_count(strip_tags($article->description)) / 200))
        : 2;
@endphp

<div class="sidebar-article-card">
    {{-- Thumbnail --}}
    <div class="sidebar-thumbnail">
        <img src="{{ asset('images/article/thumbnails/' . $article->thumbnail) }}" 
             alt="{{ $article->title }}" 
             loading="lazy">
        <div class="sidebar-overlay">{{ $type ?? 'Terkait' }}</div>
    </div>
    
    {{-- Content --}}
    <div class="sidebar-content">
        <h4 class="sidebar-title">
            <a href="/artikel/{{ $article->slug }}">{{ $article->title }}</a>
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
                    'fallbackLabel' => 'Umum'
                ])
            </div>
            <div class="sidebar-views">
                <i class="far fa-eye"></i>
                {{ number_format($article->views ?? 0) }}
            </div>
        </div>
    </div>
</div>