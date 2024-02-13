@extends('visitor.layout.main')

@section('title', 'Ketersediaan Tempat Tidur')

@section('style')
    <style>
        #table {
            z-index: 1;
            background-color: white;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="text-center mb-5">
            <h1>Ketersediaan Tempat Tidur</h1>
        </div>
        <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Nama Ruangan</th>
                    <th>Ketersediaan</th>
                </tr>
                @foreach ($beds as $bed)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bed->room }}</td>
                        <td>{{ $bed->availability }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="mt-2 text-danger font-weight-bold">
                <p><i>*{{ $note->content }}</i></p>
            </div>
        </div>
        

    </section>
@endsection
