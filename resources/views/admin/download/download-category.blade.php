@extends('admin.layout.main')

@section('title', 'Kategori Download')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('style')
<style>
  .download-button{
    margin-left : 7px;
  }
</style>
@endsection

@section('content')
    <div>
        <button type="button" class="update btn btn-success mb-2" data-toggle="modal" data-target="#addDownloadCategoryModal">
            Tambahkan Kategori
        </button>
     
        {{-- Tambahkan DownloadCategory Modal --}}
        <div class="modal fade" id="addDownloadCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addDownloadCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDownloadCategoryModalLabel">
                            Tambahkan Kategori
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddDownloadCategory" onsubmit="return false;">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Kategori</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama kategori...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddDownloadCategory">Batal</button>
                            <button type="button" onclick="addDownloadCategory()" class="btn btn-success"
                                id="addDownloadCategoryButton">Tambahkan</button>
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
                    <th>Nama Kategori</th>
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
            readDownloadCategory();
        });

        function readDownloadCategory() {
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
                ajax: "{{ route('download-category.index') }}",
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        }

        function updateDownloadCategory(id) {
            const name = $('#name-update' + id).val();
           
            if (name === '') {
                toastr.error("Nama kategori download harus diisi");
            } else {
                document.getElementById("updateDownloadCategoryButton" + id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/download-category/' + id,
                    data: $('#formUpdateDownloadCategory' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateDownloadCategory' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateDownloadCategoryButton" + id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateDownloadCategory' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateDownloadCategoryButton" + id).disabled = false;
                    }
                });
            }
        }

        function addDownloadCategory() {
            const name = $('#name').val();

            if (name === '') {
                toastr.error("Nama kategori download harus diisi");
            } else {
                document.getElementById("addDownloadCategoryButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/download-category',
                    data: $('#formAddDownloadCategory').serialize(),
                    success: function(response) {
                        $('#cancelAddDownloadCategory').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        $('#name').val('');
                        $('#url').val('');
                        document.getElementById("addDownloadCategoryButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelAddDownloadCategory').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("addDownloadCategoryButton").disabled = false;
                    }
                });
            }
        }

        function deleteDownloadCategory(id) {
            document.getElementById("deleteDownloadCategoryButton" + id).disabled = true;

            $.ajax({
                type: 'DELETE',
                url: '/download-category/' + id,
                data: $('#formDeleteDownloadCategory' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteDownloadCategory' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteDownloadCategoryButton" + id).disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteDownloadCategoryButton" + id).disabled = false;
                }
            });
        }
    </script>
@endsection
