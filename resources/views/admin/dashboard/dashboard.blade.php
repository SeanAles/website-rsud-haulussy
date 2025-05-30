@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('link')
    <style>
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stat-card {
            background: linear-gradient(135deg, var(--card-bg-start), var(--card-bg-end));
            color: white;
            position: relative;
            overflow: hidden;
            animation: slideInUp 0.8s ease-out both;
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .stat-card:nth-child(4) {
            animation-delay: 0.8s;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: scale(0);
            transition: transform 0.6s ease;
        }

        .stat-card:hover::before {
            transform: scale(1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            animation: pulse 3s infinite;
        }

        .stat-card.info {
            --card-bg-start: #4299e1;
            --card-bg-end: #3182ce;
        }

        .stat-card.danger {
            --card-bg-start: #f56565;
            --card-bg-end: #e53e3e;
        }

        .stat-card.success {
            --card-bg-start: #48bb78;
            --card-bg-end: #38a169;
        }

        .stat-card.warning {
            --card-bg-start: #ed8936;
            --card-bg-end: #dd6b20;
        }

        .stat-icon {
            font-size: 2.5rem;
            color: #fff;
            transition: all 0.3s ease;
        }

        .stat-icon:hover {
            transform: scale(1.1);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0;
            animation: countUp 1s ease-out 0.5s both;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0;
            animation: fadeInUp 1s ease-out 0.7s both;
        }

        .card-sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            animation: sparkle 2s linear infinite;
        }

        .card-sparkle:nth-child(1) {
            top: 20%;
            left: 20%;
            animation-delay: 0s;
        }

        .card-sparkle:nth-child(2) {
            top: 60%;
            left: 80%;
            animation-delay: 0.5s;
        }

        .card-sparkle:nth-child(3) {
            top: 80%;
            left: 30%;
            animation-delay: 1s;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out;
        }

        .welcome-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .welcome-banner::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 8s ease-in-out infinite reverse;
        }

        .welcome-icon {
            font-size: 3rem;
            opacity: 0.9;
        }

        .welcome-text {
            animation: slideInLeft 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .welcome-bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: bubbleFloat 4s infinite ease-in-out;
        }

        .welcome-bubble:nth-child(1) {
            width: 20px;
            height: 20px;
            top: 20%;
            left: 15%;
            animation-delay: 0s;
        }

        .welcome-bubble:nth-child(2) {
            width: 15px;
            height: 15px;
            top: 60%;
            left: 25%;
            animation-delay: 1s;
        }

        .welcome-bubble:nth-child(3) {
            width: 25px;
            height: 25px;
            top: 40%;
            right: 20%;
            animation-delay: 2s;
        }

        .welcome-bubble:nth-child(4) {
            width: 12px;
            height: 12px;
            top: 75%;
            right: 35%;
            animation-delay: 3s;
        }

        @keyframes bubbleFloat {
            0%, 100% {
                transform: translateY(0px) scale(1);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-15px) scale(1.1);
                opacity: 0.3;
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes iconFloat {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes sparkle {
            0%, 100% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.2);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="row align-items-center">
                <div class="col-md-8 welcome-text">
                    <h2 class="mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p class="mb-0 opacity-75">Website RSUD dr. M. Haulussy Ambon</p>
                </div>
                <div class="col-md-4 text-right">
                    <i class="material-icons-round welcome-icon">local_hospital</i>
                </div>
            </div>
            <!-- Bubble animations -->
            <div class="welcome-bubble"></div>
            <div class="welcome-bubble"></div>
            <div class="welcome-bubble"></div>
            <div class="welcome-bubble"></div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card dashboard-card stat-card info" style="animation-delay: 0.2s;">
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="stat-number">{{ $articleCount }}</h3>
                                <p class="stat-label">Total Artikel</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="material-icons-round stat-icon">article</i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/article" class="text-white text-decoration-none">
                                <small>Lihat Detail <i class="material-icons-round" style="font-size: 14px;">arrow_forward</i></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card dashboard-card stat-card danger" style="animation-delay: 0.4s;">
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="stat-number">{{ $newsCount }}</h3>
                                <p class="stat-label">Total Berita</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="material-icons-round stat-icon">newspaper</i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/news" class="text-white text-decoration-none">
                                <small>Lihat Detail <i class="material-icons-round" style="font-size: 14px;">arrow_forward</i></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card dashboard-card stat-card success" style="animation-delay: 0.6s;">
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="stat-number">{{ $bedCount }}</h3>
                                <p class="stat-label">Bed Tersedia</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="material-icons-round stat-icon">local_hotel</i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/bed" class="text-white text-decoration-none">
                                <small>Lihat Detail <i class="material-icons-round" style="font-size: 14px;">arrow_forward</i></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card dashboard-card stat-card warning" style="animation-delay: 0.8s;">
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-sparkle"></div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="stat-number">{{ $eventCount }}</h3>
                                <p class="stat-label">Galeri Kegiatan</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="material-icons-round stat-icon">collections</i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="/event" class="text-white text-decoration-none">
                                <small>Lihat Detail <i class="material-icons-round" style="font-size: 14px;">arrow_forward</i></small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Scripts can be added here if needed in the future --}}
@endsection
