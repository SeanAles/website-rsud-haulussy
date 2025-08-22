@extends('admin.layout.main')

@section('title', 'Edit Kategori')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Admin Categories CSS -->
    <link href="{{ asset('css/admin/categories.css') }}" rel="stylesheet">
    <!-- Color Picker -->
    <link href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="content-card">
                    <div class="content-card-header">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit"></i>
                            <h5 class="mb-0">Edit Kategori: {{ $category->name }}</h5>
                        </div>
                        <div class="header-actions">
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('categories.index') }}" class="btn btn-sm">
                                <i class="fas fa-arrow-left mr-1"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="content-card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6><i class="fas fa-exclamation-triangle mr-2"></i>Terdapat kesalahan:</h6>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category) }}" method="POST" id="formEditCategory">
                            @csrf
                            @method('PUT')
                            
                            <!-- Informasi Kategori Section -->
                            <h3 class="section-heading"><i class="fas fa-info-circle"></i> Informasi Kategori</h3>
                            
                            @if($category->posts_count > 0)
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <strong>Info:</strong> Kategori ini memiliki {{ $category->posts_count }} artikel. 
                                    Perubahan akan mempengaruhi tampilan artikel-artikel tersebut.
                                </div>
                            @endif
                            
                            <div class="row mb-4">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Kategori <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" 
                                               value="{{ old('name', $category->name) }}" placeholder="Contoh: Kesehatan Jantung" required>
                                        <small class="text-muted">
                                            Slug saat ini: <code>{{ $category->slug }}</code>
                                            <br>Slug akan otomatis diperbarui jika nama diubah
                                        </small>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sort_order">Urutan Tampilan</label>
                                        <input type="number" name="sort_order" id="sort_order" class="form-control" 
                                               value="{{ old('sort_order', $category->sort_order) }}" min="0" placeholder="0">
                                        <small class="text-muted">Urutan kategori dalam daftar (0 = paling atas)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" class="form-control" rows="3" 
                                          placeholder="Deskripsi singkat tentang kategori ini...">{{ old('description', $category->description) }}</textarea>
                                <small class="text-muted">Deskripsi opsional untuk menjelaskan kategori</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="color">Warna Kategori <span class="text-danger">*</span></label>
                                        <input type="text" name="color" id="color" class="form-control" 
                                               value="{{ old('color', $category->color) }}" required>
                                        <small class="text-muted">Warna akan digunakan untuk badge dan icon</small>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon">Icon FontAwesome <span class="text-danger">*</span></label>
                                        <input type="text" name="icon" id="icon" class="form-control" 
                                               value="{{ old('icon', $category->icon) }}" placeholder="fas fa-heart" required>
                                        <small class="text-muted">Format: fas fa-nama-icon</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Preview Icon</label>
                                        <div class="icon-preview" id="iconPreview">
                                            <i class="{{ $category->icon }}" style="color: {{ $category->color }};"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Icon Populer</label>
                                        <div class="popular-icons">
                                            <div class="icon-option {{ $category->icon == 'fas fa-heart' ? 'selected' : '' }}" data-icon="fas fa-heart" title="Heart">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-brain' ? 'selected' : '' }}" data-icon="fas fa-brain" title="Brain">
                                                <i class="fas fa-brain"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-apple-alt' ? 'selected' : '' }}" data-icon="fas fa-apple-alt" title="Apple">
                                                <i class="fas fa-apple-alt"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-shield-alt' ? 'selected' : '' }}" data-icon="fas fa-shield-alt" title="Shield">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-stethoscope' ? 'selected' : '' }}" data-icon="fas fa-stethoscope" title="Stethoscope">
                                                <i class="fas fa-stethoscope"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-child' ? 'selected' : '' }}" data-icon="fas fa-child" title="Child">
                                                <i class="fas fa-child"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-female' ? 'selected' : '' }}" data-icon="fas fa-female" title="Female">
                                                <i class="fas fa-female"></i>
                                            </div>
                                            <div class="icon-option {{ $category->icon == 'fas fa-microscope' ? 'selected' : '' }}" data-icon="fas fa-microscope" title="Microscope">
                                                <i class="fas fa-microscope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" 
                                           {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_active">Kategori Aktif</label>
                                </div>
                                <small class="text-muted">Hanya kategori aktif yang akan tampil di form artikel</small>
                            </div>

                            <!-- Action Button -->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn-posting">
                                    <i class="fas fa-save"></i>Perbarui Kategori
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Panel -->
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="info-card">
                    <h6><i class="fas fa-chart-pie"></i> Statistik Kategori</h6>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <div class="stat-value">{{ $category->posts_count }}</div>
                            <div class="stat-label">Total Artikel</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">{{ $category->created_at->format('d M Y') }}</div>
                            <div class="stat-label">Dibuat</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-card">
                    <h6><i class="fas fa-palette"></i> Saran Warna</h6>
                    <div class="d-flex flex-wrap">
                        <span class="color-suggestion" style="background: #dc3545; color: white;" onclick="setColor('#dc3545')">#dc3545</span>
                        <span class="color-suggestion" style="background: #28a745; color: white;" onclick="setColor('#28a745')">#28a745</span>
                        <span class="color-suggestion" style="background: #007bff; color: white;" onclick="setColor('#007bff')">#007bff</span>
                        <span class="color-suggestion" style="background: #ffc107; color: black;" onclick="setColor('#ffc107')">#ffc107</span>
                        <span class="color-suggestion" style="background: #17a2b8; color: white;" onclick="setColor('#17a2b8')">#17a2b8</span>
                        <span class="color-suggestion" style="background: #6610f2; color: white;" onclick="setColor('#6610f2')">#6610f2</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize color picker
            $("#color").spectrum({
                type: "color",
                showInput: true,
                showPalette: true,
                showSelectionPalette: true,
                maxSelectionSize: 10,
                preferredFormat: "hex",
                palette: [
                    ["#dc3545", "#28a745", "#007bff", "#ffc107", "#17a2b8"],
                    ["#6610f2", "#e83e8c", "#fd7e14", "#20c997", "#6c757d"]
                ],
                change: function(color) {
                    updateIconPreview();
                }
            });

            // Icon input change handler
            $('#icon').on('input', function() {
                updateIconPreview();
            });

            // Popular icon click handler
            $('.icon-option').click(function() {
                const iconClass = $(this).data('icon');
                $('#icon').val(iconClass);
                updateIconPreview();
                
                // Update selected state
                $('.icon-option').removeClass('selected');
                $(this).addClass('selected');
            });

            // Update icon preview
            function updateIconPreview() {
                const iconClass = $('#icon').val() || 'fas fa-folder';
                const color = $('#color').val() || '#6c757d';
                
                $('#iconPreview').html(`<i class="${iconClass}" style="color: ${color};"></i>`);
            }

            // Set color function for suggested colors
            window.setColor = function(color) {
                $('#color').spectrum("set", color);
                updateIconPreview();
            };

            // Auto dismiss alerts
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection