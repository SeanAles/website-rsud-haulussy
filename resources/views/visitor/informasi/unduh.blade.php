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
            height: 260px;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            overflow: hidden;
            position: relative;
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
            padding: 0.1rem;
        }

        .folder-card-body {
            flex-shrink: 0;
            padding: 0.4rem 0.5rem 0.5rem 0.5rem;
            background: white;
            border-top: 1px solid #f0f0f0;
        }

        .folder-title {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            line-height: 1.3;
            min-height: 2.6em; /* Minimum height for 2 lines */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
            hyphens: auto;
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        /* Tooltip styling - hanya muncul saat text terpotong */

        .folder-title .tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 400;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            margin-bottom: 8px;
            max-width: 300px;
            white-space: normal;
            text-align: center;
            line-height: 1.4;
            pointer-events: none;
        }

        .folder-title .tooltip::before {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: #333;
        }

        .folder-title.has-tooltip:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }

  
        /* Responsive breakpoints */
        /* Large Desktop - 4 cards per row */
        @media (min-width: 1200px) {
            .folder-container {
                flex: 0 0 25%;
                max-width: 25%;
            }
        }

        /* Small Desktop/Large Tablet - 3 cards per row */
        @media (min-width: 992px) and (max-width: 1199px) {
            .folder-container {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }
        }

        /* Tablet - 2 cards per row */
        @media (min-width: 768px) and (max-width: 991px) {
            .folder-container {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .folder-title {
                font-size: 14px;
                -webkit-line-clamp: 2;
                min-height: 2.8em;
                line-height: 1.4;
            }
        }

        /* Mobile - 1 card per row */
        @media (max-width: 767px) {
            .folder-container {
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }

            .folder-card {
                height: auto;
                min-height: 200px;
                max-width: 400px;
                margin: 0 auto 1rem auto;
            }

            .folder-title {
                font-size: 16px;
                -webkit-line-clamp: 3;
                min-height: 4.2em;
                line-height: 1.4;
                text-align: center;
                margin-bottom: 0.5rem;
            }

            .folder-icon-container {
                padding: 1rem;
            }

            .folder-card-body {
                padding: 1rem 1.5rem 1.5rem 1.5rem;
            }
        }

        /* Very Small Mobile */
        @media (max-width: 480px) {
            .folder-title {
                font-size: 15px;
                -webkit-line-clamp: 3;
                min-height: 4.2em;
                line-height: 1.4;
            }

            .folder-icon-container svg {
                width: 140px !important;
                height: 140px !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Unduh</h1>
    </div>

    <div class="container">
        <div class="row">
            <!-- Folder PNPK untuk kategori 1-7 -->
            <a class="folder-container col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/pnpk">
                <div class="card mt-2 folder-card">
                    <div class="folder-icon-container">
                        <svg width="170" height="170" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                            <path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                        </svg>
                    </div>
                    <div class="card-body folder-card-body">
                        <p class="folder-title text-center text-black" data-full-text="Pedoman Nasional Pelayanan Kedokteran (PNPK)">Pedoman Nasional Pelayanan Kedokteran (PNPK)</p>
                    </div>
                </div>
            </a>

            <!-- Folder Sertifikat Pendidikan Internal -->
            <a class="folder-container col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/sertifikat-zoominar">
                <div class="card mt-2 folder-card">
                    <div class="folder-icon-container">
                        <svg width="170" height="170" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#1565C0" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                            <path fill="#42A5F5" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                        </svg>
                    </div>
                    <div class="card-body folder-card-body">
                        <p class="folder-title text-center text-black" data-full-text="Sertifikat Pendidikan Internal">Sertifikat Pendidikan Internal</p>
                    </div>
                </div>
            </a>

            <!-- Kategori lainnya (Regulasi Pemprov & Pemerintah) -->
            @foreach ($downloadCategories as $downloadCategory)
                @if ($downloadCategory->id == 8 || $downloadCategory->id == 9)
                    <a class="folder-container col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/{{ $downloadCategory->id }}">
                        <div class="card mt-2 folder-card">
                            <div class="folder-icon-container">
                                @if ($downloadCategory->id == 8)
                                    <!-- Folder Regulasi Pemprov - Hijau -->
                                    <svg width="170" height="170" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#388E3C" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                                        <path fill="#66BB6A" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                                    </svg>
                                @else
                                    <!-- Folder Regulasi Pemerintah - Ungu -->
                                    <svg width="170" height="170" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#6A1B9A" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                                        <path fill="#AB47BC" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                                    </svg>
                                @endif
                            </div>
                            <div class="card-body folder-card-body">
                                <p class="folder-title text-center text-black" data-full-text="{{ $downloadCategory->name }}">{{ $downloadCategory->name }}</p>
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

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mengecek apakah text terpotong
    function isTextTruncated(element) {
        return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
    }

    // Setup tooltip untuk semua folder titles
    const folderTitles = document.querySelectorAll('.folder-title');

    folderTitles.forEach(function(title) {
        const fullText = title.getAttribute('data-full-text');

        // Cek apakah text terpotong
        if (isTextTruncated(title) && fullText && fullText.trim() !== title.textContent.trim()) {
            // Tambahkan tooltip hanya jika text terpotong
            const tooltip = document.createElement('span');
            tooltip.className = 'tooltip';
            tooltip.textContent = fullText;
            title.appendChild(tooltip);
            title.classList.add('has-tooltip');
        }
    });
});
</script>
@endpush
