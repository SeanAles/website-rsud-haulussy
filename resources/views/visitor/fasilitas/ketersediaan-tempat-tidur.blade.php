@extends('visitor.layout.main')

@section('title', 'Ketersediaan Tempat Tidur')

@section('style')

@endsection

@section('content')
    <section class="content">
        <div class="text-center mb-5">
            <h1>Ketersediaan Tempat Tidur</h1>
        </div>
        <div class="text-center container">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Nama Ruangan</th>   
                    <th>Ketersediaan</th>
                </tr>
                @foreach ($beds as $bed)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $bed->room }}</td>
                        <td>{{ $bed->availability }}</td>
                    </tr>
                @endforeach
            </table>


        </div>
        <div class="container mt-2 text-danger">
            <p><i><strong>*31 Januari 2024 (09:00 WIT)</strong></i></p>
        </div>

       
    </section>
@endsection
