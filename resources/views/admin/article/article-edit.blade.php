@extends('admin.layout.main')
@section('title', 'Edit Artikel')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
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
        #formEditArticle {
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

        /* Style untuk tombol simpan */
        .btn-save {
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

        .btn-save:hover {
            background: linear-gradient(to right, #2c5282, #3182ce);
            box-shadow: 0 6px 20px rgba(49, 130, 206, 0.25);
            transform: translateY(-2px);
        }

        .btn-save:active {
            transform: translateY(1px);
        }

        .btn-save i {
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

        /* Status badge */
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 15px;
        }

        .status-badge.draft {
            background-color: #edf2f7;
            color: #4a5568;
        }

        .status-badge.published {
            background-color: #c6f6d5;
            color: #2f855a;
        }

        /* Original content info */
        .original-info {
            background-color: #f7fafc;
            border-left: 4px solid #4299e1;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 0 8px 8px 0;
        }

        .original-info p {
            margin: 0;
            color: #4a5568;
            font-size: 0.9rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #formEditArticle {
                padding: 20px;
            }

            .content-card-body {
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
                        <i class="fas fa-edit"></i>
                        <h5 class="mb-0">Edit Artikel</h5>
                        <span class="status-badge published">Diterbitkan: {{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="content-card-body">
                        <div class="original-info">
                            <p><i class="fas fa-info-circle mr-2"></i> Anda sedang mengedit artikel <strong>{{ $article->title }}</strong> yang dibuat oleh <strong>{{ $article->author }}</strong></p>
                        </div>

                        <form id="formEditArticle" method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <!-- Judul & Author Section -->
                            <h3 class="section-heading"><i class="fas fa-heading"></i> Informasi Artikel</h3>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Judul Artikel</label>
                                        <div class="input-icon-wrapper">
                                            <input type="text" class="form-control icon-input" name="title" id="title"
                                                value="{{ $article->title }}">
                                            <i class="fas fa-heading input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">Pembuat Artikel</label>
                                        <div class="input-icon-wrapper">
                                            <input type="text" class="form-control icon-input" name="author" id="author"
                                                value="{{ $article->author }}">
                                            <i class="fas fa-user-edit input-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Konten Artikel -->
                            <h3 class="section-heading"><i class="fas fa-file-alt"></i> Konten Artikel</h3>
                            <div class="form-group mb-4">
                                <p class="text-muted mb-3">Edit konten artikel sesuai kebutuhan.</p>
                                <textarea name="description" id="description" cols="30" rows="10">{{ $article->description }}</textarea>
                                <div class="small text-muted mt-2">
                                    <i class="fas fa-info-circle mr-1"></i> Perubahan yang Anda buat akan langsung ditampilkan di website
                                </div>
                            </div>

                            <!-- Hidden field untuk menyimpan data CKEditor -->
                            <input type="hidden" id="description_data" name="description_data" value="{{ $article->description }}">

                            <!-- Aksi -->
                            <div class="form-group text-center mt-5">
                                <button type="submit" class="btn-save" id="editArticleButton">
                                    <i class="fas fa-save"></i>Simpan Perubahan
                                </button>
                            </div>
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
            // Form submit handler
            $('#formEditArticle').on('submit', function(e) {
                e.preventDefault();

                // Disable tombol untuk mencegah submit berulangg
                document.getElementById("editArticleButton").disabled = true;

                try {
                    // Perksa apakahh editor sudah siapp
                    if (!window.editor) {
                        console.error('Editor belum siap');
                        toastr.error("Editor belum siap, silakan muat ulang halaman");
                        document.getElementById("editArticleButton").disabled = false;
                        return;
                    }

                    // Ambil nilai dari inputt
                    let title = $("#title").val();
                    let author = $("#author").val();
                    let description = window.editor.getData();

                    console.log('DATA EDITOR:', description);

                    // Valdasi input dasar
                    if (!title || title.trim() === '') {
                        toastr.error("Judul artikel tidak boleh kosong");
                        document.getElementById("editArticleButton").disabled = false;
                        return;
                    }

                    if (!author || author.trim() === '') {
                        toastr.error("Pembuat artikel tidak boleh kosong");
                        document.getElementById("editArticleButton").disabled = false;
                        return;
                    }

                    // Validasi isi editor
                    if (!description || description.trim() === '') {
                        toastr.error("Konten artikel tidak boleh kosong");
                        document.getElementById("editArticleButton").disabled = false;
                        return;
                    }

                    // ID artikel dari URL
                    const articleId = {{ $article->id }};

                    // Siapkan formData dengan APPENDING description
                    const formData = new FormData();
                    formData.append('_token', $('input[name="_token"]').val());
                    formData.append('_method', 'PATCH');
                    formData.append('title', title);
                    formData.append('author', author);
                    formData.append('description', description);

                    // Debug log untuk memastikan data sudah benar ka blm
                    for (let pair of formData.entries()) {
                        console.log(pair[0] + ': ' + (pair[0] === 'description' ?
                            ('[data length: ' + pair[1].length + ', excerpt: ' + pair[1].substring(0, 50) + '...]') :
                            pair[1]));
                    }

                    // Kirim AJAX request
                    $.ajax({
                        url: `/article/${articleId}`,
                        method: "POST", // Gunakan POST dengan _method=PATCH untuk compatibility
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function(xhr) {
                            const csrfToken = $('meta[name=csrf-token]').attr('content');
                            xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                        },
                        success: function(data) {
                            toastr.success(data.message || "Artikel berhasil diperbarui");
                            setTimeout(function() {
                                window.location.href = '/article';
                            }, 2000);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error response:", xhr.responseJSON);
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                toastr.error(xhr.responseJSON.message);
                            } else {
                                toastr.error("Terjadi kesalahan. Silakan coba lagi.");
                            }
                            document.getElementById("editArticleButton").disabled = false;
                        }
                    });
                } catch (e) {
                    console.error("Terjadi kesalahan:", e);
                    toastr.error("Terjadi kesalahan saat mengedit artikel");
                    document.getElementById("editArticleButton").disabled = false;
                }
            });

            // Pastikan form di-reset saat halaman dimuat
            $('#formEditArticle')[0].reset();

            // Memastikan content editor bisa diambil dengan benar
            window.addEventListener('load', function() {
                setTimeout(function() {
                    if (window.editor) {
                        // Verifikasi konten editor setelah halaman dimuat sepenuhnya
                        console.log('Content editor saat halaman dimuat:', window.editor.getData() ? window.editor.getData().substring(0, 100) + '...' : '(kosong)');
                    }
                }, 1000);
            });

            const {
                ClassicEditor,
                Alignment,
                AutoLink,
                Autosave,
                BlockQuote,
                Bold,
                Bookmark,
                Code,
                Essentials,
                FontBackgroundColor,
                FontColor,
                FontFamily,
                FontSize,
                Heading,
                Highlight,
                HorizontalLine,
                ImageEditing,
                ImageUtils,
                Indent,
                IndentBlock,
                Italic,
                Link,
                Paragraph,
                RemoveFormat,
                Strikethrough,
                Subscript,
                Superscript,
                Table,
                TableCaption,
                TableCellProperties,
                TableColumnResize,
                TableProperties,
                TableToolbar,
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
                'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NDc0Mzk5OTksImp0aSI6ImFmYzc4NGMxLTI1N2MtNDNmOS04ZThiLWM0ZTdjZWFlN2IxZCIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiLCJzaCJdLCJ3aGl0ZUxhYmVsIjp0cnVlLCJsaWNlbnNlVHlwZSI6InRyaWFsIiwiZmVhdHVyZXMiOlsiKiJdLCJ2YyI6IjQ1ZjJiNDc0In0.LcYfyVA0qhN3I21xYcctXgJsTqT87C1zcYnhfhfT-cBmqqPmZSo2ppab4gJWV5Hkd3oBQKzLWcHkoCWcImI_Nw';

            const CLOUD_SERVICES_TOKEN_URL =
                'https://nsr96y_lu3xb.cke-cs.com/token/dev/933adc537230dc1f31fb6028ea08e7e014d9bad344ae29f146539107a49a?limit=10';

            const editorConfig = {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'fontSize',
                        'fontFamily',
                        'fontColor',
                        'fontBackgroundColor',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        '|',
                        'link',
                        'insertTable',
                        'highlight',
                        'blockQuote',
                        '|',
                        'alignment',
                        '|',
                        'outdent',
                        'indent'
                    ],
                    shouldNotGroupWhenFull: false
                },
                plugins: [
                    Alignment,
                    AutoLink,
                    Autosave,
                    BlockQuote,
                    Bold,
                    Bookmark,
                    Code,
                    Essentials,
                    FontBackgroundColor,
                    FontColor,
                    FontFamily,
                    FontSize,
                    Heading,
                    Highlight,
                    HorizontalLine,
                    ImageEditing,
                    ImageUtils,
                    Indent,
                    IndentBlock,
                    Italic,
                    Link,
                    Paragraph,
                    RemoveFormat,
                    Strikethrough,
                    Subscript,
                    Superscript,
                    Table,
                    TableCaption,
                    TableCellProperties,
                    TableColumnResize,
                    TableProperties,
                    TableToolbar,
                    Underline
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

            // Log untuk memastikan konten textarea description
            console.log('Konten textarea description:', $('#description').val() ? $('#description').val().substring(0, 100) + '...' : '(kosong)');

            ClassicEditor.create(document.querySelector('#description'), editorConfig)
                .then(newEditor => {
                    window.editor = newEditor;
                    console.log('Editor berhasil dibuat');
                    // Verifikasi konten editor setelah dibuat
                    console.log('Konten editor setelah dibuat:', window.editor.getData() ? window.editor.getData().substring(0, 100) + '...' : '(kosong)');
                })
                .catch(error => {
                    console.error('Error saat membuat editor:', error);
                });
        });
    </script>
@endsection
