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

        /* Folder card styling untuk tinggi seragam */
        .folder-card {
            height: 200px;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .folder-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .folder-icon-container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem 2rem;
        }

        .folder-card-body {
            flex-shrink: 0;
            padding: 1rem;
        }

        .folder-title {
            font-size: 14px;
            font-weight: 500;
            margin: 0;
            line-height: 1.3;
            min-height: 2.6em; /* 2 lines minimum */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Unduh</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Folder PNPK untuk kategori 1-7 -->
            <a class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/pnpk">
                <div class="card mt-3 folder-card">
                    <div class="folder-icon-container">
                        <svg width="120" height="120" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                            <path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                        </svg>
                    </div>
                    <div class="card-body folder-card-body">
                        <p class="folder-title text-center text-black">Pedoman Nasional Pelayanan Kedokteran (PNPK)</p>
                    </div>
                </div>
            </a>

            <!-- Folder Sertifikat Pendidikan Internal -->
            <a class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/sertifikat-zoominar">
                <div class="card mt-3 folder-card">
                    <div class="folder-icon-container">
                        <svg width="120" height="120" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#1565C0" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                            <path fill="#42A5F5" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                        </svg>
                    </div>
                    <div class="card-body folder-card-body">
                        <p class="folder-title text-center text-black">Sertifikat Pendidikan Internal</p>
                    </div>
                </div>
            </a>

            <!-- Kategori lainnya (Regulasi Pemprov & Pemerintah) -->
            @foreach ($downloadCategories as $downloadCategory)
                @if ($downloadCategory->id == 8 || $downloadCategory->id == 9)
                    <a class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/{{ $downloadCategory->id }}">
                        <div class="card mt-3 folder-card">
                            <div class="folder-icon-container">
                                @if ($downloadCategory->id == 8)
                                    <!-- Folder Regulasi Pemprov - Hijau -->
                                    <svg width="120" height="120" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#388E3C" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                                        <path fill="#66BB6A" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                                    </svg>
                                @else
                                    <!-- Folder Regulasi Pemerintah - Ungu -->
                                    <svg width="120" height="120" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#6A1B9A" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                                        <path fill="#AB47BC" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                                    </svg>
                                @endif
                            </div>
                            <div class="card-body folder-card-body">
                                <p class="folder-title text-center text-black">{{ $downloadCategory->name }}</p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="mt-5">
            <p class="text-danger italic">Semua file PNPK diambil dari Website Kementrian Kesehatan</p>
            <p class="text-black">Link : <a href="https://www.kemkes.go.id/id/media/subfolder/pedoman/pedoman-nasional-pelayanan-kedokteran-pnpk">https://www.kemkes.go.id/id/media/subfolder/pedoman/pedoman-nasional-pelayanan-kedokteran-pnpk</a></p>
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
