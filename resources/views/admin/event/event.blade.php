@extends('admin.layout.main')

@section('title', 'Galeri Kegiatan')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
@endsection

@section('content')
    <div>
        <!-- Button trigger modal Add Event -->
        <button type="button" class="mr-1 mt-1 create btn btn-success btn-md" data-toggle="modal" data-target="#addEventModal">
            Tambahkan Galeri
        </button>

        <!-- Add Event -->
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalLabel">Tambahkan Galeri
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddEvent" onsubmit="return false;">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Kegiatan</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="date_of_released">Tanggal Kegiatan</label>
                                <input type="text" class="date form-control" name="date_of_released" id="date_of_released" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                                <label for="pictures">Gambar Kegiatan (maks: 512kb, 5 Gambar Maksimal)</label>
                                <input type="file" name="pictures[]" id="pictures" class="pb-5 pt-3 form-control"
                                    multiple>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddEvent">Batal</button>
                            <button type="button" onclick="addEvent()" class="btn btn-success"
                                id="addEventButton">Tambahkan</button>
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
                    <th>Tanggal Kegiatan</th>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        $(".date").datepicker({ 
            dateFormat: 'dd-mm-yy' 
        });
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
            ajax: "{{ route('event.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    'orderable': false,
                    'searchable': false
                },
                {
                    data: 'date_of_released',
                    name: 'date_of_released'
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

        function addEvent() {
            event.preventDefault();
            const pictures = document.getElementById('pictures').files;
            const name = $('#name').val();
            const date = $('#date_of_released').val();
            const maxSizeInBytes = 512 * 1024; // 512 kb
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            let statusPicturesSize = false;
            let statusPicturesMime = false;
            let statusPicturesTotal = false;

            for (let index = 0; index < pictures.length; index++) {
                const file = pictures[index];

                if (file.size > maxSizeInBytes) {
                    statusPicturesSize = true;
                    break;
                }

                if (!allowedTypes.includes(file.type)) {
                    statusPicturesMime = true;
                    break;
                }

                if (index > 4) {
                    statusPicturesTotal = true;
                    break;
                }
            }

            if (name === '') {
                toastr.error("Nama kegiatan tidak boleh kosong");
            } else if (date === '') {
                toastr.error("Tanggal kegiatan tidak boleh kosong");
            } else if (pictures.length <= 0) {
                toastr.error("Gambar kegiatan tidak boleh kosong");
            } else if (statusPicturesTotal) {
                toastr.error("Jumlah gambar maksimal 5")
            } else if (statusPicturesSize) {
                toastr.error("Ukuran gambar maksimal 512 kb")
            } else if (statusPicturesMime) {
                toastr.error("Format gambar yang disupport adalah jpeg, png, jpg.")
            } else {
                document.getElementById("addEventButton").disabled = true;
                const formData = new FormData($('#formAddEvent')[0]);
                const csrfToken = $('meta[name=csrf-token]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/event',
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
                            $('#formAddEvent')[0].reset();
                            $('#cancelAddEvent').click();
                            $('.data-table').DataTable().ajax.reload();
                            toastr.success(response.message);
                        }
                        document.getElementById("addEventButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelAddEvent').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("addEventButton").disabled = false;
                    }
                });
            }
        }

        function deleteEvent(id) {
            document.getElementById("deleteEventButton" + id).disabled = true;
            $.ajax({
                type: 'DELETE',
                url: '/event/' + id,
                data: $('#formDeleteEvent' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteEvent' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteEventButton" + id).disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteEventButton" + id).disabled = false;
                }
            });
        }
    </script>
@endsection
