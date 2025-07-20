$(document).ready(function() {
    let typingTimer;
    const doneTypingInterval = 500; // waktu dalam ms setelah pengguna berhenti mengetik
    const searchInput = $('#searchInput');
    const clearButton = $('#clearSearch');
    const articlesContainer = $('#articlesContainer');
    const searchResultsCount = $('#searchResultsCount');
    const paginationContainer = $('.pagination-container');
    let currentSearchTerm = searchInput.val();

    // Tampilkan tombol clear jika ada teks di input dan tambahkan kelas has-content
        if (searchInput.val().length > 0) {
            clearButton.show();
            searchInput.addClass('has-content');
        } else {
            clearButton.hide();
            searchInput.removeClass('has-content');
        }



        // Fungsi untuk melakukan pencarian
        function performSearch() {
            const searchTerm = searchInput.val();

            // Jika pencarian sama dengan sebelumnya, tidak perlu melakukan request
            if (searchTerm === currentSearchTerm && searchTerm !== '') return;

            currentSearchTerm = searchTerm;

            // Tampilkan loading state dengan animasi yang lebih menarik
            articlesContainer.html('<div class="col-12 text-center py-5"><div class="search-loading"><div class="spinner-grow text-primary mx-1" role="status" style="animation-delay: 0s"></div><div class="spinner-grow text-info mx-1" role="status" style="animation-delay: 0.2s"></div><div class="spinner-grow text-primary mx-1" role="status" style="animation-delay: 0.4s"></div></div><p class="mt-3 search-loading-text">Mencari artikel...</p></div>');

            $.ajax({
                url: '/artikel',
                type: 'GET',
                data: { search: searchTerm, ajax: 1 },
                success: function(response) {
                    articlesContainer.html(response.html);

                    // Update URL tanpa refresh halaman
                    const url = new URL(window.location);
                    if (searchTerm) {
                        url.searchParams.set('search', searchTerm);
                        searchResultsCount.text(`Ditemukan ${response.count} artikel`).addClass('visible');
                    } else {
                        url.searchParams.delete('search');
                        searchResultsCount.text('').removeClass('visible');
                    }
                    window.history.pushState({}, '', url);

                    // Perbarui dan tampilkan pagination
                    if (response.pagination) {
                        paginationContainer.html(response.pagination).show();
                    } else {
                        paginationContainer.hide();
                    }
                },
                error: function() {
                    articlesContainer.html('<div class="col-12 text-center py-5"><div class="no-results"><i class="fas fa-exclamation-circle fa-3x mb-3"></i><h3 class="mb-3">Terjadi kesalahan</h3><p class="text-muted mb-4">Maaf, terjadi kesalahan saat mencari artikel</p></div></div>');
                }
            });
        }

        // Event ketika user mengetik di input pencarian
        searchInput.on('keyup', function() {
            clearTimeout(typingTimer);

            // Tampilkan tombol clear jika ada teks dan tambahkan kelas has-content
            if ($(this).val().length > 0) {
                clearButton.show();
                $(this).addClass('has-content');
            } else {
                clearButton.hide();
                $(this).removeClass('has-content');
            }

            // Set timer untuk menunggu user selesai mengetik
            typingTimer = setTimeout(performSearch, doneTypingInterval);
        });

        // Reset pencarian ketika tombol clear diklik
        clearButton.on('click', function() {
            searchInput.val('');
            searchInput.removeClass('has-content');
            clearButton.hide();
            currentSearchTerm = '';
            performSearch();
        });

        // Reset pencarian ketika tombol "Kembali ke semua artikel" diklik
        $(document).on('click', '#backToAllArticles', function() {
            searchInput.val('');
            searchInput.removeClass('has-content');
            clearButton.hide();
            currentSearchTerm = '';
            performSearch();
        });

        // Menangani event ketika user menekan Enter pada input pencarian
        searchInput.on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                performSearch();
            }
        });
    });
