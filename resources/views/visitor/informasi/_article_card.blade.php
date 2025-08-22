<div class="col-12 col-md-6 col-lg-4">
    <div class="article-card">
        <div class="article-img-container">
            <a href="/artikel/{{ $article->slug }}">
                <img src="{{ asset("images/article/thumbnails/$article->thumbnail") }}"
                    class="article-img" alt="{{ $article->title }}">
            </a>
            @include('visitor.components.category-badge', [
                'article' => $article,
                'size' => 'md',
                'variant' => 'overlay',
                'fallbackLabel' => 'Artikel'
            ])
        </div>
        <div class="article-content">
            <a href="/artikel/{{ $article->slug }}" class="text-decoration-none">
                <h5 class="article-title">{{ $article->title }}</h5>
            </a>
            <div class="article-meta">
                <p class="article-author mb-1">
                    <i class="fas fa-user-edit"></i>
                    {{ $article->author }}
                </p>
                <p class="article-date mb-0">
                    <i class="far fa-calendar-alt"></i>
                    {{ $article->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>
