@extends('admin.layout.main')

@section('title', 'Detail Kategori')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Admin Categories CSS -->
    <link href="{{ asset('css/admin/categories.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="content-card">
                    <div class="content-card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye"></i>
                            <h5 class="mb-0">Detail Kategori: {{ $category->name }}</h5>
                        </div>
                        <div class="header-actions">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm" title="Edit Kategori">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-sm">
                                <i class="fas fa-arrow-left mr-1"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="content-card-body">
                        <!-- Category Header -->
                        <div class="detail-card">
                            <div class="detail-header">
                                <div class="category-icon" style="background-color: {{ $category->color }}15; color: {{ $category->color }}">
                                    <i class="{{ $category->icon }}"></i>
                                </div>
                                <div class="detail-info">
                                    <h2>{{ $category->name }}</h2>
                                    <div class="mb-2">
                                        <i class="fas fa-link mr-2 text-muted"></i>
                                        <code>/kategori/{{ $category->slug }}</code>
                                    </div>
                                    @if($category->description)
                                        <p class="text-muted mb-2">{{ $category->description }}</p>
                                    @endif
                                    <span class="status-badge {{ $category->is_active ? 'status-active' : 'status-inactive' }}">
                                        <i class="fas {{ $category->is_active ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                        {{ $category->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-value">{{ $category->posts_count }}</div>
                                    <div class="stat-label">Total Artikel</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ $category->sort_order }}</div>
                                    <div class="stat-label">Urutan Tampilan</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ $category->created_at->format('d M Y') }}</div>
                                    <div class="stat-label">Tanggal Dibuat</div>
                                </div>
                            </div>
                        </div>

                        <!-- Articles in this category -->
                        <h3 class="section-heading mt-4"><i class="fas fa-newspaper"></i> Artikel dalam Kategori Ini</h3>
                        
                        @if($articles->count() > 0)
                            <div class="articles-grid">
                                @foreach($articles as $article)
                                    <div class="article-card">
                                        <div class="article-meta">
                                            <i class="fas fa-user mr-1"></i>{{ $article->author }} • 
                                            <i class="fas fa-calendar mr-1"></i>{{ $article->created_at->format('d M Y') }} • 
                                            <i class="fas fa-eye mr-1"></i>{{ $article->views ?? 0 }} views
                                        </div>
                                        <div class="article-content">
                                            <h5 class="article-title">{{ $article->title }}</h5>
                                            @if($article->tags->count() > 0)
                                                <div class="article-tags">
                                                    @foreach($article->tags as $tag)
                                                        <span class="article-tag">{{ $tag->name }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <div class="mt-3">
                                                <a href="/article/{{ $article->id }}" class="btn btn-sm btn-info mr-1" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                <a href="/article-edit/{{ $article->id }}" class="btn btn-sm btn-warning" title="Edit Artikel">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                <h4 class="text-muted">Belum Ada Artikel</h4>
                                <p class="text-muted mb-4">Kategori ini belum memiliki artikel. Buat artikel baru dengan kategori ini.</p>
                                <a href="/article-add" class="btn-posting">
                                    <i class="fas fa-plus"></i>Buat Artikel Baru
                                </a>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Auto dismiss alerts
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection