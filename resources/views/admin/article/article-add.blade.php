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

        /* Custom styles untuk CKEditor */
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

        /* Style untuk thumbnail uploader */
        .thumbnail-upload-area {
            border: 2px dashed #cbd5e0;
            padding: 30px;
            text-align: center;
            border-radius: 12px;
            background-color: #f7fafc;
            margin-bottom: 25px;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
        }

        .thumbnail-upload-area:hover {
            border-color: #4299e1;
            background-color: #ebf4ff;
        }

        .thumbnail-upload-icon {
            font-size: 2.5rem;
            color: #a0aec0;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .thumbnail-upload-area:hover .thumbnail-upload-icon {
            color: #4299e1;
            transform: scale(1.1);
        }

        .thumbnail-upload-text {
            color: #4a5568;
            font-weight: 500;
        }

        .thumbnail-upload-hint {
            font-size: 0.85rem;
            color: #718096;
            margin-top: 8px;
        }

        .file-input-hidden {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

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

                            <!-- Thumbnail Artikel -->
                            <div class="form-group">
                                <label for="thumbnail">Thumbnail Artikel</label>
                                <div class="thumbnail-upload-area">
                                    <i class="fas fa-cloud-upload-alt thumbnail-upload-icon"></i>
                                    <h5 class="thumbnail-upload-text">Pilih atau Seret File Gambar Thumbnail</h5>
                                    <p class="thumbnail-upload-hint">Format: JPG, PNG, JPEG (Maks: 1024kb)</p>
                                    <input type="file" name="thumbnail" id="thumbnail" class="file-input-hidden">
                                </div>
                            </div>

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
                'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDU2MjU1OTksImp0aSI6IjZhYjhjOGNhLTRlNWUtNDA1NS04MWJhLWMxNjllM2E0MjJlMiIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6ImU1ODVjOGQ3In0.lKlk3KkjcIKJ9fuDmiwXFE66wb2m2H9eiuKNAq7QUb4fA22Gy3kOCOSig3uiaDt3Bl_plWSbS1xhDwZ1q2WEHg';

            const CLOUD_SERVICES_TOKEN_URL =
                'https://nsr96y_lu3xb.cke-cs.com/token/dev/933adc537230dc1f31fb6028ea08e7e014d9bad344ae29f146539107a49a?limit=10';

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
    </script>
@endsection
