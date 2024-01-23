@extends('admin.layout.main')

@section('title', 'Berita')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection


@section('content')
    <div>
        <a class="btn btn-success" href="/news-add">Buat Berita</a>
        <!-- Button trigger modal -->

        <hr>
        <table class="table table-bordered table-responsif data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Author</th>
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
                'infoEmpty': 'Menampilkan _TOTAL_ data',
                "infoFiltered": " <span class='quickApproveTable_info_filtered_span'>(Disaring dari total _MAX_ data)</span>",
                "processing": "Memproses...",
                "emptyTable": "Tidak ada data yang ditemukan",
                "zeroRecords": "Tidak dapat menemukan data yang sesuai",
                'paginate': {
                    'previous': '<span class="prev-icon">Sebelum</span>',
                    'next': '<span class="next-icon">Selanjutnya</span>'
                }
            },
            order: [
                [1, "asc"]
            ],
            columnDefs: [{
                targets: [0],
                orderable: false,
                searchable: false
            }],
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: "{{ route('news.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    'orderable': false,
                    'searchable': false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'author',
                    name: 'author'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        function deleteNews(id) {
            document.getElementById("deleteNewsButton"+id).disabled = true;
            $.ajax({
                type: 'DELETE',
                url: '/news/' + id,
                data: $('#formDeleteNews' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteNews' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteNewsButton"+id).disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteNewsButton"+id).disabled = false;
                }
            });
        }
    </script>
@endsection
