@extends('visitor.layout.main')

@section('title', 'Pedoman Nasional Pelayanan Kedokteran (PNPK)')

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
            padding: 0.5rem;
        }

        .folder-card-body {
            flex-shrink: 0;
            padding: 0.75rem 1rem 1rem 1rem;
            background: white;
            border-top: 1px solid #f0f0f0;
        }

        .folder-title {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            line-height: 1.2;
            height: 2.4em; /* Fixed height untuk 2 lines */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-wrap: break-word;
            hyphens: auto;
            position: relative;
            cursor: pointer;
        }

        /* Tooltip styling */
        .folder-title:hover::after {
            content: attr(data-full-text);
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
            white-space: nowrap;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            margin-bottom: 8px;
            max-width: 300px;
            white-space: normal;
            text-align: center;
            line-height: 1.4;
        }

        .folder-title:hover::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 6px solid transparent;
            border-top-color: #333;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            margin-bottom: 2px;
        }

        .folder-title:hover::after,
        .folder-title:hover::before {
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
                -webkit-line-clamp: 3;
                height: 3.6em;
            }
        }

        /* Mobile - 1 card per row */
        @media (max-width: 767px) {
            .folder-container {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .folder-card {
                height: auto;
                min-height: 200px;
                max-width: 400px;
                margin: 0 auto 1rem auto;
            }

            .folder-title {
                font-size: 16px;
                -webkit-line-clamp: none;
                height: auto;
                max-height: none;
                line-height: 1.4;
                padding-bottom: 0.5rem;
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
        <h1>Pedoman Nasional Pelayanan Kedokteran (PNPK)</h1>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($downloadCategories as $downloadCategory)
                <a class="folder-container col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 text-decoration-none" href="/unduh/{{ $downloadCategory->id }}">
                    <div class="card mt-3 folder-card">
                        <div class="folder-icon-container">
                            <svg width="170" height="170" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FFA000" d="M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z"/>
                                <path fill="#FFCA28" d="M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z"/>
                            </svg>
                        </div>
                        <div class="card-body folder-card-body">
                            <p class="folder-title text-center text-black" data-full-text="{{ $downloadCategory->name }}">{{ $downloadCategory->name }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-5">
            <p class="text-danger italic">Semua file PNPK diambil dari Website Kementrian Kesehatan</p>
            <p class="text-black">Link : <a href="https://www.kemkes.go.id/id/media/subfolder/pedoman/pedoman-nasional-pelayanan-kedokteran-pnpk">https://www.kemkes.go.id/id/media/subfolder/pedoman/pedoman-nasional-pelayanan-kedokteran-pnpk</a></p>
        </div>
    </div>
@endsection