<div class="col-12 col-md-6 col-lg-4">
    <div class="article-card">
        <div class="article-img-container">
            <a href="/galeri/{{ $event->slug }}">
                <img src="{{ asset('images/event/' . $event->eventPicture[0]->path) }}"
                    class="article-img" alt="{{ $event->name }}">
            </a>
            <div class="article-category">Galeri</div>
        </div>
        <div class="article-content">
            <a href="/galeri/{{ $event->slug }}" class="text-decoration-none">
                <h5 class="article-title">{{ $event->name }}</h5>
            </a>
            <div class="article-meta">
                <p class="article-date mb-0">
                    <i class="far fa-calendar-alt"></i>
                    {{ $event->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>