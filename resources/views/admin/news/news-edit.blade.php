@extends('admin.layout.main')
@section('title', 'Edit Berita')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Copy all styles from news-add.blade.php */
        .editor-loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 1;
            transition: opacity 0.02s ease-out;
        }

        .editor-loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #4299e1;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            transition: all 0.02s ease;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .editor-wrapper {
            position: relative;
            min-height: 350px;
        }

        .ck-editor__editable {
            min-height: 350px !important;
            max-height: 600px;
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
        }

        .ck.ck-editor__main>.ck-editor__editable {
            padding: 1.5em;
            background-color: #fff;
            border: 1px solid #e0e0e0 !important;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        #formEditNews {
            background: linear-gradient(145deg, #ffffff, #f5f7fa);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            display: block;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 18px;
            z-index: 10;
            transition: all 0.3s;
        }

        .icon-input {
            padding-left: 45px !important;
            height: 50px;
            font-size: 15px;
            border: 2px solid #e0e6ed;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.02);
        }

        .icon-input:focus {
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
            background-color: #fff;
        }

        .icon-input:focus + .input-icon {
            color: #4299e1;
        }

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
            height: 300px;
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
            padding: 30px;
            width: 100%;
        }

        .upload-icon-container {
            margin-bottom: 20px;
            width: 80px;
            height: 80px;
            background: rgba(66, 153, 225, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
        }

        .upload-icon {
            font-size: 36px;
            color: var(--primary-color);
        }

        .upload-text {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .upload-hint {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .thumbnail-preview-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            padding: 10px;
        }

        .thumbnail-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: calc(var(--border-radius) - 4px);
        }

        .thumbnail-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 10px;
            z-index: 20;
        }

        .thumbnail-action-btn {
            width: 36px;
            height: 36px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .thumbnail-action-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }

        .thumbnail-info {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-size: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 20;
            opacity: 0;
            transform: translateY(10px);
            transition: all var(--transition-speed) ease;
        }

        .thumbnail-preview-container:hover .thumbnail-info {
            opacity: 1;
            transform: translateY(0);
        }

        .file-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 70%;
        }

        .file-size {
            font-weight: 600;
        }

        .thumbnail-validation-error {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 10px;
            display: none;
        }

        .btn-save {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.2);
        }

        .btn-save:hover {
            background: linear-gradient(135deg, #3182ce 0%, #5a67d8 100%);
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
        }

        .btn-save:active {
            transform: translateY(1px);
        }

        .btn-save i {
            margin-right: 10px;
            font-size: 1.1em;
        }

        .btn-save:disabled {
            background: #a0aec0;
            cursor: not-allowed;
            box-shadow: none;
            transform: none;
        }

        .section-heading {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 10px;
        }

        .section-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 5px;
        }

        .section-heading i {
            margin-right: 10px;
            color: var(--primary-color);
            font-size: 1.3em;
        }

        .content-card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .content-card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 20px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .content-card-header i {
            margin-right: 12px;
            font-size: 1.4em;
        }

        .content-card-body {
            padding: 30px;
            background-color: #fff;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="content-card">
                <div class="content-card-header">
                    <i class="material-icons-round">edit</i>
                    <span>Edit Berita</span>
                </div>
                <div class="content-card-body">
                    <form id="formEditNews" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{ $news->id }}">
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" id="category" name="category" value="news">

                        <div class="section-heading">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Berita</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Judul Berita</label>
                            <div class="input-icon-wrapper">
                                <i class="input-icon fas fa-heading"></i>
                                <input type="text" class="form-control icon-input" name="title" id="title" value="{{ $news->title }}" placeholder="e.g., Perkembangan Terbaru RSUD Haulussy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author">Penulis</label>
                            <div class="input-icon-wrapper">
                                <i class="input-icon fas fa-user-edit"></i>
                                <input type="text" class="form-control icon-input" name="author" id="author" value="{{ $news->author }}" placeholder="e.g., John Doe">
                            </div>
                        </div>

                        <div class="section-heading mt-5">
                            <i class="fas fa-image"></i>
                            <span>Thumbnail Berita</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Gambar Thumbnail (Opsional)</label>
                            <div class="thumbnail-upload-wrapper">
                                <div class="thumbnail-upload-container">
                                    <div class="thumbnail-dropzone" id="thumbnailDropzone">
                                        <input type="file" name="thumbnail" id="thumbnail" class="thumbnail-input" accept="image/jpeg, image/png, image/jpg">
                                        <div class="thumbnail-placeholder" style="display: {{ $news->thumbnail ? 'none' : 'flex' }};">
                                            <div class="upload-icon-container">
                                                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                            </div>
                                            <p class="upload-text">Seret & Lepas file atau Klik untuk Memilih</p>
                                            <p class="upload-hint">PNG, JPG, atau JPEG (Maks. 1MB)</p>
                                        </div>
                                        <div class="thumbnail-preview-container" id="thumbnailPreviewContainer" style="display: {{ $news->thumbnail ? 'block' : 'none' }};">
                                            <img src="{{ $news->thumbnail ? asset('storage/news_thumbnail/' . $news->thumbnail) : '' }}" alt="Preview" class="thumbnail-preview" id="thumbnailPreview">
                                            <div class="thumbnail-actions">
                                                <button type="button" class="thumbnail-action-btn" id="changeThumbnailBtn" title="Ganti Gambar"><i class="fas fa-sync-alt"></i></button>
                                                <button type="button" class="thumbnail-action-btn" id="removeThumbnailBtn" title="Hapus Gambar"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                            <div class="thumbnail-info">
                                                <span class="file-name" id="fileName">{{ $news->thumbnail ?? 'Nama File' }}</span>
                                                <span class="file-size" id="fileSize"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="thumbnail-validation-error" id="thumbnailError"></div>
                            </div>
                        </div>

                        <div class="section-heading mt-5">
                            <i class="fas fa-file-alt"></i>
                            <span>Konten Berita</span>
                        </div>

                        <div class="form-group">
                            <label for="description">Isi Konten</label>
                            <div class="editor-wrapper">
                                <div class="editor-loading-overlay" id="editorLoading">
                                    <div class="editor-loading-spinner"></div>
                                </div>
                                <textarea name="description" id="description" cols="30" rows="10">{{ $news->description }}</textarea>
                            </div>
                        </div>

                        <button type="button" onclick="updateNews()" class="btn btn-save" id="updateNewsButton">
                            <i class="fas fa-save"></i>
                            <span>Update Berita</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
