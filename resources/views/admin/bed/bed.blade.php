@extends('admin.layout.main')

@section('title', 'Ketersediaan Bed')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <button type="button" class="update btn btn-success btn-sm" data-toggle="modal" data-target="#addBedModal">
            Tambahkan
        </button>

        {{-- Tambahkan Bed Modal --}}
        <div class="modal fade" id="addBedModal" tabindex="-1" role="dialog" aria-labelledby="addBedModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBedModalLabel">
                            Tambahkan Ruangan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddBed">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="room">Nama Ruangan</label>
                                <input type="text" class="form-control" name="room" id="room">
                            </div>
                            <div class="form-group">
                                <label for="availability">Ketersediaan</label>
                                <input type="number" min="0" class="form-control" name="availability" id="availability">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddBed">Batal</button>
                            <button type="button" onclick="addBed()" class="btn btn-success" id="addBedButton">Tambahkan</button>
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
                    <th>Nama Ruangan</th>
                    <th>Tersedia</th>
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
            readBed();
        });

        function readBed() {
            return $('.data-table').DataTable({
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
                lengthChange: false,
                ajax: "{{ route('beds.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        'orderable': false,
                        'searchable': false
                    },
                    {
                        data: 'room',
                        name: 'room'
                    },
                    {
                        data: 'availability',
                        name: 'availability'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        }

        function updateBed(id) {
            const availability = $('#availability'+id).val();

            if (availability === '') {
                toastr.error("Ketersediaan Laki-laki harus diisi");
            } else {
                document.getElementById("updateBedButton").disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/bed/' + id,
                    data: $('#formUpdateBed' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateBed' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateBedButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateBed' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateBedButton").disabled = false;
                    }
                });
            }
        }

        function addBed() {
            const room = $('#room').val();
            const availability = $('#availability').val();

            if (room === '') {
                toastr.error("Nama ruangan harus diisi");
            } else if (availability === '') {
                toastr.error("Ketersediaan Laki-laki harus diisi");
            } else {
                document.getElementById("addBedButton").disabled = true;
                $.ajax({
                    type: 'POST',
                    url: '/bed',
                    data: $('#formAddBed').serialize(),
                    success: function(response) {
                        $('#cancelAddBed').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        $('#room').val('');
                        $('#availability').val('');
                        document.getElementById("addBedButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelAddBed').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("addBedButton").disabled = false;
                    }
                });
            }
        }

        function deleteBed(id) {
            document.getElementById("deleteBedButton").disabled = true;
            
            $.ajax({
                type: 'DELETE',
                url: '/bed/' + id,
                data: $('#formDeleteBed' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteBed' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteBedButton").disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteBedButton").disabled = false;
                }
            });
        }
    </script>
@endsection
