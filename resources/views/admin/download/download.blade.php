@extends('admin.layout.main')

@section('title', 'Download')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div>
        <button type="button" class="update btn btn-success mb-2" data-toggle="modal" data-target="#addDownloadModal">
            Tambahkan File
        </button>
        {{-- Edit Note Modal --}}
        {{-- <div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="editNoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNoteModalLabel">
                            Edit Keterangan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formEditNote">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="content">Keterangan</label>
                                <input type="text" value="{{ $note->content }}" class="form-control" name="content"
                                    id="content">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelEditNote">Batal</button>
                            <button type="button" onclick="editNote()" class="btn btn-success"
                                id="editNoteButton">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}


        {{-- Tambahkan Download Modal --}}
        <div class="modal fade" id="addDownloadModal" tabindex="-1" role="dialog" aria-labelledby="addDownloadModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDownloadModalLabel">
                            Tambahkan File
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddDownload">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama File</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama file...">
                            </div>
                            <div class="form-group">
                                <label for="url">Url File</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Masukkan URL file...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddDownload">Batal</button>
                            <button type="button" onclick="addDownload()" class="btn btn-success"
                                id="addDownloadButton">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr>
        <table class="table table-bordered table-responsif data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama File</th>
                    <th>Url File</th>
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
        $(document).ready(function() {
            readDownload();
        });

        function readDownload() {
            return $('.data-table').DataTable({
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
                ajax: "{{ route('download.index') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        'orderable': false,
                        'searchable': false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        }

        function updateDownload(id) {
            const name = $('#name-update' + id).val();
            const url = $('#url-update' + id).val();
            
            if (name === '') {
                toastr.error("Nama file harus diisi");
            } else if(url === ''){
                toastr.error("URL file harus diisi");
            } else {
                document.getElementById("updateDownloadButton" + id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/download/' + id,
                    data: $('#formUpdateDownload' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateDownload' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateDownloadButton" + id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateDownload' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateDownloadButton" + id).disabled = false;
                    }
                });
            }
        }

        function addDownload() {
            const name = $('#name').val();
            const url = $('#url').val();

            if (name === '') {
                toastr.error("Nama file harus diisi");
            } else if (url === '') {
                toastr.error("URL File harus diisi");
            } else {
                document.getElementById("addDownloadButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/download',
                    data: $('#formAddDownload').serialize(),
                    success: function(response) {
                        $('#cancelAddDownload').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        $('#name').val('');
                        $('#url').val('');
                        document.getElementById("addDownloadButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelAddDownload').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("addDownloadButton").disabled = false;
                    }
                });
            }
        }

        function deleteDownload(id) {
            document.getElementById("deleteDownloadButton" + id).disabled = true;

            $.ajax({
                type: 'DELETE',
                url: '/download/' + id,
                data: $('#formDeleteDownload' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteDownload' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteDownloadButton" + id).disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteDownloadButton" + id).disabled = false;
                }
            });
        }
    </script>
@endsection