<script src="{{ asset('js/ckeditor-config.js') }}"></script>
<script>
    let editorInstance;

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor
        initializeCKEditor('description', {
            placeholder: 'Tuliskan konten berita yang menarik di sini...',
            initialData: `{!! addslashes($news->description) !!}`,
            onReady: () => {
                document.getElementById('editorLoading').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('editorLoading').style.display = 'none';
                }, 200);
            }
        }).then(editor => {
            editorInstance = editor;
        }).catch(error => {
            console.error('Error initializing CKEditor:', error);
            const editorWrapper = document.querySelector('.editor-wrapper');
            editorWrapper.innerHTML = '<div class="alert alert-danger">Gagal memuat editor. Silakan coba muat ulang halaman.</div>';
        });

        // Thumbnail upload logic
        const dropzone = document.getElementById('thumbnailDropzone');
        const input = document.getElementById('thumbnail');
        const previewContainer = document.getElementById('thumbnailPreviewContainer');
        const previewImg = document.getElementById('thumbnailPreview');
        const placeholder = document.querySelector('.thumbnail-placeholder');
        const errorDiv = document.getElementById('thumbnailError');
        const fileNameSpan = document.getElementById('fileName');
        const fileSizeSpan = document.getElementById('fileSize');

        dropzone.addEventListener('click', () => input.click());
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('drag-over');
        });
        dropzone.addEventListener('dragleave', () => dropzone.classList.remove('drag-over'));
        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('drag-over');
            if (e.dataTransfer.files.length) {
                input.files = e.dataTransfer.files;
                handleFile(input.files[0]);
            }
        });

        input.addEventListener('change', () => {
            if (input.files.length) {
                handleFile(input.files[0]);
            }
        });

        document.getElementById('changeThumbnailBtn').addEventListener('click', () => input.click());
        document.getElementById('removeThumbnailBtn').addEventListener('click', () => {
            input.value = '';
            previewContainer.style.display = 'none';
            placeholder.style.display = 'flex';
            errorDiv.style.display = 'none';
            errorDiv.textContent = '';
            // Add a hidden input to signal removal of thumbnail on the backend
            if (!document.querySelector('input[name="remove_thumbnail"]')) {
                const removeInput = document.createElement('input');
                removeInput.type = 'hidden';
                removeInput.name = 'remove_thumbnail';
                removeInput.value = '1';
                document.getElementById('formEditNews').appendChild(removeInput);
            }
        });

        function handleFile(file) {
            if (!validateFile(file)) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileNameSpan.textContent = file.name;
                fileSizeSpan.textContent = `${(file.size / 1024).toFixed(1)} KB`;
                placeholder.style.display = 'none';
                previewContainer.style.display = 'block';
                // Remove the 'remove_thumbnail' signal if a new file is chosen
                const removeInput = document.querySelector('input[name="remove_thumbnail"]');
                if (removeInput) removeInput.remove();
            };
            reader.readAsDataURL(file);
        }

        function validateFile(file) {
            errorDiv.style.display = 'none';
            errorDiv.textContent = '';

            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const maxSize = 1 * 1024 * 1024; // 1MB

            if (!allowedTypes.includes(file.type)) {
                errorDiv.textContent = 'Format file tidak valid. Gunakan PNG, JPG, atau JPEG.';
                errorDiv.style.display = 'block';
                return false;
            }

            if (file.size > maxSize) {
                errorDiv.textContent = `Ukuran file terlalu besar. Maksimal 1MB (file Anda ${(file.size / 1024 / 1024).toFixed(2)}MB).`;
                errorDiv.style.display = 'block';
                return false;
            }

            return true;
        }
    });

    function updateNews() {
        const button = document.getElementById('updateNewsButton');
        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengupdate...';

        const formData = new FormData(document.getElementById('formEditNews'));
        const description = editorInstance.getData();
        formData.set('description', description);

        // Validation
        let isValid = true;
        const title = formData.get('title');
        const author = formData.get('author');

        if (!title.trim()) {
            toastr.error('Judul berita tidak boleh kosong.');
            isValid = false;
        }
        if (!author.trim()) {
            toastr.error('Penulis tidak boleh kosong.');
            isValid = false;
        }
        if (!description.trim() || description === '<p></p>') {
            toastr.error('Konten berita tidak boleh kosong.');
            isValid = false;
        }

        if (!isValid) {
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-save"></i> <span>Update Berita</span>';
            return;
        }

        $.ajax({
            type: 'POST',
            url: '/news/update',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success('Berita berhasil diupdate!');
                setTimeout(() => {
                    window.location.href = response.redirect_url;
                }, 1500);
            },
            error: function(xhr) {
                button.disabled = false;
                button.innerHTML = '<i class="fas fa-save"></i> <span>Update Berita</span>';
                const errors = xhr.responseJSON.errors;
                if (errors) {
                    let errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += value.join(' ') + '\n';
                    });
                    toastr.error(errorMessages, 'Gagal Validasi');
                } else {
                    toastr.error(xhr.responseJSON.message || 'Terjadi kesalahan saat mengupdate berita.');
                }
            }
        });
    }
</script>
@endsection
