@extends('visitor.layout.main')
@section('title', 'Tarif Pelayanan')
@section('style')
    <style>
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
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }


        .search-input:focus {
            outline: none;
            border-color: #283779;
            box-shadow: 0 0 5px rgba(40, 55, 121, 0.3);
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
        }


        .filter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }


        .notiff {
            color: red;
            font-size: 35px;
            font-weight: bold;
            animation: blink 1s infinite;
        }


        @keyframes blink {
            50% { opacity: 0; }
        }


        #initial-message {
            text-align: center;
            color: #6c757d;
            padding: 30px;
            border: 2px solid #dee2e6;
            border-radius: 15px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
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


            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="search" class="search-input" placeholder="Cari pelayanan..." disabled>
            </div>
        </div>
    </div>


    <div class="container col-10 col-sm-10 col-md-8 col-lg-6 mt-4" id="table">
        {{-- initial message saat awl masuk hlmn tarif --}}
        <div id="initial-message">
            <i class="fas fa-hospital-alt"></i>
            <h4>Informasi Tarif Pelayanan</h4>
            <p>Silahkan pilih ruangan terlebih dahulu untuk melihat daftar pelayanan dan tarif yang berlaku. Anda dapat menggunakan fitur pencarian untuk menemukan pelayanan spesifik.</p>
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
                        <td style="text-align: right;">{{ $treatment->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-2 text-danger font-weight-bold">
            <p><i>*Pemberlakuan dimulai 01 Maret 2025.</i></p>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // kasi disable input search dan tomboll
            $('#search').prop('disabled', true);


            // Event handler unutk pilih ruangan
            $('#room_id').on('change', function() {
                var room_id = $(this).val();


                // Reset pencarian
                $('#search').val('');
                $('#no-results-row').remove();


                if (room_id === '') {
                    // sembunyikan tabel dan tampilkan pesan dan kasi disble search dan btn
                    $('#treatment-table').hide();
                    $('#initial-message').show();
                    $('#search').prop('disabled', true);
                    return;
                }


                // kirim ajax req
                $.ajax({
                    url: '/tarif-pelayanan/' + room_id,
                    method: 'GET',
                    success: function(response) {
                        // sembunyikan #initial-message
                        $('#initial-message').hide();


                        // Update bagian body tabel
                        $('#treatment-table tbody').remove();
                        var newTbody = $('<tbody></tbody>');
                        response.treatments.forEach(function(treatment, index) {
                            var newRow = $('<tr class="text-black"></tr>');
                            newRow.append('<td>' + (index + 1) + '</td>');
                            newRow.append('<td>' + treatment.name + '</td>');
                            newRow.append('<td style="text-align: right;">' + treatment.price + '</td>');
                            newTbody.append(newRow);
                        });
                        $('#treatment-table').append(newTbody).show();


                        // nyaalakan input serch dan btn
                        $('#search').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error("Terjadi kesalahan: " + error);
                    }
                });
            });


            // Event handler search
            $('#search').on('input', function() {
                performSearch();
            });


            // Fungsi carii
            function performSearch() {
                // dibagian sini untuk pastikan sudah pilih ruangan dulu
                if ($('#room_id').val() === '') {
                    alert('Silahkan pilih ruangan terlebih dahulu');
                    $('#room_id').focus();
                    return;
                }


                var searchTerm = $('#search').val().toLowerCase();
                var found = false;


                //hapus no-results  data yang ada pada baris 1
                $('#no-results-row').remove();


                // sembunyikan atau tampilkan baris berdsrkn pncrian
                $('#treatment-table tbody tr').each(function() {
                    if (!$(this).attr('id') || $(this).attr('id') !== 'no-results-row') {
                        var name = $(this).find('td:nth-child(2)').text().toLowerCase();
                        if (name.includes(searchTerm)) {
                            $(this).show();
                            found = true;
                        } else {
                            $(this).hide();
                        }
                    }
                });


                // tmplkn pesn jika tidak ada hasil, bahkann jika searchTerm kosong
                if (!found) {
                    $('#treatment-table tbody').append('<tr id="no-results-row"><td colspan="3" class="text-center">Tidak ada hasil yang ditemukan pada ruangan ini.</td></tr>');
                }
            }
        });
    </script>
@endsection
