<div class="col-12 col-md-6 col-lg-4">
    <div class="article-card">
        <div class="article-img-container">
            <a href="/berita/{{ $news->slug }}">
                <img src="{{ asset("images/news/thumbnails/$news->thumbnail") }}"
                    class="article-img" alt="{{ $news->title }}">
            </a>
            <div class="article-category">Berita</div>
        </div>
        <div class="article-content">
            <a href="/berita/{{ $news->slug }}" class="text-decoration-none">
                <h5 class="article-title">{{ $news->title }}</h5>
            </a>
            <div class="article-meta">
                <p class="article-author mb-1">
                    <i class="fas fa-user-edit"></i>
                    {{ $news->author }}
                </p>
                <p class="article-date mb-0">
                    <i class="far fa-calendar-alt"></i>
                    {{ $news->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>