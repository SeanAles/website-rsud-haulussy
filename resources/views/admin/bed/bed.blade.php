@extends('admin.layout.main')

@section("title", "Ketersediaan Bed")

@section("link")
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container">

    <hr>
    <table class="table table-bordered table-responsif data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Ruangan</th>
                <th>Laki-Laki</th>
                <th>Perempuan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section("script")
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    $( document ).ready(function() {
        readBed();
    });

    function readBed(){
        return $('.data-table').DataTable({
            order: [[1 , "asc"]],
            columnDefs: [{targets:[0], orderable: false, searchable: false}],
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: "{{ route('beds.index') }}",
            columns: [
                {data: 'DT_RowIndex', 'orderable': false, 'searchable': false },
                {data: 'room', name: 'room'},
                {data: 'man', name: 'man'},
                {data: 'woman', name: 'woman'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        }); 
    }

    function updateBed(id){
        $.ajax({
            type: 'PATCH',
            url: '/bed/' + id,
            data: $('#formUpdateBed'+id).serialize(),
            success: function(response) {
                $('#updateBedModal'+id).modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.data-table').DataTable().ajax.reload();
                toastr.success(response.message);
            },
            error: function(error) {
                $('#updateBedModal'+id).modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.data-table').DataTable().ajax.reload();
            }
        });
    }

</script>
@endsection
