@extends('visitor.layout.main')
@section('title', 'Tarif Pelayanan')
@section('style')
<style>
    /* Enhanced select styling */
    select {
        width: auto;
        min-width: 200px;
        padding: 15px 20px;
        font-size: 16px;
        background-color: white;
        color: #333;
        border: 2px solid #ccc;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* Styling untuk select2 */
    .select2-container {
        min-width: 300px !important;
    }

    .select2-container--default .select2-selection--single {
        height: 54px !important;
        padding: 0 15px !important;
        font-size: 16px;
        background-color: white;
        color: #333;
        border: 2px solid #ccc !important;
        border-radius: 10px !important;
        transition: all 0.3s ease;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #333;
        padding: 0 !important;
        margin: 0 !important;
        line-height: normal !important;
        display: flex !important;
        align-items: center !important;
        height: 100% !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__clear {
        display: none !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #6c757d;
    }

    .select2-container--default .select2-selection--single:hover {
        border-color: #283779 !important;
        box-shadow: 0 0 5px rgba(40, 55, 121, 0.2);
    }

    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: #283779 !important;
        box-shadow: 0 0 8px rgba(40, 55, 121, 0.4);
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 52px !important;
        width: 30px !important;
        right: 10px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #283779 transparent transparent transparent !important;
        border-width: 6px 6px 0 6px !important;
        margin: 0 !important;
        left: 0 !important;
        top: 50% !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #283779 transparent !important;
        border-width: 0 6px 6px 6px !important;
    }

    .select2-dropdown {
        border: 2px solid #ccc !important;
        border-radius: 10px !important;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 5px;
        overflow: hidden;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        border: 2px solid #ccc !important;
        border-radius: 8px !important;
        padding: 12px !important;
        font-size: 15px;
        margin: 5px;
        width: calc(100% - 10px);
    }

    .select2-container--default .select2-search--dropdown .select2-search__field::placeholder {
        color: #6c757d;
        opacity: 0.8;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field:focus {
        outline: none;
        border-color: #283779 !important;
        box-shadow: 0 0 5px rgba(40, 55, 121, 0.2);
    }

    .select2-results__option {
        padding: 12px 20px !important;
        font-size: 15px;
        transition: all 0.2s ease;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #283779 !important;
        border-radius: 8px;
    }

    .select2-container--default .select2-results__group {
        padding: 12px 20px !important;
        font-weight: bold;
        color: #283779;
        background-color: #f8f9fa;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .select2-results__option[aria-selected="true"] {
        background-color: #e9ecef !important;
        color: #283779;
        font-weight: 600;
    }

    /* Enhanced search input */
    .search-input {
        width: auto;
        min-width: 250px;
        padding: 15px 20px;
        padding-left: 45px;
        font-size: 16px;
        background-color: white;
        color: #333;
        border: 2px solid #ccc;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #283779;
        box-shadow: 0 0 8px rgba(40, 55, 121, 0.4);
    }

    /* Style for empty/disabled search */
    .search-input:disabled {
        background-color: #f5f5f5;
        cursor: not-allowed;
    }

    .search-container {
        position: relative;
        display: inline-block;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 18px;
        transition: color 0.3s ease;
    }

    /* Search icon changes color when input is focused */
    .search-container:focus-within .search-icon {
        color: #283779;
    }

    /* More responsive filter container */
    .filter-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        padding: 10px;
    }

    .notiff {
        color: red;
        font-size: 35px;
        font-weight: bold;
        animation: blink 1s infinite;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
    }

    #initial-message {
        text-align: center;
        color: #6c757d;
        padding: 30px;
        border: 2px solid #dee2e6;
        border-radius: 15px;
        background-color: #f8f9fa;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        max-width: 700px;
        margin: 0 auto;
    }

    #initial-message i {
        font-size: 48px;
        color: #283779;
        margin-bottom: 15px;
        display: block;
    }

    #initial-message h4 {
        color: #283779;
        margin-bottom: 15px;
        font-weight: 600;
    }

    #initial-message p {
        font-size: 16px;
        margin-bottom: 0;
    }

    /* Loading indicator styles */
    .loading-spinner {
        display: none;
        text-align: center;
        padding: 20px;
    }

    .loading-spinner i {
        color: #283779;
        font-size: 24px;
        animation: spin 1s infinite linear;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Highlight search matches */
    .highlight {
        background-color: #fff3cd;
        padding: 2px;
        border-radius: 3px;
    }

    /* perbarui improve table styles */
    #treatment-table {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        border-collapse: collapse;
        opacity: 0;
        animation: fadeInScale 0.4s ease-out forwards;
        transform-origin: top center;
        width: 100%;
        background-color: white;
    }

    #treatment-table th {
        position: sticky;
        top: 0;
        z-index: 10;
        padding: 15px 20px !important;
        font-weight: 600;
        font-size: 15px;
        white-space: nowrap;
        background-color: #283779 !important;
    }

    #treatment-table td {
        padding: 12px 20px !important;
        vertical-align: middle !important;
        border-bottom: 1px solid #e9ecef !important;
        font-size: 14px;
    }

    /* Styling untuk kolom nomor */
    #treatment-table td:first-child {
        width: 60px;
        text-align: center;
        color: #6c757d;
        font-weight: 500;
    }

    /* Styling untuk kolom nama */
    #treatment-table td:nth-child(2) {
        min-width: 300px;
        color: #333;
    }

    /* Styling untuk kolom harga */
    #treatment-table td:last-child {
        width: 150px;
        text-align: right;
        font-family: 'Roboto Mono', monospace;
        font-weight: 500;
        color: #283779;
        white-space: nowrap;
        padding-left: 25px !important;
    }

    /* Styling untuk header kolom harga */
    #treatment-table th:last-child {
        text-align: right;
        padding-left: 25px !important;
    }

    #treatment-table tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }

    #treatment-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    /* Stripe setiap baris genap */
    #treatment-table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    #treatment-table tbody tr:nth-child(even):hover {
        background-color: #f0f2f8;
    }

    /* Animasi untuk tabel */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    #treatment-table tbody tr {
        opacity: 0;
        animation: fadeInUp 0.3s ease-out forwards;
    }

    /* Animasi untuk setiap baris dengan delay */
    #treatment-table tbody tr:nth-child(1) {
        animation-delay: 0.03s;
    }

    #treatment-table tbody tr:nth-child(2) {
        animation-delay: 0.06s;
    }

    #treatment-table tbody tr:nth-child(3) {
        animation-delay: 0.09s;
    }

    #treatment-table tbody tr:nth-child(4) {
        animation-delay: 0.12s;
    }

    #treatment-table tbody tr:nth-child(5) {
        animation-delay: 0.15s;
    }

    #treatment-table tbody tr:nth-child(6) {
        animation-delay: 0.18s;
    }

    #treatment-table tbody tr:nth-child(7) {
        animation-delay: 0.21s;
    }

    #treatment-table tbody tr:nth-child(8) {
        animation-delay: 0.24s;
    }

    #treatment-table tbody tr:nth-child(9) {
        animation-delay: 0.27s;
    }

    #treatment-table tbody tr:nth-child(10) {
        animation-delay: 0.30s;
    }

    #treatment-table tbody tr:nth-child(11) {
        animation-delay: 0.33s;
    }

    #treatment-table tbody tr:nth-child(12) {
        animation-delay: 0.36s;
    }

    #treatment-table tbody tr:nth-child(13) {
        animation-delay: 0.39s;
    }

    #treatment-table tbody tr:nth-child(14) {
        animation-delay: 0.42s;
    }

    #treatment-table tbody tr:nth-child(15) {
        animation-delay: 0.45s;
    }

    #treatment-table tbody tr:nth-child(16) {
        animation-delay: 0.48s;
    }

    #treatment-table tbody tr:nth-child(17) {
        animation-delay: 0.51s;
    }

    #treatment-table tbody tr:nth-child(18) {
        animation-delay: 0.54s;
    }

    #treatment-table tbody tr:nth-child(19) {
        animation-delay: 0.57s;
    }

    #treatment-table tbody tr:nth-child(20) {
        animation-delay: 0.60s;
    }

    /* Untuk baris setelah ke-20 */
    #treatment-table tbody tr:nth-child(n+21) {
        animation-delay: 0.63s;
    }
