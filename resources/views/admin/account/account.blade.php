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
        <a class="btn btn-success" href="#">Tambahkan Akun</a>
        <!-- Button trigger modal -->
        
        <hr>
        <table class="table table-bordered table-responsif data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
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

        function updateAccount(id) {
            const name = $('#name'+id).val();

            if (name === '') {
                toastr.error("Nama Akun harus diisi");
            } else {
                document.getElementById("updateAccountButton"+id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/account/' + id,
                    data: $('#formUpdateAccount' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateAccount' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateAccountButton"+id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateAccount' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateAccountButton"+id).disabled = false;
                    }
                });
            }
        }

        function updateAccountPassword(id) {
            const password = $('#password'+id).val();
            const confirmPassword = $('#confirmPassword'+id).val();

            if (password === '') {
                toastr.error("Password harus diisi");
            } else if(confirmPassword === ""){
                toastr.error("Konfirmasi Password harus diisi");
            } else if(confirmPassword !== password){
                toastr.error("Konfirmasi Password tidak sesuai");
            }  
            else {
                document.getElementById("updateAccountPasswordButton"+id).disabled = true;
                $.ajax({
                    type: 'PATCH',
                    url: '/account-password/' + id,
                    data: $('#formUpdateAccountPassword' + id).serialize(),
                    success: function(response) {
                        $('#cancelUpdateAccountPassword' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.success(response.message);
                        document.getElementById("updateAccountPasswordButton"+id).disabled = false;
                    },
                    error: function(error) {
                        $('#cancelUpdateAccountPassword' + id).click();
                        $('.data-table').DataTable().ajax.reload();
                        toastr.error("Error");
                        document.getElementById("updateAccountPasswordButton"+id).disabled = false;
                    }
                });
            }
        }
        
    </script>
@endsection
