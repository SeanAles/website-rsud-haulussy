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
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Tarif Pelayanan</h1>
        <p>Perda Nomor 2 Tahun 2024 </p>
    </div>
    <div class="container d-flex justify-content-center">
        <select id="room_id">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="container col-10 col-sm-10 col-md-8 col-lg-6 mt-4" id="table">
        <table id="treatment-table" class="table table-bordered table-striped">
            <thead>
                <tr style="color: white; background-color: #283779">
                    <th>No.</th>
                    <th>Nama Tindakan</th>
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
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#room_id').on('change', function() {
            var room_id = $(this).val(); // Ambil nilai yang dipilih dari dropdown

            // Kirim permintaan AJAX ke server
            $.ajax({
                url: '/tarif-pelayanan/' + room_id, // URL endpoint yang akan dipanggil
                method: 'GET',
                success: function(response) {
                    $('#treatment-table tbody').remove();
                    var newTbody = $('<tbody></tbody>');
                    response.treatments.forEach(function(treatment, index) {
                        var newRow = $('<tr class="text-black"</tr>');
                        newRow.append('<td>' + (index + 1) + '</td>');
                        newRow.append('<td>' + treatment.name + '</td>');
                        newRow.append('<td>' + treatment.price + '</td>');
                        newTbody.append(newRow);
                    });
                    $('#treatment-table').append(newTbody);
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan: " + error);
                }
            });
        });
    </script>
@endsection
