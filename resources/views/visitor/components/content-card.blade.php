{{-- Universal Content Card Component --}}
{{-- 
Usage:
@include('visitor.components.content-card', [
    'type' => 'artikel|berita|galeri',
    'item' => $item,
    'showAuthor' => true|false (optional, default: true)
])
--}}

@php
    $typeConfig = [
        'artikel' => [
            'label' => 'Artikel',
            'url' => '/artikel/',
            'imageField' => 'thumbnail',
            'imagePath' => 'images/article/thumbnails/',
            'titleField' => 'title',
            'authorField' => 'author'
        ],
        'berita' => [
            'label' => 'Berita', 
            'url' => '/berita/',
            'imageField' => 'thumbnail',
            'imagePath' => 'images/news/thumbnails/',
            'titleField' => 'title',
            'authorField' => 'author'
        ],
        'galeri' => [
            'label' => 'Galeri',
            'url' => '/galeri/',
            'imageField' => 'eventPicture.0.path',
            'imagePath' => 'images/event/',
            'titleField' => 'name',
            'authorField' => null
        ]
    ];
    
    $config = $typeConfig[$type] ?? $typeConfig['artikel'];
    $showAuthor = $showAuthor ?? true;
    
    // Get image path
    $imagePath = '';
    if ($type === 'galeri') {
        $imagePath = $config['imagePath'] . data_get($item, $config['imageField']);
    } else {
        $imagePath = $config['imagePath'] . data_get($item, $config['imageField']);
    }
@endphp

<div class="col-12 col-md-6 col-lg-4">
    <div class="article-card">
        <div class="article-img-container">
            <a href="{{ $config['url'] }}{{ $item->slug }}">
                <img src="{{ asset($imagePath) }}"
                    class="article-img" alt="{{ data_get($item, $config['titleField']) }}">
            </a>
            @include('visitor.components.category-badge', [
                'article' => $item,
                'size' => 'md',
                'variant' => 'overlay',
                'fallbackLabel' => $config['label']
            ])
        </div>
        <div class="article-content">
            <a href="{{ $config['url'] }}{{ $item->slug }}" class="text-decoration-none">
                <h5 class="article-title">{{ data_get($item, $config['titleField']) }}</h5>
            </a>
            <div class="article-meta">
                @if($showAuthor && $config['authorField'] && data_get($item, $config['authorField']))
                    <p class="article-author mb-1">
                        <i class="fas fa-user-edit"></i>
                        {{ data_get($item, $config['authorField']) }}
                    </p>
                @endif
                <p class="article-date mb-0">
                    <i class="far fa-calendar-alt"></i>
                    {{ $item->created_at->format('d M Y') }}
                </p>
            </div>
        </div>
    </div>
</div>