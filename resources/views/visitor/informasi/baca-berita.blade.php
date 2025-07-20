@extends('visitor.layout.main')

@section('title', $new->title)

@section('style')
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/table-of-contents.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-meta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/related-articles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/visitor/components/article-animations.css') }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="container article-container">
        <div class="row">
            <!-- Bagian Kiri (67%) -->
            <div class="col-md-8 col-lg-8 left-panel">
                    <h2 class="article-title">{{ $new->title }}</h2>
                    <div class="d-flex flex-column flex-xl-row justify-content-between align-items-start align-items-xl-center mb-3 article-meta-section">
                        <div class="article-info mb-2 mb-xl-0">
                            <div class="article-meta-wrapper">
                                <span class="article-meta-item">
                                    <i class="fas fa-user-edit"></i>
                                    <span class="meta-text">{{ $new->author }}</span>
                                </span>
                                <span class="article-meta-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="meta-text">{{ $new->created_at->format('d - m - Y') }}</span>
                                </span>
                                <span class="article-meta-item">
                                    <i class="far fa-eye"></i>
                                    <span class="meta-text">{{ number_format($new->views) }} kali dibaca</span>
                                </span>
                                <span class="article-meta-item">
                                    <i class="far fa-clock"></i>
                                    <span class="meta-text">
                                        @php
                                            $readTime = strlen($new->description) > 0
                                                ? max(2, ceil(str_word_count(strip_tags($new->description)) / 200))
                                                : 2;
                                        @endphp
                                        {{ $readTime }} menit
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="social-sharing">
                            <button type="button" class="share-btn copy" id="copyButton" onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i> <span class="copy-text">Salin URL</span>
                            </button>
                            <a href="#" class="share-btn whatsapp" id="shareWhatsApp" onclick="shareWhatsApp(event)">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="#" class="share-btn facebook" id="shareFacebook" onclick="shareFacebook(event)">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="share-btn x-twitter" id="shareTwitter" onclick="shareTwitter(event)">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                            <a href="#" class="share-btn telegram" id="shareTelegram" onclick="shareTelegram(event)">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset('images/news/thumbnails/' . $new->thumbnail) }}" class="article-thumbnail img-fluid">

                    <!-- Daftar Isi akan ditambahkan di sini oleh JavaScript -->
                    <div id="toc-placeholder"></div>

                    <div class="article-content">
                        {!! $new->description !!}
                    </div>
            </div>
            <!-- Bagian Kanan (40%) -->
                <div class="col-md-4 col-lg-4 right-panel other-articles">
                    <div class="articles-wrapper">
                        <h3 class="articles-title">Berita Lainnya</h3>
                        @if(count($news) > 0)
                            <div class="articles-container">
                        @foreach ($news as $relatedNews)
                            <a href="/berita/{{ $relatedNews->slug }}" class="related-article-card">
                                <div class="related-article-thumbnail-wrapper">
                                    <img src="{{ asset('images/news/thumbnails/' . $relatedNews->thumbnail) }}"
                                         alt="Thumbnail {{ $relatedNews->title }}"
                                         class="related-article-thumbnail">
                                    <div class="related-article-thumbnail-overlay">Berita</div>
                                </div>
                                <div class="related-article-content">
                                    <div>
                                        <p class="related-article-title mb-1">{{ $relatedNews->title }}</p>
                                        <div class="related-article-meta">
                                            <small class="related-article-date">
                                                <i class="far fa-calendar-alt"></i>
                                                <span style="margin-left: 5px">{{ $relatedNews->created_at->format('d M Y') }}</span>
                                            </small>
                                            <small class="read-time">
                                                <i class="far fa-clock"></i>
                                                <span style="margin-left: 5px">
                                                @php
                                                    // Menghitung waktu baca berdasarkan konten
                                                    $readTime = strlen($relatedNews->description) > 0
                                                        ? max(2, ceil(str_word_count(strip_tags($relatedNews->description)) / 200))
                                                        : 2;
                                                @endphp
                                                {{ $readTime }} menit
                                                </span>
                                            </small>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="article-category">
                                                <i class="fas fa-newspaper"></i>
                                                Berita
                                            </div>
                                            <div class="article-views">
                                                <i class="far fa-eye"></i>
                                                <span style="margin-left: 5px">{{ $relatedNews->views ?? 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                @endforeach
                            </div>
                        @else
                            <p class="no-other-articles">Belum ada berita lainnya.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Perbaikan tampilan konten artikel saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan ID ke semua heading untuk navigasi
            addIdsToHeadings();

            // Hapus atau sembunyikan TOC dari CKEditor jika ada
            const existingTocs = document.querySelectorAll('.article-content .document-outline');
            existingTocs.forEach(function(toc) {
                toc.remove(); // Hapus benar-benar dari DOM
            });

            // Buat Table of Contents otomatis dan tempatkan di placeholder
            createTableOfContents();

            // Perbaikan untuk tabel dalam artikel
            const tables = document.querySelectorAll('.article-content table');
            tables.forEach(function(table) {
                if (!table.classList.contains('table')) {
                    table.classList.add('table', 'table-bordered', 'table-hover');
                }
            });

            // Perbaikan untuk gambar dalam artikel
            const images = document.querySelectorAll('.article-content img');
            images.forEach(function(img) {
                // Tambahkan class img-fluid jika belum ada
                if (!img.classList.contains('img-fluid')) {
                    img.classList.add('img-fluid');
                }

                // Bungkus gambar dalam div untuk tampilan yang lebih baik
                if (img.parentNode.nodeName !== 'FIGURE' && img.parentNode.nodeName !== 'A') {
                    const wrapper = document.createElement('figure');
                    wrapper.className = 'text-center mb-4';
                    img.parentNode.insertBefore(wrapper, img);
                    wrapper.appendChild(img);
                }
            });

            // Perbaikan untuk link agar tidak terpengaruh styling default
            const links = document.querySelectorAll('.article-content a');
            links.forEach(function(link) {
                link.classList.add('article-link');
            });
        });

        // Fungsi untuk menambahkan ID ke semua heading
        function addIdsToHeadings() {
            const articleContent = document.querySelector('.article-content');
            if (!articleContent) return;

            const headings = articleContent.querySelectorAll('h1, h2, h3, h4, h5, h6');
            let usedIds = {}; // Untuk melacak ID yang sudah digunakan

            headings.forEach(function(heading, index) {
                // Jika sudah ada ID, pastikan itu unik
                let baseId = '';
                if (heading.id) {
                    baseId = heading.id;
                } else {
                    // Buat ID berdasarkan teks heading (slug)
                    baseId = heading.textContent
                        .trim()
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '') // Hapus karakter khusus
                        .replace(/\s+/g, '-') // Ganti spasi dengan dash
                        .slice(0, 50); // Batasi panjang
                }

                // Pastikan ID unik dengan menambahkan counter jika perlu
                let id = baseId;
                let counter = 1;

                while (usedIds[id]) {
                    id = baseId + '-' + counter;
                    counter++;
                }

                // Simpan ID yang telah digunakan
                usedIds[id] = true;

                // Tetapkan ID yang unik ke heading
                heading.id = id;

                // Tambahkan class untuk styling
                heading.classList.add('article-heading');

                // Log ID dan heading untuk debugging
                console.log("Heading ID:", id, "Text:", heading.textContent.trim());
            });
        }

        // Fungsi untuk membuat Table of Contents
        function createTableOfContents() {
            const articleContent = document.querySelector('.article-content');
            if (!articleContent) return;

            // Cari semua heading dalam konten artikel
            const headings = articleContent.querySelectorAll('h1, h2, h3, h4, h5, h6');
            console.log("Total headings found:", headings.length);

            // Filter heading yang valid (punya ID dan teks)
            const validHeadings = Array.from(headings).filter(heading => {
                return heading.id && heading.textContent.trim() !== '';
            });

            console.log("Valid headings after filtering:", validHeadings.length);

            // Hanya buat TOC jika ada minimal 2 heading
            if (validHeadings.length < 2) {
                console.log("Not enough headings to create TOC");
                return;
            }

            // Buat container untuk table of contents dengan inline styles untuk menghindari konflik dengan CSS lama
            const tocContainer = document.createElement('div');
            tocContainer.className = 'table-of-contents';
            tocContainer.id = 'toc';

            // Tambahkan inline style untuk styling TOC yang lebih baik
            const styleElement = document.createElement('style');
            styleElement.textContent = `
                /* Menghapus semua efek lingkaran */
                .table-of-contents-list li::before,
                .table-of-contents-list a::before {
                    display: none !important;
                    content: none !important;
                }

                /* Garis putus-putus yang lebih terlihat */
                .table-of-contents-list li {
                    border-bottom: 1px dashed #b0b0b0;
                    padding-bottom: 10px;
                    margin-bottom: 10px;
                }

                .table-of-contents-list li:last-child {
                    border-bottom: none;
                }

                /* Garis vertikal untuk sub-item yang lebih terlihat */
                .table-of-contents-list ul {
                    border-left: 2px dashed #b0b0b0;
                    padding-left: 20px;
                    margin-top: 10px;
                }

                /* Font yang berbeda untuk TOC */
                .table-of-contents-list {
                    font-family: 'Open Sans', sans-serif;
                }

                /* Item utama dengan font lebih tebal */
                .table-of-contents-list > li > a {
                    color: #333;
                    text-decoration: none;
                    font-weight: 600;
                    display: block;
                    padding: 3px 5px;
                    border-radius: 4px;
                    transition: color 0.2s ease;
                }

                /* Sub-item dengan warna yang lebih proporsional */
                .table-of-contents-list ul a {
                    color: #616161;
                    text-decoration: none;
                    font-size: 0.95em;
                    display: block;
                    padding: 3px 5px;
                    border-radius: 4px;
                    transition: color 0.2s ease;
                }

                /* Hover effect pada item utama */
                .table-of-contents-list > li > a:hover {
                    color: #1976D2;
                }

                /* Hover effect pada sub-item */
                .table-of-contents-list ul a:hover {
                    color: #1976D2;
                }

                /* Item aktif - tanpa background */
                .table-of-contents-list a.active {
                    color: #1976D2;
                }
            `;
            document.head.appendChild(styleElement);

            // Buat header untuk TOC
            const tocHeader = document.createElement('div');
            tocHeader.className = 'table-of-contents-header';
            tocHeader.innerHTML = 'DAFTAR ISI <span class="table-of-contents-toggle" id="tocToggle"><i class="fas fa-chevron-up"></i></span>';
            tocContainer.appendChild(tocHeader);

            // Buat list untuk TOC dengan CSS yang baru
            const tocList = document.createElement('ul');
            tocList.className = 'table-of-contents-list';
            tocList.id = 'tocList';
            tocList.style.counterReset = 'none'; // Hapus counter yang mungkin ada
            tocContainer.appendChild(tocList);

            // Struktur data untuk menyimpan hierarki heading
            const tocItems = [];
            let currentLevel1 = null;
            let currentLevel2 = null;

            // Objek counter untuk penomoran
            let counters = {
                level1: 0,
                level2: 0,
                level3: 0,
                level4: 0
            };

            // Iterate melalui semua heading
            validHeadings.forEach(function(heading, index) {
                // Tentukan level heading
                const level = parseInt(heading.tagName.charAt(1));

                // Log heading untuk debugging
                console.log(`Processing heading ${index}:`, heading.id, heading.textContent.trim(), "Level:", level);

                // Tentukan nomor berdasarkan level
                let number = '';
                if (level === 1 || level === 2) {
                    counters.level1++;
                    counters.level2 = 0;
                    counters.level3 = 0;
                    counters.level4 = 0;
                    number = counters.level1 + ".";
                } else if (level === 3) {
                    counters.level2++;
                    counters.level3 = 0;
                    counters.level4 = 0;
                    number = counters.level1 + "." + counters.level2 + "";
                } else if (level === 4) {
                    counters.level3++;
                    counters.level4 = 0;
                    number = counters.level1 + "." + counters.level2 + "." + counters.level3;
                } else if (level >= 5) {
                    counters.level4++;
                    number = counters.level1 + "." + counters.level2 + "." + counters.level3 + "." + counters.level4;
                }

                // Buat item TOC
                const tocItem = {
                    id: heading.id,
                    text: heading.textContent.trim(),
                    level: level,
                    number: number,
                    children: []
                };

                // Update heading text jika perlu untuk menghindari double numbering
                if (heading.textContent.trim().match(/^\d+\.\s+/)) {
                    // Jika heading sudah memiliki nomor (1., 2., dll.), gunakan teks asli
                    tocItem.text = heading.textContent.trim();
                }

                // Tambahkan ke struktur data TOC sesuai level
                if (level === 1 || level === 2) {
                    tocItems.push(tocItem);
                    currentLevel1 = tocItem;
                    currentLevel2 = null;
                } else if (level === 3) {
                    if (currentLevel1) {
                        currentLevel1.children.push(tocItem);
                        currentLevel2 = tocItem;
                    } else {
                        // Jika tidak ada parent, buat sebagai item level 1
                        tocItems.push(tocItem);
                        currentLevel1 = tocItem;
                    }
                } else if (level === 4 || level === 5 || level === 6) {
                    if (currentLevel2) {
                        currentLevel2.children.push(tocItem);
                    } else if (currentLevel1) {
                        currentLevel1.children.push(tocItem);
                    } else {
                        // Jika tidak ada parent, buat sebagai item level 1
                        tocItems.push(tocItem);
                    }
                }
            });

            console.log("TOC items structure:", tocItems);

            // Fungsi rekursif untuk membuat list TOC
            function buildTocList(items, parentElement) {
                items.forEach(function(item) {
                    const li = document.createElement('li');
                    const a = document.createElement('a');
                    a.href = '#' + item.id;

                    // Tampilkan nomor sebagai bagian dari teks, bukan sebagai atribut untuk pseudo-element
                    let displayText = '';

                    // Jika teks sudah memiliki nomor di awalnya, gunakan teks asli
                    if (item.text.match(/^\d+\.\s+/)) {
                        displayText = item.text;
                    } else {
                        // Tambahkan nomor ke teks yang ditampilkan
                        displayText = item.number + ' ' + item.text;
                    }

                    a.textContent = displayText;
                    // Hapus atribut data-number yang tidak digunakan lagi
                    a.removeAttribute('data-number');

                    a.setAttribute('data-target', item.id);
                    li.appendChild(a);

                    // Tambahkan children jika ada
                    if (item.children && item.children.length > 0) {
                        const ul = document.createElement('ul');
                        buildTocList(item.children, ul);
                        li.appendChild(ul);
                    }

                    parentElement.appendChild(li);
                });
            }

            // Bangun TOC dengan struktur yang telah dibuat
            buildTocList(tocItems, tocList);

            // Tambahkan TOC ke placeholder
            const tocPlaceholder = document.getElementById('toc-placeholder');
            tocPlaceholder.appendChild(tocContainer);

            // Tambahkan event listener untuk toggle
            const tocToggle = document.getElementById('tocToggle');
            const tocListElement = document.getElementById('tocList');

            tocToggle.addEventListener('click', function() {
                const isHidden = tocListElement.style.display === 'none';
                tocListElement.style.display = isHidden ? 'block' : 'none';
                tocToggle.innerHTML = isHidden ? '<i class="fas fa-chevron-up"></i>' : '<i class="fas fa-chevron-down"></i>';
            });

            // Fungsi untuk menyorot item TOC saat menggulir
            function highlightTocOnScroll() {
                const scrollPosition = window.scrollY;
                let activeId = null;

                validHeadings.forEach(function(heading) {
                    const rect = heading.getBoundingClientRect();
                    // Cek apakah heading berada di atau di atas viewport (dengan offset)
                    if (rect.top <= 150) { // Offset 150px dari atas
                        activeId = heading.id;
                    }
                });

                // Hapus kelas aktif dari semua link TOC
                const tocLinks = document.querySelectorAll('#toc a');
                tocLinks.forEach(function(link) {
                    link.classList.remove('active');
                });

                // Tambahkan kelas aktif ke link yang sesuai
                if (activeId) {
                    const activeLink = document.querySelector(`#toc a[data-target="${activeId}"]`);
                    if (activeLink) {
                        activeLink.classList.add('active');
                    }
                }
            }

            // Tambahkan event listener untuk scroll
            window.addEventListener('scroll', highlightTocOnScroll);

            // Panggil sekali saat halaman dimuat
            highlightTocOnScroll();
        }

        // Fungsi untuk menyalin URL ke clipboard
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(function() {
                // Tampilkan notifikasi atau ubah teks tombol
                const copyButton = document.getElementById('copyButton');
                const originalText = copyButton.innerHTML;
                copyButton.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
                setTimeout(function() {
                    copyButton.innerHTML = originalText;
                }, 2000); // Kembali ke teks asli setelah 2 detik
            }, function(err) {
                console.error('Gagal menyalin URL: ', err);
            });
        }

        // Fungsi untuk berbagi ke WhatsApp
        function shareWhatsApp(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.title);
            window.open(`https://api.whatsapp.com/send?text=${text}%20${url}`, '_blank');
        }

        // Fungsi untuk berbagi ke Facebook
        function shareFacebook(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }

        // Fungsi untuk berbagi ke Twitter (X)
        function shareTwitter(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.title);
            window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
        }

        // Fungsi untuk berbagi ke Telegram
        function shareTelegram(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent(document.title);
            window.open(`https://t.me/share/url?url=${url}&text=${text}`, '_blank');
        }
    </script>
@endsection
