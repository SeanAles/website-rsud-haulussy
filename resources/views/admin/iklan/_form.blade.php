@csrf
<div class="row">
    <div class="col-md-6">
                <div class="form-group">
                    <label for="judul">Judul Iklan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                        id="judul" name="judul" placeholder="Masukkan judul iklan"
                        value="{{ old('judul', isset($iklan) ? $iklan->judul : '') }}" required>
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi (Opsional)</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" rows="6"
                            placeholder="Masukkan deskripsi singkat iklan">{{ old('deskripsi', isset($iklan) ? $iklan->deskripsi : '') }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

    <div class="col-md-6">
                <div class="form-group">
                    <label for="gambar" class="control-label">Gambar Iklan @if(!isset($iklan))<span class="text-danger">*</span>@endif</label>
                    <div class="thumbnail-upload-wrapper">
                        <div class="thumbnail-upload-container">
                            <div class="thumbnail-dropzone" id="thumbnail-dropzone">
                                <input type="file" class="thumbnail-input @error('gambar') is-invalid @enderror" name="gambar" id="thumbnail" accept=".jpg,.jpeg,.png">
                                <div class="thumbnail-placeholder">
                                    <div class="upload-icon-container">
                                        <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    </div>
                                    <div class="upload-text">
                                        <span class="primary-text">Klik atau seret gambar ke sini</span>
                                        <span class="secondary-text">Format: JPG, JPEG, PNG | Maks: 2MB</span>
                                    </div>
                                </div>
                                <div class="thumbnail-preview" id="thumbnail-preview-container" style="display:none;">
                                    <img src="#" alt="Preview" id="thumbnail-preview-image">
                                    <div class="thumbnail-preview-info">
                                        <span id="filename-display"></span>
                                        <span id="filesize-display"></span>
                                    </div>
                                    <div class="file-selected-indicator">
                                        <i class="fas fa-check-circle"></i> File dipilih
                                    </div>
                                    <div class="change-file-tip">
                                        Klik area ini untuk memilih file lain
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="upload-status" id="upload-status">
                            <div class="progress thumbnail-progress">
                                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="status-text"></div>
                        </div>
                    </div>

                    @error('gambar')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    @if(isset($iklan) && $iklan->gambar)
                        <div class="existing-image-container" id="existingImageContainer">
                            <div class="existing-image-wrapper">
                                <div class="existing-image-preview">
                                    <img src="{{ asset('visitor/assets/img/iklan/' . $iklan->gambar) }}"
                                         alt="Gambar Saat Ini" class="existing-image">
                                    <div class="existing-image-overlay">
                                        <div class="existing-image-info">
                                            <span class="existing-image-label">Gambar Saat Ini</span>
                                            <button type="button" id="removeExistingImageButton" class="btn-change-image">
                                                <i class="fas fa-edit"></i> Ganti Gambar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

<div class="row">
    <div class="col-md-6">
                <div class="form-group">
                    <label for="link">Link Tujuan (Opsional)</label>
                    <input type="url" class="form-control @error('link') is-invalid @enderror"
                        id="link" name="link" placeholder="https://example.com"
                        value="{{ old('link', isset($iklan) ? $iklan->link : '') }}">
                    @error('link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small class="form-text text-muted">URL yang akan dibuka ketika iklan diklik.</small>
                </div>
            </div>

    <div class="col-md-6">
        <!-- Checkbox untuk iklan permanen -->
        <div class="form-group">
            <label for="is_permanent" class="form-label">Jenis Iklan</label>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_permanent" name="is_permanent" value="1"
                    {{ old('is_permanent', isset($iklan) && $iklan->is_permanent ? 'checked' : '') }}>
                <label class="custom-control-label" for="is_permanent">
                    <span class="switch-text">Iklan Permanen (Tanpa Batas Waktu)</span>
                </label>
            </div>
            <small class="form-text text-muted">Aktifkan jika iklan ini akan ditampilkan terus menerus tanpa batas waktu.</small>
        </div>

        <!-- Container untuk tanggal yang akan disembunyikan jika permanen -->
        <div id="date-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai Tayang <span class="text-danger date-required">*</span></label>
                        <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                            id="tanggal_mulai" name="tanggal_mulai"
                            value="{{ old('tanggal_mulai', isset($iklan) && $iklan->tanggal_mulai ? \Carbon\Carbon::parse($iklan->tanggal_mulai)->format('Y-m-d') : \Carbon\Carbon::today()->format('Y-m-d')) }}"
                            min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                        @error('tanggal_mulai')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir Tayang <span class="text-danger date-required">*</span></label>
                        <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror"
                            id="tanggal_akhir" name="tanggal_akhir"
                            value="{{ old('tanggal_akhir', isset($iklan) && $iklan->tanggal_akhir ? \Carbon\Carbon::parse($iklan->tanggal_akhir)->format('Y-m-d') : '') }}">
                        @error('tanggal_akhir')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
                    <label for="aktif" class="form-label">Status Iklan</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1"
                            {{ old('aktif', isset($iklan) && $iklan->aktif ? 'checked' : '') }}>
                        <label class="custom-control-label" for="aktif">
                            <span class="switch-text">Aktifkan</span>
                        </label>
                    </div>
                    <small class="form-text text-muted">Geser untuk mengaktifkan.</small>
                </div>
            </div>
        </div>

<div class="form-actions">
            <a href="{{ route('iklan.index') }}" class="btn-cancel">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i>{{ isset($iklan) ? 'Update Iklan' : 'Simpan Iklan' }}
            </button>
        </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalAkhir = document.getElementById('tanggal_akhir');
    const existingImageContainer = document.getElementById('existingImageContainer');
    const removeExistingImageButton = document.getElementById('removeExistingImageButton');
    const isPermanentCheckbox = document.getElementById('is_permanent');
    const dateContainer = document.getElementById('date-container');
    const dateRequiredSpans = document.querySelectorAll('.date-required');

    // Function to toggle date fields based on permanent checkbox
    function toggleDateFields() {
        if (isPermanentCheckbox.checked) {
            dateContainer.style.display = 'none';
            // Remove required attribute from date fields
            if (tanggalMulai) tanggalMulai.removeAttribute('required');
            if (tanggalAkhir) tanggalAkhir.removeAttribute('required');
            // Hide required asterisks
            dateRequiredSpans.forEach(span => span.style.display = 'none');
        } else {
            dateContainer.style.display = 'block';
            // Add required attribute to date fields
            if (tanggalMulai) tanggalMulai.setAttribute('required', 'required');
            if (tanggalAkhir) tanggalAkhir.setAttribute('required', 'required');
            // Show required asterisks
            dateRequiredSpans.forEach(span => span.style.display = 'inline');
        }
    }

    // Initialize date fields visibility
    if (isPermanentCheckbox) {
        toggleDateFields();
        isPermanentCheckbox.addEventListener('change', toggleDateFields);
    }

    // Date validation
    if (tanggalMulai && tanggalAkhir) {
        if (tanggalMulai.value) {
            tanggalAkhir.min = tanggalMulai.value;
        }

        tanggalMulai.addEventListener('change', function() {
            tanggalAkhir.min = this.value;
            if (tanggalAkhir.value && tanggalAkhir.value < this.value) {
                tanggalAkhir.value = this.value;
            }
        });

        tanggalAkhir.addEventListener('change', function() {
            if (tanggalMulai.value && this.value < tanggalMulai.value) {
                alert('Tanggal akhir tidak boleh lebih kecil dari tanggal mulai!');
                this.value = tanggalMulai.value;
            }
        });
    }

    // File upload handling
    $('#thumbnail').on('change', function() {
        const file = this.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                this.value = '';
                return;
            }

            const fileName = file.name.toLowerCase();
            const allowedExtensions = ['.jpg', '.jpeg', '.png'];
            const hasValidExtension = allowedExtensions.some(ext => fileName.endsWith(ext));

            if (!hasValidExtension) {
                alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
                this.value = '';
                return;
            }

            const fileSize = formatFileSize(file.size);
            $('#filename-display').text(fileName);
            $('#filesize-display').text(fileSize);

            const reader = new FileReader();
            reader.onload = function(e) {
                $('#thumbnail-preview-image').attr('src', e.target.result);
                $('#thumbnail-preview-container').fadeIn();
                $('.thumbnail-placeholder').hide();
                showUploadStatus();
                $('#thumbnail-preview-image').addClass('fade-in');

                const img = new Image();
                img.onload = function() {
                    $('#filesize-display').append(' • ' + this.width + ' × ' + this.height + ' px');
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Drag and drop
    $('#thumbnail-dropzone')
        .on('dragover', function(e) {
            e.preventDefault();
            $(this).addClass('drag-over');
        })
        .on('dragleave dragend', function(e) {
            e.preventDefault();
            $(this).removeClass('drag-over');
        })
        .on('drop', function(e) {
            e.preventDefault();
            $(this).removeClass('drag-over');
            if (e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length) {
                $('#thumbnail')[0].files = e.originalEvent.dataTransfer.files;
                $('#thumbnail').trigger('change');
            }
        });

    // Existing image replacement
    if (removeExistingImageButton) {
        removeExistingImageButton.addEventListener('click', function() {
            if (existingImageContainer) existingImageContainer.style.display = 'none';
            $('.thumbnail-placeholder').show();
            $('#thumbnail').click();
        });
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function showUploadStatus() {
        $('#upload-status').slideDown();
        $('.status-text').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Mempersiapkan file...');
        setTimeout(() => {
            $('.progress-bar').css('width', '30%');
            $('.status-text').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Memvalidasi format...');
        }, 500);
        setTimeout(() => {
            $('.progress-bar').css('width', '60%');
            $('.status-text').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Mengoptimalkan gambar...');
        }, 1000);
        setTimeout(() => {
            $('.progress-bar').css('width', '100%');
            $('.status-text').html('<i class="fas fa-check-circle mr-2 text-success"></i> File siap diunggah');
        }, 1500);
    }
});
</script>

<style>
:root {
    --primary-color: #4299e1;
    --primary-hover: #3182ce;
    --primary-gradient: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
    --success-color: #48bb78;
    --warning-color: #ed8936;
    --light-bg: #f8fafc;
    --border-color: #e2e8f0;
    --text-dark: #2d3748;
    --text-muted: #718096;
    --card-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    --hover-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    --border-radius: 12px;
    --transition-speed: 0.3s;
}

.control-label {
    font-weight: 600;
    margin-bottom: 15px;
    color: var(--text-dark);
    font-size: 1rem;
    display: block;
}

.thumbnail-upload-wrapper {
    position: relative;
    margin-bottom: 20px;
    height: 200px;
}

.thumbnail-upload-container {
    height: 100%;
}

.thumbnail-dropzone {
    position: relative;
    height: 100%;
    border: 2px dashed var(--border-color);
    background-color: var(--light-bg);
    border-radius: var(--border-radius);
    transition: all var(--transition-speed) ease;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.thumbnail-dropzone:hover {
    border-color: var(--primary-color);
    background-color: rgba(66, 153, 225, 0.05);
}

.thumbnail-dropzone.drag-over {
    border-color: var(--primary-color);
    background-color: rgba(66, 153, 225, 0.1);
    transform: scale(1.02);
}

.thumbnail-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 10;
}

.thumbnail-placeholder {
    text-align: center;
    padding: 20px;
    width: 100%;
}

.upload-icon-container {
    margin-bottom: 15px;
    width: 60px;
    height: 60px;
    background: rgba(66, 153, 225, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
}

.upload-icon {
    font-size: 28px;
    color: var(--primary-color);
}

.upload-text {
    display: flex;
    flex-direction: column;
}

.upload-text .primary-text {
    font-size: 14px;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 6px;
}

.upload-text .secondary-text {
    font-size: 12px;
    color: var(--text-muted);
}

.thumbnail-preview {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 5;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: var(--light-bg);
    padding: 15px;
}

.thumbnail-preview img {
    max-height: 60%;
    max-width: 70%;
    object-fit: contain;
    border-radius: 8px;
    box-shadow: var(--card-shadow);
    transition: transform 0.3s ease;
}

.thumbnail-preview img:hover {
    transform: scale(1.05);
}

.thumbnail-preview-info {
    margin-top: 15px;
    text-align: center;
    color: var(--text-muted);
    font-size: 14px;
    width: 100%;
}

#filename-display {
    display: block;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 90%;
    margin: 0 auto;
}

#filesize-display {
    font-size: 13px;
}

.change-file-tip {
    margin-top: 10px;
    font-size: 13px;
    color: var(--primary-color);
    text-align: center;
    font-style: italic;
}

.file-selected-indicator {
    position: absolute;
    bottom: 15px;
    background-color: var(--success-color);
    color: white;
    padding: 6px 15px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    animation: fadeInUp 0.5s ease forwards;
    box-shadow: 0 3px 10px rgba(72, 187, 120, 0.3);
}

.file-selected-indicator i {
    margin-right: 6px;
}

.upload-status {
    margin-top: 15px;
    display: none;
}

.thumbnail-progress {
    height: 6px;
    border-radius: 3px;
    overflow: hidden;
    background-color: #e2e8f0;
}

.thumbnail-progress .progress-bar {
    background-image: var(--primary-gradient);
    transition: width 0.5s ease;
}

.status-text {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    margin-top: 8px;
    color: var(--text-muted);
}


.existing-image-container {
    margin-top: 15px;
}

.existing-image-wrapper {
    position: relative;
    display: inline-block;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--card-shadow);
    transition: all 0.3s ease;
}

.existing-image-wrapper:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.existing-image-preview {
    position: relative;
    width: 200px;
    height: 150px;
    overflow: hidden;
}

.existing-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.existing-image-wrapper:hover .existing-image {
    transform: scale(1.05);
}

.existing-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
    display: flex;
    align-items: flex-end;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.existing-image-wrapper:hover .existing-image-overlay {
    opacity: 1;
}

.existing-image-info {
    padding: 15px;
    width: 100%;
    color: white;
}

.existing-image-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
    opacity: 0.9;
}

.btn-change-image {
    background: var(--primary-color);
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-change-image:hover {
    background: var(--primary-hover);
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(52, 152, 219, 0.3);
}

.btn-change-image i {
    font-size: 11px;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>


</script>
