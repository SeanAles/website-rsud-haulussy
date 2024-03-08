@extends('visitor.layout.main')

@section('title', 'Unduh')

@section('style')
    <style>
        .download-button {
            color: #283779;
        }

        a:hover {
            color: #00A0C6;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section id="content">
        <div class="text-center mb-5">
            <h1>Unduh</h1>
        </div>

        <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
            <table class="table table-bordered table-striped">
                <tr style="color: white; background-color: #283779">
                    <th>No.</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($downloads as $download)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $download->name }}</td>
                        <td>
                            <a target="_blank" class="download-button" href="{{ $download->url }}">Download</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
