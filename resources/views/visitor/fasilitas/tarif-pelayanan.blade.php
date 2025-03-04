@extends('visitor.layout.main')
@section('title', 'Tarif Pelayanan')
@section('style')
    <style>
        /* Styling untuk select element */
        select {
            width: auto;
            min-width: 150px;
            padding: 15px 20px;
            font-size: 16px;
            background-color: white;
            color: #333;
            border: 2px solid #ccc;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }


        /* Styling untuk search input */
        .search-input {
            width: auto;
            min-width: 250px;
            padding: 15px 20px;
            font-size: 16px;
            background-color: white;
            color: #333;
            border: 2px solid #ccc;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }


        .search-input:focus {
            outline: none;
            border-color: #283779;
        }


        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }


        /* new 3febuari2025 */
        .notiff {
            color: red;
            font-size: 35px;
            font-weight: bold;
            animation: blink 1s infinite;
        }


        @keyframes blink {
            50% { opacity: 0; }
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
            <select id="room_id">
                <option value="">Semua Ruangan</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>


            <input type="text" id="search" class="search-input" placeholder="Cari pelayanan...">


            <button id="btnSearch" class="btn btn-primary" style="background-color: #283779; border: none; padding: 15px 20px; border-radius: 10px;">
                <i class="fas fa-search"></i> Cari
            </button>
        </div>
    </div>


    <div class="container col-10 col-sm-10 col-md-8 col-lg-6 mt-4" id="table">
        <table id="treatment-table" class="table table-bordered table-striped">
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
                        <td style="text-align: right;">{{ $treatment->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- note --}}
        <div class="mt-2 text-danger font-weight-bold">
            <p><i>*Pemberlakuan dimulai 01 Maret 2025.</i></p>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event handler untuk room select
            $('#room_id').on('change', function() {
                var room_id = $(this).val(); // Ambil nilai yang dipilih dari dropdown


                // Jika pilihan kosong (Semua Ruangan), arahkan ke halaman utama
                if (room_id === '') {
                    window.location.href = '/tarif-pelayanan';
                    return;
                }


                // Kirim permintaan AJAX ke server
                $.ajax({
                    url: '/tarif-pelayanan/' + room_id, // URL endpoint yang akan dipanggil
                    method: 'GET',
                    success: function(response) {
                        $('#treatment-table tbody').remove();
                        var newTbody = $('<tbody></tbody>');
                        response.treatments.forEach(function(treatment, index) {
                            var newRow = $('<tr class="text-black"></tr>');
                            newRow.append('<td>' + (index + 1) + '</td>');
                            newRow.append('<td>' + treatment.name + '</td>');
                            newRow.append('<td style="text-align: right;">' + treatment.price + '</td>');
                            newTbody.append(newRow);
                        });
                        $('#treatment-table').append(newTbody);
                    },
                    error: function(xhr, status, error) {
                        console.error("Terjadi kesalahan: " + error);
                    }
                });
            });


            // Event handler untuk tombol search
            $('#btnSearch').on('click', function() {
                performSearch();
            });


            // Event handler untuk menekan Enter pada input search
            $('#search').on('keypress', function(e) {
                if (e.which === 13) {
                    performSearch();
                }
            });


            // Fungsi untuk melakukan pencarian
            function performSearch() {
                var searchTerm = $('#search').val().toLowerCase();
                var room_id = $('#room_id').val();


                // Jika sudah ada data di tabel, filter secara client-side terlebih dahulu
                var found = false;
                $('#treatment-table tbody tr').each(function() {
                    var name = $(this).find('td:nth-child(2)').text().toLowerCase();
                    if (name.includes(searchTerm)) {
                        $(this).show();
                        found = true;
                    } else {
                        $(this).hide();
                    }
                });


                // Tampilkan pesan jika tidak ada hasil
                if (!found && searchTerm !== '') {
                    // Jika tidak ada hasil, tampilkan pesan
                    if ($('#no-results-row').length === 0) {
                        $('#treatment-table tbody').append('<tr id="no-results-row"><td colspan="3" class="text-center">Tidak ada hasil yang ditemukan</td></tr>');
                    }
                } else {
                    // Hapus pesan jika ada
                    $('#no-results-row').remove();
                }


                // Implementasi server-side search bisa ditambahkan di sini nanti
                // sesuai dengan kebutuhan
            }
        });
    </script>
@endsection