</style>
@endsection

@section('content')
<div class="text-center mb-5">
    <h1>Tarif Pelayanan <span class="notiff">*</span></h1>
    <p>PERATURAN GUBERNUR MALUKU NOMOR 37 (05 NOVEMBER) TAHUN 2024 TENTANG PENETAPAN TARIF RETRIBUSI DAERAH (Tarif Baru RSUD dr. M. Haulussy Ambon).</p>
</div>

<div class="container d-flex justify-content-center flex-column">
    <div class="filter-container">
        <!-- menambh label -->
        <div>
            <select id="room_id" aria-label="Pilih Ruangan">
                <option value="">Pilih Ruangan</option>
                {{-- ambil data grop dan room id dari controller --}}
                @foreach($roomGroups as $groupName => $roomIds)
                <optgroup label="{{ $groupName }}">
                    @foreach($rooms as $room)
                    @if(in_array($room->id, $roomIds))
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endif
                    @endforeach
                </optgroup>
                @endforeach
            </select>
        </div>

        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="search" class="search-input" placeholder="Cari pelayanan..." disabled>
        </div>
    </div>
</div>

<div class="container col-10 col-sm-10 col-md-8 col-lg-6 mt-4" id="table">
    {{-- initial message saat awal masuk halaman tarif --}}
    <div id="initial-message">
        <i class="fas fa-hospital-alt"></i>
        <h4>Informasi Tarif Pelayanan</h4>
        <p>Silahkan pilih ruangan terlebih dahulu untuk melihat daftar pelayanan dan tarif yang berlaku. Anda dapat menggunakan fitur pencarian untuk menemukan pelayanan spesifik.</p>
    </div>

    <!-- Loadng spinner -->
    <div class="loading-spinner" id="loading-spinner">
        <i class="fas fa-spinner"></i>
        <p>Memuat data...</p>
    </div>

    <table id="treatment-table" class="table table-bordered table-striped" style="display: none;">
        <thead>
            <tr style="color: white; background-color: #283779">
                <th>No.</th>
                <th>Nama</th>
                <th>Tarif</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($treatments as $treatment)
            <tr class="text-black">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $treatment->name }}</td>
                <td>{{ $treatment->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Result counter -->
    <div id="results-counter" style="display: none;" class="mt-2 text-center text-muted">
        <small>Menampilkan <span id="visible-count">0</span> dari <span id="total-count">0</span> pelayanan</small>
    </div>

    <div class="mt-2 text-danger font-weight-bold">
        <p><i>*Pemberlakuan dimulai 01 Maret 2025.</i></p>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#room_id').select2({
            placeholder: 'Pilih Ruangan',
            allowClear: false,
            width: 'resolve',
            minimumResultsForSearch: 0,
            selectionCssClass: 'select2-selection--single-custom',
            language: {
                searching: function() {
                    return "Mencari...";
                }
            }
        }).on('select2:open', function() {
            setTimeout(function() {
                $('.select2-search__field').attr('placeholder', 'Cari ruangan...');
            }, 0);
        });

        // kasi disable input search dan tomboll
        $('#search').prop('disabled', true);

        let currentRoomId = '';

        // Event handler untuk pilih ruangan
        $('#room_id').on('change', function() {
            var room_id = $(this).val();
            currentRoomId = room_id;

            // Rest pemcrian
            $('#search').val('');
            $('#no-results-row').remove();

            // Reset results counter
            $('#results-counter').hide();

            if (room_id === '') {
                $('#treatment-table').fadeOut(300, function() {
                    $('#initial-message').fadeIn(300);
                    $('#loading-spinner').hide();
                    $('#search').prop('disabled', true);
                });
                return;
            }

            $('#treatment-table').fadeOut(300);
            $('#initial-message').fadeOut(300);
            $('#loading-spinner').fadeIn(300);
            $('#search').prop('disabled', true);

            $.ajax({
                url: '/tarif-pelayanan/' + room_id,
                method: 'GET',
                success: function(response) {
                    $('#initial-message').hide();
                    $('#loading-spinner').fadeOut(300, function() {
                        $('#treatment-table tbody').remove();
                        var newTbody = $('<tbody></tbody>');
                        response.treatments.forEach(function(treatment, index) {
                            var newRow = $('<tr class="text-black treatment-row"></tr>');
                            newRow.append('<td>' + (index + 1) + '</td>');
                            newRow.append('<td class="treatment-name">' + treatment.name + '</td>');

                            // Format hargaa
                            const formattedPrice = treatment.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            newRow.append('<td>Rp ' + formattedPrice + '</td>');

                            newTbody.append(newRow);
                        });

                        $('#treatment-table').append(newTbody).css({
                            display: 'table',
                            opacity: 0
                        }).animate({
                            opacity: 1
                        }, 400);

                        const totalCount = response.treatments.length;
                        $('#total-count').text(totalCount);
                        $('#visible-count').text(totalCount);
                        $('#results-counter').fadeIn(300);

                        $('#search').prop('disabled', false);
                        $('#search').focus();
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan: " + error);
                    $('#loading-spinner').fadeOut(300, function() {
                        $('#initial-message').html(`
                                <i class="fas fa-exclamation-triangle" style="color: #dc3545;"></i>
                                <h4>Terjadi Kesalahan</h4>
                                <p>Maaf, gagal memuat data pelayanan. Silakan coba lagi nanti.</p>
                            `).fadeIn(300);
                    });
                }
            });
        });

        // Event handler search  300ms
        let searchTimeout;
        $('#search').on('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 300);
        });

        // Clear search button fungsi
        $('#search').on('keyup', function(e) {
            if (e.key === 'Escape') {
                $(this).val('');
                performSearch();
            }
        });

        // Fungsii cari dengan highlight
        function performSearch() {
            // dibgian sini untuk pastkn sudah pilih ruangan duluu
            if ($('#room_id').val() === '') {
                alert('Silahkan pilih ruangan terlebih dahulu');
                $('#room_id').focus();
                return;
            }

            var searchTerm = $('#search').val().toLowerCase().trim();
            var found = false;
            var visibleCount = 0;

            //hapus no-results data yang ada pada baris 1
            $('#no-results-row').remove();

            // Remove highlight existing yang ada
            $('.treatment-name').each(function() {
                var text = $(this).text();
                $(this).html(text);
            });

            // sembunyikan atau tampilkan baris berdsrkn pncrian
            $('#treatment-table tbody tr').each(function() {
                if (!$(this).attr('id') || $(this).attr('id') !== 'no-results-row') {
                    var nameCell = $(this).find('td:nth-child(2)');
                    var name = nameCell.text().toLowerCase();

                    if (searchTerm === '' || name.includes(searchTerm)) {
                        $(this).show();
                        found = true;
                        visibleCount++;

                        // Highlight matching text if search term is not empty
                        if (searchTerm !== '') {
                            var originalText = nameCell.text();
                            var highlightedText = originalText.replace(
                                new RegExp(searchTerm, 'gi'),
                                match => `<span class="highlight">${match}</span>`
                            );
                            nameCell.html(highlightedText);
                        }
                    } else {
                        $(this).hide();
                    }
                }
            });

            // Update visible count
            $('#visible-count').text(visibleCount);

            // tmplkn pesan jika tidak ada hasil, bahkan jika searchTerm kosong
            if (!found) {
                $('#treatment-table tbody').append(`
                        <tr id="no-results-row">
                            <td colspan="3" class="text-center">
                                <div class="py-4">
                                    <i class="fas fa-search fa-2x text-muted mb-3"></i>
                                    <p class="mb-0">Tidak ada hasil yang ditemukan untuk "${searchTerm}" pada ruangan ini.</p>
                                    <p class="text-muted">Silakan coba dengan kata kunci lain.</p>
                                </div>
                            </td>
                        </tr>
                    `);
                $('#visible-count').text(0);
            }
        }

        // Animation untk load data
        function animateNewRows() {
            $('#treatment-table tbody tr').css('opacity', 0);
            $('#treatment-table tbody tr').each(function(index) {
                $(this).delay(index * 30).animate({
                    opacity: 1
                }, 300);
            });
        }
    });
</script>
@endsection
