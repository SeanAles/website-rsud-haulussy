@extends('admin.layout.main')

@section('title', 'Detail Galeri Kegiatan')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lightbox/css/lightbox.min.css') }}">
@endsection

@section('style')
    <style>
        .gallery img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
    <input type="hidden" name="event_id" id="event_id" value={{ $event->id }}>

    <table class="table table-bordered">
        <tr>
            <td>Nama Kegiatan</td>
            <td><b>{{ $event->name }}</b></td>
        </tr>
        <tr>
            <td>Slug Gambar Kegiatan</td>
            <td><b>{{ $event->slug }}</b></td>
        </tr>
    </table>

    <div class="p-0">
        <hr>
        <h5><b>Daftar Gambar Kegiatan</b></h5>
        <hr>
        <button type="button" class="mr-1 mt-1 mb-4 create btn btn-success btn-md" data-toggle="modal"
            data-target="#addEventPictureModal">
            Tambahkan Gambar Kegiatan
        </button>
        <table class="table table-bordered table-responsif data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


    <!-- Add Event Picture -->
    <div class="modal fade" id="addEventPictureModal" tabindex="-1" role="dialog"
        aria-labelledby="addEventPictureModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventPictureModalLabel">Tambahkan Gambar Kegiatan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddEventPicture" onsubmit="return false;">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pictures">Gambar Kegiatan (maks: 512kb, 5 Gambar Maksimal)</label>
                            <input type="file" name="pictures[]" id="pictures" class="pb-5 pt-3 form-control" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            id="cancelAddEventPicture">Batal</button>
                        <button type="button" onclick="addEventPicture({{ $event->id }})" class="btn btn-success"
                            id="addEventPictureButton">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="{{ asset('plugins/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        lightbox.option({
            resizeDuration: 200,
            wrapAround: false,
            albumLabel: "Gambar ke %1 dari %2"
        })

        $('.data-table').DataTable({
            language: {
                'info': 'Menampilkan _START_ hingga _END_ dari _TOTAL_ data',
                "emptyTable": "Tidak ada data yang ditemukan",
                "zeroRecords": "Tidak dapat menemukan data yang sesuai",
                'paginate': {
                    'previous': '<span class="prev-icon">Sebelum</span>',
                    'next': '<span class="next-icon">Selanjutnya</span>'
                }
            },
            bFilter: false,
            order: [],
            columnDefs: [{
                targets: [0],
                orderable: false,
                searchable: false
            }],
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: "{{ route('event.detail', $event->id) }}",
            columns: [{
                    data: 'DT_RowIndex',
                    'orderable': false,
                    'searchable': false
                },
                {
                    data: 'path',
                    name: 'path',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var imagePath = "{{ asset('images/event') }}/" + data;
                        return '<a href="' + imagePath +
                            '" data-lightbox="gallery-item"><img src="' +
                            imagePath + '" alt=' + data +
                            ' class="img-fluid" style="max-height:300px"></a>';
                    },

                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        function deleteEventPicture(id) {
            document.getElementById("deleteEventPictureButton" + id).disabled = true;
            $.ajax({
                type: 'DELETE',
                url: '/event-picture/' + id,
                data: $('#formDeleteEventPicture' + id).serialize(),
                success: function(response) {
                    $('#cancelDeleteEventPicture' + id).click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.success(response.message);
                    document.getElementById("deleteEventPictureButton" + id).disabled = false;
                },
                error: function(error) {
                    const errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                    document.getElementById("deleteEventPictureButton" + id).disabled = false;
                }
            });
        }

        function addEventPicture(id) {
            const pictures = document.getElementById('pictures').files;
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

            if (pictures.length <= 0) {
                toastr.error("Gambar kegiatan tidak boleh kosong");
            } else if (statusPicturesTotal) {
                toastr.error("Jumlah gambar maksimal 5")
            } else if (statusPicturesSize) {
                toastr.error("Ukuran gambar maksimal 512 kb")
            } else if (statusPicturesMime) {
                toastr.error("Format gambar yang disupport adalah jpeg, png, jpg.")
            } else {
                document.getElementById("addEventPictureButton").disabled = true;
                const formData = new FormData($('#formAddEventPicture')[0]);
                const csrfToken = $('meta[name=csrf-token]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/event-picture/' + id,
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
                            $('#formAddEventPicture')[0].reset();
                            $('#cancelAddEventPicture').click();
                            $('.data-table').DataTable().ajax.reload();
                            toastr.success(response.message);
                        }
                        document.getElementById("addEventPictureButton").disabled = false;
                    },
                    error: function(error) {
                        $('#cancelAddEventPicture').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("addEventPictureButton").disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
