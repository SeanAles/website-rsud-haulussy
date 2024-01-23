@extends('admin.layout.main')
@section('title', 'Kritik dan Saran')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <hr>
        <table class="table table-bordered table-responsif data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $('.data-table').DataTable({
        language: {
            "lengthMenu": "Tampilkan _MENU_ data",
            "search": " Cari",
            'info': 'Menampilkan _START_ hingga _END_ dari _TOTAL_ data',
            "emptyTable": "Tidak ada data yang ditemukan",
            "zeroRecords": "Tidak dapat menemukan data yang sesuai",
            'infoEmpty': 'Menampilkan _TOTAL_ data',
            "infoFiltered": " <span class='quickApproveTable_info_filtered_span'>(Disaring dari total _MAX_ data)</span>",
            "processing": "Memproses...",
            'paginate': {
                'previous': '<span class="prev-icon">Sebelum</span>',
                'next': '<span class="next-icon">Selanjutnya</span>',
            }
        },
        // order: [
        //     [1, "asc"]
        // ],
        // columnDefs: [{
        //     targets: [0],
        //     orderable: false,
        //     searchable: false
        // }],
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: "{{ route('suggestion.index') }}",
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'created_at',
                name: 'create_at'
            },  
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },

        ]
    });
</script>
@endsection
