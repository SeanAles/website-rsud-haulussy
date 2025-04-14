@extends('visitor.layout.main')

@section('title', $article->title)

@section('style')
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/visitor/article-view.css') }}">
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="container article-container">
        <div class="row">
            <!-- Bagian Kiri (67%) -->
            <div class="col-md-8 col-lg-8 left-panel">
                    <h2 class="article-title">{{ $article->title }}</h2>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="article-info">
                            <span class="text-muted">
                                <i class="fas fa-user-edit mr-1"></i> {{ $article->author }}
                                <i class="fas fa-calendar-alt ml-3 mr-1"></i> {{ $article->created_at->format('d - m - Y') }}
                                <i class="far fa-eye ml-3 mr-1"></i> {{ number_format($article->views) }} kali dibaca
                            </span>
                        </div>
                        <div class="social-sharing">
                            <button type="button" class="share-btn copy" id="copyButton" onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i> Salin URL
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
                    <img src="{{ asset('images/article/thumbnails/' . $article->thumbnail) }}" class="article-thumbnail img-fluid">

                    <!-- Daftar Isi akan ditambahkan di sini oleh JavaScript -->
                    <div id="toc-placeholder"></div>

                    <div class="article-content">
                        {!! $article->description !!}
                    </div>
            </div>
            <!-- Bagian Kanan (40%) -->
                <div class="col-md-4 col-lg-4 right-panel other-articles">
                    <div class="articles-wrapper">
                        <h3 class="articles-title">Artikel Lainnya</h3>
                        @if(count($articles) > 0)
                            <div class="articles-container">
                        @foreach ($articles as $relatedArticle)
                            <a href="/artikel/{{ $relatedArticle->slug }}" class="related-article-card">
                                <div class="related-article-thumbnail-wrapper">
                                    <img src="{{ asset('images/article/thumbnails/' . $relatedArticle->thumbnail) }}"
                                         alt="Thumbnail {{ $relatedArticle->title }}"
                                         class="related-article-thumbnail">
                                    <div class="related-article-thumbnail-overlay">Artikel</div>
                                </div>
                                <div class="related-article-content">
                                    <div>
                                        <p class="related-article-title mb-1">{{ $relatedArticle->title }}</p>
                                        <div class="related-article-meta">
                                            <small class="related-article-date">
                                                <i class="far fa-calendar-alt"></i>
                                                <span style="margin-left: 5px">{{ $relatedArticle->created_at->format('d M Y') }}</span>
                                            </small>
                                            <small class="read-time">
                                                <i class="far fa-clock"></i>
                                                <span style="margin-left: 5px">
                                                @php
                                                    // Menghitung waktu baca berdasarkan konten
                                                    $readTime = strlen($relatedArticle->description) > 0
                                                        ? max(2, ceil(str_word_count(strip_tags($relatedArticle->description)) / 200))
                                                        : 2;
                                                @endphp
                                                {{ $readTime }} menit
                                                </span>
                                            </small>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="article-category">
                                                <i class="fas fa-stethoscope"></i>
                                                Kesehatan
                                            </div>
                                            <div class="article-views">
                                                <i class="far fa-eye"></i>
                                                <span style="margin-left: 5px">{{ $relatedArticle->views ?? 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                @endforeach
                            </div>
                        @else
                            <p class="no-other-articles">Belum ada artikel lainnya.</p>
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

            // Tambahkan event listener untuk toggle TOC
            document.getElementById('tocToggle').addEventListener('click', function() {
                const tocList = document.getElementById('tocList');
                const tocToggle = document.getElementById('tocToggle');

                if (tocList.style.display === 'none') {
                    tocList.style.display = 'block';
                    tocToggle.innerHTML = '<i class="fas fa-chevron-up"></i>';
                } else {
                    tocList.style.display = 'none';
                    tocToggle.innerHTML = '<i class="fas fa-chevron-down"></i>';
                }
            });

            // Tambahkan event listener untuk semua link di TOC
            const allTocLinks = document.querySelectorAll('#tocList a');
            allTocLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Tandai link sebagai aktif
                    allTocLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    // Dapatkan target heading
                    const targetId = this.getAttribute('data-target');
                    const targetHeading = document.getElementById(targetId);

                    if (targetHeading) {
                        // Tambahkan class untuk animasi highlight
                        targetHeading.classList.add('highlight-heading');

                        // Hapus class setelah animasi selesai
                        setTimeout(() => {
                            targetHeading.classList.remove('highlight-heading');
                        }, 2000);
                    }
                });
            });

            // Setup event listener untuk highlight TOC saat scroll
            window.addEventListener('scroll', debounce(highlightTocOnScroll, 100));
        }

        // Function untuk copy URL
        function copyToClipboard() {
            // Get the current URL
            const url = window.location.href;

            // Create a temporary input element
            const input = document.createElement('input');
            input.setAttribute('value', url);
            document.body.appendChild(input);

            // Select the input value
            input.select();

            // Copy the selected text
            document.execCommand('copy');

            // Remove the temporary input
            document.body.removeChild(input);

            // Update button text temporarily
            const copyButton = document.getElementById('copyButton');
            copyButton.innerHTML = '<i class="fas fa-check"></i> URL Disalin';

            // Restore button text after 2 seconds
            setTimeout(function() {
                copyButton.innerHTML = '<i class="fas fa-copy"></i> Salin URL';
            }, 2000);
        }

        // Function untuk share WhatsApp
        function shareWhatsApp(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://wa.me/?text=${title} ${url}`, '_blank');
        }

        // Function untuk share Facebook
        function shareFacebook(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        // Function untuk share Twitter
        function shareTwitter(event) {
            event.preventDefault();
            const url = window.location.href;
            const title = document.querySelector('.article-title').textContent;
            window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`, '_blank');
        }

        function shareLinkedIn(event) {
            event.preventDefault();
            const url = window.location.href;
            const title = document.querySelector('.article-title').textContent;
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`, '_blank');
        }

        // Function untuk share Instagram
        function shareInstagram(event) {
            event.preventDefault();
            alert('Instagram tidak memiliki API pembagian langsung. Silakan salin URL dan bagikan secara manual.');
        }

        // Function untuk share Telegram
        function shareTelegram(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            window.open(`https://t.me/share/url?url=${url}&text=${title}`, '_blank');
        }

        // Function untuk share LinkedIn
        function shareLinkedIn(event) {
            event.preventDefault();
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            const summary = encodeURIComponent('Baca artikel menarik tentang kesehatan dari RSUD Dr. M. Haulussy Ambon');
            window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}&summary=${summary}`, '_blank', 'width=600,height=400');
        }

        // Debounce function untuk mengurangi frekuensi pemanggilan fungsi
        function debounce(func, wait, immediate) {
            let timeout;
            return function() {
                const context = this, args = arguments;
                const later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                const callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }

        // Highlight section di TOC berdasarkan posisi scroll
        function highlightTocOnScroll() {
            const articleContent = document.querySelector('.article-content');
            if (!articleContent) return;

            const headings = articleContent.querySelectorAll('h1, h2, h3, h4, h5, h6');
            if (headings.length === 0) return;

            // Dapatkan semua ID section
            const sections = Array.from(headings).map(heading => heading.id);

            // Filter yang valid
            const validSections = sections.filter(id => id);

            // Jika tidak ada section valid, return
            if (validSections.length === 0) return;

            // Dapatkan posisi scroll saat ini + offset
            const scrollPosition = window.scrollY + 100; // Offset untuk trigger lebih awal

            // Temukan heading aktif berdasarkan posisi scroll
            let activeSection = null;
            for (let i = 0; i < validSections.length; i++) {
                const currentSection = document.getElementById(validSections[i]);
                if (!currentSection) continue;

                const nextSection = validSections[i + 1] ? document.getElementById(validSections[i + 1]) : null;

                // Jika kita di antara section ini dan section berikutnya
                if (
                    currentSection.offsetTop <= scrollPosition &&
                    (!nextSection || nextSection.offsetTop > scrollPosition)
                ) {
                    activeSection = validSections[i];
                    break;
                }
            }

            // Jika tidak ada section aktif dan kita di awal artikel, gunakan section pertama
            if (!activeSection && scrollPosition < headings[0].offsetTop) {
                activeSection = validSections[0];
            }

            // Jika kita mendapatkan section aktif, update tampilan TOC
            if (activeSection) {
                // Hapus class aktif dari semua link TOC
                const allTocLinks = document.querySelectorAll('#tocList a');
                allTocLinks.forEach(link => {
                    link.classList.remove('active');
                    const parentLi = link.parentNode;
                    parentLi.classList.remove('active');
                });

                // Tambahkan class aktif ke link yang sesuai
                const activeLink = document.querySelector(`#tocList a[data-target="${activeSection}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');

                    // Tambahkan class aktif ke semua parent li
                    let parents = getParents(activeLink.parentNode);
                    parents.forEach(parent => {
                        if (parent.tagName === 'LI') {
                            parent.classList.add('active');
                        }
                    });
                }
            }
        }

        // Helper function untuk mendapatkan semua parent element
        function getParents(elem) {
            let parents = [];
            while(elem.parentNode && elem.parentNode.nodeName.toLowerCase() != 'body') {
                elem = elem.parentNode;
                parents.push(elem);
            }
            return parents;
        }
    </script>
@endsection
