@extends('admin.layout.main')
@section('title', 'Buat Artikel')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Loading overlay untuk CKEditor */
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
            transition: opacity 0.3s ease-out;
        }

        .editor-loading-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #4299e1;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .editor-wrapper {
            position: relative;
            min-height: 350px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        /* Custom styles untuk CKEditor */
        .ck-editor__editable {
            min-height: 350px !important;
            max-height: 600px;
            font-family: 'Open Sans', sans-serif;
            line-height: 1.6;
            border-radius: 0 0 15px 15px !important;
        }

        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            border-color: #e0e0e0 !important;
        }

        /* Style untuk form */
        #formAddArticle {
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

        /* Icon input styling */
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

        /* Style Thumbnail */
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
            margin: 0 auto 20px;
        }

        .upload-icon {
            font-size: 36px;
            color: var(--primary-color);
        }

        .upload-text {
            display: flex;
            flex-direction: column;
        }

        .upload-text .primary-text {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .upload-text .secondary-text {
            font-size: 14px;
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
            padding: 20px;
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

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        /* Akhir Style Thumbnail */



        /* Style untuk tombol posting */
        .btn-posting {
            background: linear-gradient(to right, #3182ce, #4299e1);
            color: white;
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 25px;
            box-shadow: 0 4px 15px rgba(49, 130, 206, 0.2);
        }

        .btn-posting:hover {
            background: linear-gradient(to right, #2c5282, #3182ce);
            box-shadow: 0 6px 20px rgba(49, 130, 206, 0.25);
            transform: translateY(-2px);
        }

        .btn-posting:active {
            transform: translateY(1px);
        }

        .btn-posting i {
            margin-right: 10px;
            font-size: 1.1em;
        }

        /* Section heading */
        .section-heading {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2d3748;
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
            background: linear-gradient(to right, #4299e1, #7f9cf5);
            border-radius: 5px;
        }

        .section-heading i {
            margin-right: 10px;
            color: #4299e1;
            font-size: 1.3em;
        }

        /* Card styling */
        .content-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .content-card-header {
            background: linear-gradient(to right, #4299e1, #7f9cf5);
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #formAddArticle {
                padding: 20px;
            }

            .content-card-body {
                padding: 20px;
            }

            .thumbnail-upload-area {
                padding: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="content-card">
                    <div class="content-card-header">
                        <i class="fas fa-feather-alt"></i>
                        <h5 class="mb-0">Buat Artikel Baru</h5>
                    </div>
                    <div class="content-card-body">
                        <form id="formAddArticle" enctype="multipart/form-data">
                            <input type="hidden" id="user_id" name="user_id" value={{ Auth::user()->id }}>

                            <!-- Judul Artikel Section -->
                            <h3 class="section-heading"><i class="fas fa-heading"></i> Informasi Artikel</h3>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Judul Artikel</label>
                                        <div class="input-icon-wrapper">
                                            <input type="text" class="form-control icon-input" name="title" id="title"
                                                placeholder="Masukkan judul artikel...">
                                            <i class="fas fa-heading input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">Pembuat Artikel</label>
                                        <div class="input-icon-wrapper">
                                            <input type="text" class="form-control icon-input" name="author" id="author"
                                                placeholder="Masukkan nama penulis...">
                                            <i class="fas fa-user-edit input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Category and Tags Section -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Kategori Artikel <span class="text-danger">*</span></label>
                                        <div class="input-icon-wrapper">
                                            <select class="form-control icon-input" name="category_id" id="category_id" required>
                                                <option value="">Pilih Kategori...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <i class="fas fa-tags input-icon"></i>
                                        </div>
                                        <small class="text-muted">Pilih kategori yang sesuai untuk artikel ini</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tags">Tags Artikel</label>
                                        <div class="input-icon-wrapper">
                                            <input type="text" class="form-control icon-input" name="tags" id="tags"
                                                placeholder="Contoh: kesehatan, jantung, tips">
                                            <i class="fas fa-hashtag input-icon"></i>
                                        </div>
                                        <small class="text-muted">Pisahkan tags dengan koma (contoh: kesehatan, jantung, tips)</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Thumbnail Section -->
                            <h3 class="section-heading"><i class="fas fa-image"></i> Thumbnail Artikel</h3>
                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="thumbnail" class="control-label">Upload Thumbnail</label>
                                        <div class="thumbnail-upload-wrapper">
                                            <div class="thumbnail-upload-container">
                                                <div class="thumbnail-dropzone" id="thumbnail-dropzone">
                                                    <input type="file" class="thumbnail-input" name="thumbnail" id="thumbnail" accept=".jpg,.jpeg,.png">
                                                    <!-- Area saat belum ada file dipilih -->
                                                    <div class="thumbnail-placeholder">
                                                        <div class="upload-icon-container">
                                                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                                        </div>
                                                        <div class="upload-text">
                                                            <span class="primary-text">Klik atau seret gambar ke sini</span>
                                                            <span class="secondary-text">Format: JPG, JPEG, PNG | Maks: 1024 KB</span>
                                                        </div>
                                                    </div>
                                                    <!-- Area setelah file dipilih (preview) -->
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
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Thumbnail Section -->


                            <!-- Konten Artikel -->
                            <h3 class="section-heading"><i class="fas fa-file-alt"></i> Konten Artikel</h3>
                            <div class="form-group mb-4">
                                <p class="text-muted mb-3">Tulis konten artikel lengkap dengan format yang diinginkan.</p>
                                <div class="editor-wrapper">
                                    <div class="editor-loading-overlay" id="editorLoadingOverlay">
                                        <div class="editor-loading-spinner"></div>
                                    </div>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                                <div class="small text-muted mt-2">
                                    <i class="fas fa-info-circle mr-1"></i> Tip: Gunakan heading untuk membuat struktur artikel yang mudah dibaca
                                </div>
                            </div>

                            <input type="hidden" id="category" name="category" value="article">

                            <!-- Aksi -->
                            <div class="form-group text-center mt-5">
                                <button type="button" onclick="addArticle()" class="btn-posting"
                                    id="addArticleButton">
                                    <i class="fas fa-paper-plane"></i>Publish Artikel
                                </button>
                            </div>

                            <!-- Hidden field untuk menyimpan data CKEditor -->
                            <input type="hidden" id="description_data" name="description_data">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            const {
                ClassicEditor,
                Alignment,
                Autoformat,
                AutoImage,
                AutoLink,
                Autosave,
                BalloonToolbar,
                BlockQuote,
                BlockToolbar,
                Bold,
                Bookmark,
                CKBox,
                CKBoxImageEdit,
                CloudServices,
                Code,
                Emoji,
                Essentials,
                FindAndReplace,
                FontBackgroundColor,
                FontColor,
                FontFamily,
                FontSize,
                GeneralHtmlSupport,
                Heading,
                Highlight,
                HorizontalLine,
                ImageBlock,
                ImageCaption,
                ImageEditing,
                ImageInline,
                ImageInsert,
                ImageInsertViaUrl,
                ImageResize,
                ImageStyle,
                ImageTextAlternative,
                ImageToolbar,
                ImageUpload,
                ImageUtils,
                Indent,
                IndentBlock,
                Italic,
                Link,
                LinkImage,
                List,
                ListProperties,
                Mention,
                PageBreak,
                Paragraph,
                PasteFromOffice,
                PictureEditing,
                RemoveFormat,
                SpecialCharacters,
                SpecialCharactersArrows,
                SpecialCharactersCurrency,
                SpecialCharactersEssentials,
                SpecialCharactersLatin,
                SpecialCharactersMathematical,
                SpecialCharactersText,
                Strikethrough,
                Style,
                Subscript,
                Superscript,
                Table,
                TableCaption,
                TableCellProperties,
                TableColumnResize,
                TableProperties,
                TableToolbar,
                TextTransformation,
                TodoList,
                Underline
            } = window.CKEDITOR;

            const {
                CaseChange,
                ExportPdf,
                ExportWord,
                FormatPainter,
                ImportWord,
                MergeFields,
                MultiLevelList,
                PasteFromOfficeEnhanced,
                SlashCommand,
                TableOfContents,
                Template
            } = window.CKEDITOR_PREMIUM_FEATURES;

            const LICENSE_KEY =
                'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NTYwNzk5OTksImp0aSI6IjgwYTJjZTNhLTA0NzctNDRmZC05MDhhLWNhYzU3NWM4MGNhNCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjFmOGI1ZGFlIn0.iMl_jecVEl5HWXuEJ-HTjLMIc6c_hLn_Q10oZPSvjSJ8Fouj_oypg8mw3zy51RESwVFjztIExOR0OjJplMN1Bg';

            const CLOUD_SERVICES_TOKEN_URL =
                'https://0gxuc9yax0tm.cke-cs.com/token/dev/2e1acbd5194563d6575a37c0d6ed7a0d2529b4113652c5b3df32b133a4f5?limit=10';

            const editorConfig = {
                toolbar: {
                    items: [
                        'insertMergeField',
                        'previewMergeFields',
                        '|',
                        'importWord',
                        'exportWord',
                        'exportPdf',
                        'formatPainter',
                        'caseChange',
                        'findAndReplace',
                        '|',
                        'heading',
                        'style',
                        '|',
                        'fontSize',
                        'fontFamily',
                        'fontColor',
                        'fontBackgroundColor',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'strikethrough',
                        'subscript',
                        'superscript',
                        'code',
                        'removeFormat',
                        '|',
                        'emoji',
                        'specialCharacters',
                        'horizontalLine',
                        'pageBreak',
                        'link',
                        'bookmark',
                        'insertImage',
                        'insertImageViaUrl',
                        'ckbox',
                        'insertTable',
                        'tableOfContents',
                        'insertTemplate',
                        'highlight',
                        'blockQuote',
                        '|',
                        'alignment',
                        '|',
                        'bulletedList',
                        'numberedList',
                        'multiLevelList',
                        'todoList',
                        'outdent',
                        'indent',
                        '|',
                        'undo',
                        'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },
                plugins: [
                    Alignment,
                    Autoformat,
                    AutoImage,
                    AutoLink,
                    Autosave,
                    BalloonToolbar,
                    BlockQuote,
                    BlockToolbar,
                    Bold,
                    Bookmark,
                    CKBox,
                    CKBoxImageEdit,
                    CloudServices,
                    Code,
                    Emoji,
                    Essentials,
                    FindAndReplace,
                    FontBackgroundColor,
                    FontColor,
                    FontFamily,
                    FontSize,
                    GeneralHtmlSupport,
                    Heading,
                    Highlight,
                    HorizontalLine,
                    ImageBlock,
                    ImageCaption,
                    ImageEditing,
                    ImageInline,
                    ImageInsert,
                    ImageInsertViaUrl,
                    ImageResize,
                    ImageStyle,
                    ImageTextAlternative,
                    ImageToolbar,
                    ImageUpload,
                    ImageUtils,
                    Indent,
                    IndentBlock,
                    Italic,
                    Link,
                    LinkImage,
                    List,
                    ListProperties,
                    Mention,
                    PageBreak,
                    Paragraph,
                    PasteFromOffice,
                    PictureEditing,
                    RemoveFormat,
                    SpecialCharacters,
                    SpecialCharactersArrows,
                    SpecialCharactersCurrency,
                    SpecialCharactersEssentials,
                    SpecialCharactersLatin,
                    SpecialCharactersMathematical,
                    SpecialCharactersText,
                    Strikethrough,
                    Style,
                    Subscript,
                    Superscript,
                    Table,
                    TableCaption,
                    TableCellProperties,
                    TableColumnResize,
                    TableProperties,
                    TableToolbar,
                    TextTransformation,
                    TodoList,
                    Underline,
                    CaseChange,
                    ExportPdf,
                    ExportWord,
                    FormatPainter,
                    ImportWord,
                    MergeFields,
                    MultiLevelList,
                    PasteFromOfficeEnhanced,
                    SlashCommand,
                    TableOfContents,
                    Template
                ],
                balloonToolbar: ['bold', 'italic', '|', 'link', 'insertImage', '|', 'bulletedList', 'numberedList'],
                blockToolbar: [
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    '|',
                    'bold',
                    'italic',
                    '|',
                    'link',
                    'insertImage',
                    'insertTable',
                    '|',
                    'bulletedList',
                    'numberedList',
                    'outdent',
                    'indent'
                ],
                cloudServices: {
                    tokenUrl: CLOUD_SERVICES_TOKEN_URL
                },
                licenseKey: LICENSE_KEY,
                placeholder: 'Silahkan Tulis Konten Artikel...',
                fontFamily: {
                    supportAllValues: true
                },
                fontSize: {
                    options: [10, 12, 14, 'default', 18, 20, 22],
                    supportAllValues: true
                },
                heading: {
                    options: [
                        {
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                htmlSupport: {
                    allow: [
                        {
                            name: /^.*$/,
                            styles: true,
                            attributes: true,
                            classes: true
                        }
                    ]
                },
                image: {
                    toolbar: [
                        'toggleImageCaption',
                        'imageTextAlternative',
                        '|',
                        'imageStyle:inline',
                        'imageStyle:wrapText',
                        'imageStyle:breakText',
                        '|',
                        'resizeImage'
                    ]
                },
                link: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://'
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                style: {
                    definitions: [
                        {
                            name: 'Article category',
                            element: 'h3',
                            classes: ['category']
                        },
                        {
                            name: 'Title',
                            element: 'h2',
                            classes: ['document-title']
                        },
                        {
                            name: 'Subtitle',
                            element: 'h3',
                            classes: ['document-subtitle']
                        },
                        {
                            name: 'Info box',
                            element: 'p',
                            classes: ['info-box']
                        },
                        {
                            name: 'Side quote',
                            element: 'blockquote',
                            classes: ['side-quote']
                        },
                        {
                            name: 'Marker',
                            element: 'span',
                            classes: ['marker']
                        },
                        {
                            name: 'Spoiler',
                            element: 'span',
                            classes: ['spoiler']
                        },
                        {
                            name: 'Code (dark)',
                            element: 'pre',
                            classes: ['fancy-code', 'fancy-code-dark']
                        },
                        {
                            name: 'Code (bright)',
                            element: 'pre',
                            classes: ['fancy-code', 'fancy-code-bright']
                        }
                    ]
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
                }
            };

            // Definisikan variabel editor di scope global
            window.editor = null;

            ClassicEditor.create(document.querySelector('#description'), editorConfig)
                .then(newEditor => {
                    window.editor = newEditor;
                    console.log('Editor berhasil dibuat');

                    // Sembunyikan loading overlay setelah sperskian detik yang ditentukan di css
                    setTimeout(() => {
                        document.getElementById('editorLoadingOverlay').style.opacity = '0';
                        setTimeout(() => {
                            document.getElementById('editorLoadingOverlay').style.display = 'none';
                        }, 300);
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error saat membuat editor:', error);
                });
        });

        // Thumbnail
        $(document).ready(function() {

            $('#thumbnail').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const fileName = file.name;
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
                        var img = new Image();
                        img.onload = function() {
                            $('#filesize-display').append(' • ' + this.width + ' × ' + this.height + ' px');
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

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
                setTimeout(function() {
                    $('.progress-bar').css('width', '30%');
                    $('.status-text').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Memvalidasi format...');
                }, 500);
                setTimeout(function() {
                    $('.progress-bar').css('width', '60%');
                    $('.status-text').html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Mengoptimalkan gambar...');
                }, 1000);
                setTimeout(function() {
                    $('.progress-bar').css('width', '100%');
                    $('.status-text').html('<i class="fas fa-check-circle mr-2 text-success"></i> File siap diunggah');
                }, 1500);
            }
        });
        // Akhir Thumbnail



        function addArticle() {
            console.log('Fungsi addArticle dipanggil');

            // Periksa apakah editor sudah siap
            if (!window.editor) {
                console.error('Editor belum siap');
                toastr.error("Editor belum siap, silakan muat ulang halaman");
                return;
            }

            // Ambil data editor dan simpan ke field tersembunyi
            const editorData = window.editor.getData();
            $('#description_data').val(editorData);
            console.log('Content dari editor:', editorData);

            const user_id = $('#user_id').val();
            const category = $('#category').val();
            const category_id = $('#category_id').val();
            const tags = $('#tags').val();
            const title = $('#title').val();
            const author = $('#author').val();
            const description = editorData; // Gunakan data dari editor
            const fileInput = document.getElementById('thumbnail');
            const thumbnail = fileInput.files[0];
            const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            const maxSizeInBytes = 1 * 1024 * 1024; // 1024 kb

            if (title === '') {
                toastr.error("Judul artikel harus diisi");
            } else if (author === '') {
                toastr.error("Author artikel harus diisi");
            } else if (category_id === '') {
                toastr.error("Kategori artikel harus dipilih");
            } else if (!thumbnail) {
                toastr.error("Thumbnail artikel harus diisi");
            } else if (!allowedExtensions.exec(thumbnail.name)) {
                toastr.error("Thumbnail artikel harus memiliki ekstensi (JPG / JPEG/ PNG)");
            } else if(thumbnail.size > maxSizeInBytes){
                toastr.error("Ukuran gambar thumbnail maksimal 1024 kb")
            } else if (description === '') {
                toastr.error("Konten artikel harus diisi");
            } else {
                document.getElementById("addArticleButton").disabled = true;

                let formData = new FormData();
                formData.append('thumbnail', thumbnail);
                formData.append("user_id", user_id);
                formData.append("title", title);
                formData.append("author", author);
                formData.append("description", description);
                formData.append("category", category);
                formData.append("category_id", category_id);
                formData.append("tags", tags);

                const csrfToken = $('meta[name=csrf-token]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: '/article',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function(xhr) {
                        console.log('Mengirim data artikel:', {
                            title: title,
                            author: author,
                            description_length: description ? description.length : 0,
                            user_id: user_id,
                            category: category
                        });
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                    },
                    success: function(response) {
                        console.log('Berhasil menyimpan artikel:', response);
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saat menyimpan artikel:', xhr, status, error);
                        let errorMessage = 'Terjadi kesalahan saat menyimpan artikel';

                        if (xhr && xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        toastr.error(errorMessage);
                        document.getElementById("addArticleButton").disabled = false;
                    }
                });
            }
        }

        // Tag autocomplete functionality
        $(document).ready(function() {
            let availableTags = [];
            let tagTimeout;

            // Load existing tags on page load
            loadExistingTags();

            function loadExistingTags() {
                $.ajax({
                    url: '/api/tags/search',
                    method: 'GET',
                    data: { q: '' },
                    success: function(tags) {
                        availableTags = tags.map(tag => tag.text);
                    }
                });
            }

            // Tag input with autocomplete
            $('#tags').on('input', function() {
                clearTimeout(tagTimeout);
                const query = $(this).val().split(',').pop().trim();
                
                if (query.length > 1) {
                    tagTimeout = setTimeout(function() {
                        searchTags(query);
                    }, 300);
                }
            });

            function searchTags(query) {
                $.ajax({
                    url: '/api/tags/search',
                    method: 'GET',
                    data: { q: query },
                    success: function(tags) {
                        if (tags.length > 0) {
                            showTagSuggestions(tags);
                        } else {
                            hideTagSuggestions();
                        }
                    }
                });
            }

            function showTagSuggestions(tags) {
                hideTagSuggestions(); // Remove existing suggestions

                const $input = $('#tags');
                const offset = $input.offset();
                const $suggestions = $('<div>')
                    .addClass('tag-suggestions')
                    .css({
                        position: 'absolute',
                        top: offset.top + $input.outerHeight(),
                        left: offset.left,
                        width: $input.outerWidth(),
                        background: 'white',
                        border: '1px solid #ddd',
                        borderRadius: '4px',
                        boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
                        maxHeight: '200px',
                        overflowY: 'auto',
                        zIndex: 1000
                    });

                tags.forEach(function(tag) {
                    const $suggestion = $('<div>')
                        .addClass('tag-suggestion')
                        .css({
                            padding: '8px 12px',
                            cursor: 'pointer',
                            borderBottom: '1px solid #eee'
                        })
                        .html(`<strong>${tag.text}</strong> <small class="text-muted">(${tag.usage_count} artikel)</small>`)
                        .hover(
                            function() { $(this).css('background', '#f5f5f5'); },
                            function() { $(this).css('background', 'white'); }
                        )
                        .click(function() {
                            addTagToInput(tag.text);
                            hideTagSuggestions();
                        });

                    $suggestions.append($suggestion);
                });

                $('body').append($suggestions);
            }

            function addTagToInput(tagName) {
                const $input = $('#tags');
                const currentValue = $input.val();
                const tags = currentValue.split(',').map(t => t.trim()).filter(t => t);
                
                // Remove the last incomplete tag and add the selected one
                tags.pop();
                tags.push(tagName);
                
                $input.val(tags.join(', ') + ', ');
                $input.focus();
            }

            function hideTagSuggestions() {
                $('.tag-suggestions').remove();
            }

            // Hide suggestions when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#tags, .tag-suggestions').length) {
                    hideTagSuggestions();
                }
            });
        });
    </script>
@endsection
