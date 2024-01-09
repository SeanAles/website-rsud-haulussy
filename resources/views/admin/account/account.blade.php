@extends('admin.layout.main')

@section('title', 'Akun')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <!-- Button trigger modal Add Account -->
        <button type="button" class="mr-1 mt-1 create btn btn-success btn-md" data-toggle="modal"
            data-target="#addAccountModal">
            Tambahkan Akun
        </button>

        <!-- Add Account -->
        <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAccountModalLabel">Tambahkan Akun
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddAccount">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Konfirmasi Password" autocomplete="off">
                            </div>

                            <div class="form group">
                                <label for="role_id">Role</label>
                                <select class="custom-select" id="role_id" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                id="cancelAddAccount">Batal</button>
                            <button type="button" onclick="addAccount()" class="btn btn-success"
                                id="addAccountButton">Tambahkan</button>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
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
                'info': 'Menampilkan _START_ hingga _END_ dari _TOTAL_ data',
                "emptyTable": "Tidak ada data yang ditemukan",
                "zeroRecords": "Tidak dapat menemukan data yang sesuai",
                'infoEmpty': 'Menampilkan _TOTAL_ data',
                "infoFiltered": " <span class='quickApproveTable_info_filtered_span'>(Disaring dari total _MAX_ data)</span>",
                "processing": "Memproses...",
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
            ajax: "{{ route('account.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    'orderable': false,
                    'searchable': false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role.name',
                    name: 'role.name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        function addAccount() {
            document.getElementById("addAccountButton").disabled = true;
            $.ajax({
                type: 'POST',
                url: '/account',
                data: $('#formAddAccount').serialize(),
                success: function(response) {
                    if (response.status === 'error') {
                        toastr.error(response.message);
                    } else {
                        $('#formAddAccount')[0].reset();
                        $('#cancelAddAccount').click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                    }
                    document.getElementById("addAccountButton").disabled = false;
                },
                error: function(error) {
                    $('#cancelAddAccount').click();
                    $('.data-table').DataTable().ajax.reload();
                    toastr.error("Error");
                    document.getElementById("addAccountButton").disabled = false;
                }
            });
        }

        function updateAccount(id) {
            const name = $('#name' + id).val();

            if (name === '') {
                toastr.error("Nama harus diisi");
            } else {
                document.getElementById("updateAccountButton" + id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/account/' + id,
                    data: $('#formUpdateAccount' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateAccount' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateAccountButton" + id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateAccount' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateAccountButton" + id).disabled = false;
                    }
                });
            }
        }

        function updateAccountPassword(id) {
            const password = $('#password' + id).val();
            const confirmPassword = $('#confirmPassword' + id).val();

            if (password === '') {
                toastr.error("Password tidak boleh kosong.");
            } else if (confirmPassword === "") {
                toastr.error("Konfirmasi password tidak boleh kosong.");
            } else if (confirmPassword !== password) {
                toastr.error("Konfirmasi password tidak sesuai.");
            } else {
                document.getElementById("updateAccountPasswordButton" + id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/account-password/' + id,
                    data: $('#formUpdateAccountPassword' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateAccountPassword' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateAccountPasswordButton" + id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateAccountPassword' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateAccountPasswordButton" + id).disabled = false;
                    }
                });
            }
        }
    </script>
@endsection
