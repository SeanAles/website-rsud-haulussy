@extends('admin.layout.main')

@section('title', 'Galeri Kegiatan')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <!-- Button trigger modal Add Galery -->
        <button type="button" class="mr-1 mt-1 create btn btn-success btn-md" data-toggle="modal"
            data-target="#addGaleryModal">
            Tambahkan Galeri
        </button>

        <!-- Add Galery -->
        <div class="modal fade" id="addGaleryModal" tabindex="-1" role="dialog" aria-labelledby="addGaleryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGaleryModalLabel">Tambahkan Galeri
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddGalery">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="pictures">Gambar Berita</label>
                                <input type="file" name="pictures[]" id="pictures" class="pb-5 pt-3 form-control" multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddGalery">Batal</button>
                            <button type="button" onclick="addGalery()" class="btn btn-success"
                                id="addGaleryButton">Tambahkan</button>
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
                    <th>Nama Kegiatan</th>
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
        // $('.data-table').DataTable({
        //     order: [
        //         [1, "asc"]
        //     ],
        //     columnDefs: [{
        //         targets: [0],
        //         orderable: false,
        //         searchable: false
        //     }],
        //     processing: true,
        //     serverSide: true,
        //     responsive: true,
        //     autoWidth: false,
        //     ajax: "{{ route('account.index') }}",
        //     columns: [{
        //             data: 'DT_RowIndex',
        //             'orderable': false,
        //             'searchable': false
        //         },
        //         {
        //             data: 'name',
        //             name: 'name'
        //         },
        //         {
        //             data: 'email',
        //             name: 'email'
        //         },
        //         {
        //             data: 'role.name',
        //             name: 'role.name'
        //         },
        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         },

        //     ]
        // });

        function addGalery() {
            document.getElementById("addGaleryButton").disabled = true;
            
            const formData = new FormData($('#formAddGalery')[0]);
            // formData.append('name', name);

            // let totalFilesToBeUploaded = $('#pictures')[0].files.length;
            // let pictures = $('#pictures')[0];
            // for (let i = 0; i < totalFilesToBeUploaded; i++) {
            //     formData.append('pictures' + i, pictures.files[i]);
            // }
            // formData.append('totalFilesToBeUploaded', totalFilesToBeUploaded);

            const csrfToken = $('meta[name=csrf-token]').attr('content');
            $.ajax({
                type: 'POST',
                url: '/galery',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
                },
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                    } else {
                        $('#formAddGalery')[0].reset();
                        $('#cancelAddGalery').click();
                        // $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                    }
                    document.getElementById("addGaleryButton").disabled = false;
                },
                error: function(error) {
                    $('#cancelAddGalery').click();
                    // $('.data-table').DataTable().ajax.reload();
                    toastr.error("Error");
                    document.getElementById("addGaleryButton").disabled = false;
                }
            });
        }

    </script>
@endsection
