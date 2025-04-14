// Fungsi-fungsi JavaScript untuk halaman baca artikel

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

    // Buat container untuk table of contents
    const tocContainer = document.createElement('div');
    tocContainer.className = 'table-of-contents';
    tocContainer.id = 'toc';

    // Buat header untuk TOC
    const tocHeader = document.createElement('div');
    tocHeader.className = 'table-of-contents-header';
    tocHeader.innerHTML = 'DAFTAR ISI <span class="table-of-contents-toggle" id="tocToggle"><i class="fas fa-chevron-up"></i></span>';
    tocContainer.appendChild(tocHeader);

    // Buat list untuk TOC
    const tocList = document.createElement('ul');
    tocList.className = 'table-of-contents-list';
    tocList.id = 'tocList';
    tocContainer.appendChild(tocList);

    // Struktur data untuk menyimpan hierarki heading
    const tocItems = [];
    let currentLevel1 = null;
    let currentLevel2 = null;

    // Buat hierarki TOC
    validHeadings.forEach(heading => {
        const level = parseInt(heading.tagName.substring(1));
        const text = heading.textContent.trim();
        const id = heading.id;
        
        // Tambahkan anchor link ke heading
        const anchor = document.createElement('a');
        anchor.className = 'heading-anchor';
        anchor.href = '#' + id;
        anchor.innerHTML = '<i class="fas fa-link"></i>';
        anchor.title = 'Link ke bagian ini';
        heading.appendChild(anchor);

        // Heading level 1-2 masuk ke list utama
        if (level <= 2) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + id;
            a.textContent = text;
            li.appendChild(a);
            
            // Siapkan untuk sub-heading
            const ul = document.createElement('ul');
            li.appendChild(ul);
            
            tocList.appendChild(li);
            
            // Update referensi untuk sub-heading
            currentLevel1 = {
                element: li,
                subList: ul
            };
            currentLevel2 = null;
            
            tocItems.push(currentLevel1);
        }
        // Heading level 3-4 masuk ke sublist
        else if (level <= 4 && currentLevel1) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + id;
            a.textContent = text;
            li.appendChild(a);
            
            // Tambahkan ke sublist level 1
            currentLevel1.subList.appendChild(li);
            
            // Jika ini h3, update referensi level 2
            if (level === 3) {
                const ul = document.createElement('ul');
                li.appendChild(ul);
                
                currentLevel2 = {
                    element: li,
                    subList: ul
                };
            }
        }
        // Heading level 5-6 masuk ke sublist level 2 jika ada
        else if (level <= 6 && currentLevel2) {
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + id;
            a.textContent = text;
            li.appendChild(a);
            
            // Tambahkan ke sublist level 2
            currentLevel2.subList.appendChild(li);
        }
    });

    // Cek apakah ada item di TOC
    if (tocItems.length === 0) {
        console.log("No TOC items created");
        return;
    }

    // Tempatkan TOC di placeholder
    const tocPlaceholder = document.getElementById('toc-placeholder');
    if (tocPlaceholder) {
        tocPlaceholder.appendChild(tocContainer);
        console.log("TOC created and placed in placeholder");
    } else {
        console.log("TOC placeholder not found");
    }

    // Tambahkan event listener untuk toggle TOC
    document.getElementById('tocToggle').addEventListener('click', function() {
        const tocList = document.getElementById('tocList');
        if (tocList.style.display === 'none') {
            tocList.style.display = 'block';
            this.innerHTML = '<i class="fas fa-chevron-up"></i>';
            this.classList.remove('collapsed');
        } else {
            tocList.style.display = 'none';
            this.innerHTML = '<i class="fas fa-chevron-down"></i>';
            this.classList.add('collapsed');
        }
    });

    // Highlight current section on scroll
    window.addEventListener('scroll', debounce(highlightTocOnScroll, 100));
}

// Function untuk copy URL
function copyToClipboard() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(function() {
        // Show success notification
        const notification = document.createElement('div');
        notification.className = 'copy-success';
        notification.innerText = 'URL berhasil disalin!';
        document.body.appendChild(notification);
        
        // Remove notification after animation completes
        setTimeout(function() {
            notification.remove();
        }, 2000);
    }, function(err) {
        console.error('Gagal menyalin: ', err);
    });
}

// Function untuk share WhatsApp
function shareWhatsApp(event) {
    event.preventDefault();
    const url = window.location.href;
    const title = document.querySelector('.article-title').innerText;
    const shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
    window.open(shareUrl, '_blank');
}

// Function untuk share Facebook
function shareFacebook(event) {
    event.preventDefault();
    const url = window.location.href;
    const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
    window.open(shareUrl, '_blank');
}

// Function untuk share Twitter
function shareTwitter(event) {
    event.preventDefault();
    const url = window.location.href;
    const title = document.querySelector('.article-title').innerText;
    const shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`;
    window.open(shareUrl, '_blank');
}

// Function untuk share Instagram
function shareInstagram(event) {
    event.preventDefault();
    alert('Pembagian langsung ke Instagram tidak tersedia. Silakan salin URL dan bagikan secara manual.');
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
    const headings = document.querySelectorAll('.article-content h1, .article-content h2, .article-content h3, .article-content h4, .article-content h5, .article-content h6');
    const tocLinks = document.querySelectorAll('.table-of-contents-list a');
    
    if (!headings.length || !tocLinks.length) return;
    
    // Mendapatkan semua posisi heading (dengan offset untuk lebih akurat)
    const scrollOffset = 100;
    const headingPositions = Array.from(headings).map(heading => {
        return { 
            id: heading.id,
            top: heading.getBoundingClientRect().top + window.pageYOffset - scrollOffset
        };
    });
    
    // Mendapatkan posisi scroll saat ini
    const scrollPosition = window.pageYOffset;
    
    // Temukan heading yang saat ini sedang di-scroll
    let currentHeadingIndex = -1;
    for (let i = 0; i < headingPositions.length; i++) {
        if (scrollPosition >= headingPositions[i].top) {
            currentHeadingIndex = i;
        } else {
            break;
        }
    }
    
    // Hapus highlight dari semua link TOC
    tocLinks.forEach(link => {
        link.classList.remove('active');
    });
    
    // Highlight link yang sesuai dengan heading saat ini
    if (currentHeadingIndex !== -1) {
        const currentHeadingId = headingPositions[currentHeadingIndex].id;
        const correspondingLink = document.querySelector(`.table-of-contents-list a[href="#${currentHeadingId}"]`);
        
        if (correspondingLink) {
            correspondingLink.classList.add('active');
            
            // Cari parent li dari link yang sedang aktif
            const parentLi = getParents(correspondingLink).find(parent => parent.tagName === 'LI');
            if (parentLi) {
                // Cari apakah parent li memiliki link ke heading lain
                const parentLink = parentLi.querySelector(':scope > a');
                if (parentLink && parentLink !== correspondingLink) {
                    parentLink.classList.add('parent-active');
                }
            }
        }
    }
}

// Helper function untuk mendapatkan semua parent element
function getParents(elem) {
    const parents = [];
    while (elem && elem !== document) {
        parents.push(elem);
        elem = elem.parentNode;
    }
    return parents;
}
