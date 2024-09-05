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

        .zoominar-button{
            font-size: 20px;
            color: black;
        }

        .zoominar-text{
            color: #283779;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Unduh</h1>
    </div>

    <div class="container">
        <p class="zoominar-button">Sertifikat Pendidikan Internal? <span><a href="/sertifikat-zoominar" class="zoominar-text">Klik Disini</a></span></p>
    </div>

    <div class="container mt-5">
        <div class="row">
        @foreach ($downloadCategories as $downloadCategory)
            <a class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/{{ $downloadCategory->id }}">
                <div class="card mt-3">
                    @unless ($downloadCategory->id == 8 || $downloadCategory->name == 9)
                        <img src="{{ asset('visitor/assets/icon/yellow-folder.png') }}" class="card-img-top w-100 pl-5 pr-5" alt="...">
                    @else
                        <img src="{{ asset('visitor/assets/icon/blue-folder.png') }}" class="card-img-top w-100 pl-5 pr-5" alt="...">
                    @endunless
                    
                    <div class="card-body">
                      <p class="card-text text-center text-black">{{ $downloadCategory->name }}</p>
                    </div>
                  </div>
            </a>
        @endforeach
        </div>
    </div>
   
    {{-- {{ $downloadCategories }} --}}

    {{-- <img src="{{ asset('visitor/assets/icon/file.svg') }}" alt="SVG Image"> --}}

    {{-- <div class="container col-10 col-sm-10 col-md-8 col-lg-6" id="table">
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
    </div> --}}
@endsection
