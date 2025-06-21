@extends('admin.layout.main')

@section('title', 'Detail Kritik dan Saran')

@section('link')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4299e1;
            --primary-hover: #3182ce;
            --primary-gradient: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --text-dark: #2d3748;
            --text-muted: #718096;
            --card-shadow: 0 8px 25px rgba(66, 153, 225, 0.15);
            --hover-shadow: 0 12px 40px rgba(66, 153, 225, 0.2);
            --border-radius: 16px;
            --transition-speed: 0.3s;
            --spacing-xs: 8px;
            --spacing-sm: 12px;
            --spacing-md: 16px;
            --spacing-lg: 24px;
            --spacing-xl: 32px;
        }



        .content-card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            margin-bottom: var(--spacing-lg);
            background: white;
            transition: all var(--transition-speed) ease;
        }

        .content-card:hover {
            box-shadow: var(--hover-shadow);
            transform: translateY(-2px);
        }

        .content-card-header {
            background: var(--primary-gradient);
            color: white;
            padding: var(--spacing-md) var(--spacing-lg);
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .content-card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, transparent 100%);
            pointer-events: none;
        }

        .content-card-header i {
            margin-right: var(--spacing-sm);
            font-size: 1.5em;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }

        .content-card-body {
            padding: var(--spacing-xl);
            background: white;
        }

        .section-heading {
            font-size: 1.375rem;
            font-weight: 700;
            margin-bottom: var(--spacing-lg);
            color: var(--text-dark);
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: var(--spacing-sm);
        }

        .section-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .section-heading i {
            margin-right: var(--spacing-sm);
            color: var(--primary-color);
            font-size: 1.4em;
            filter: drop-shadow(0 2px 4px rgba(66, 153, 225, 0.3));
        }

        .info-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            padding: var(--spacing-xl);
            border-radius: var(--spacing-md);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.08);
            margin-bottom: var(--spacing-lg);
            border: 1px solid rgba(66, 153, 225, 0.1);
            border-left: 5px solid var(--primary-color);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(66, 153, 225, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: var(--spacing-md);
            padding: var(--spacing-md) var(--spacing-lg);
            background: rgba(66, 153, 225, 0.04);
            border-radius: var(--spacing-sm);
            transition: all var(--transition-speed) ease;
            border: 1px solid rgba(66, 153, 225, 0.08);
            position: relative;
        }

        .info-item:hover {
            background: rgba(66, 153, 225, 0.08);
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.15);
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: var(--spacing-lg);
            color: white;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
            position: relative;
        }

        .info-icon::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--primary-gradient);
            border-radius: 50%;
            opacity: 0.3;
            z-index: -1;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-weight: 600;
            color: var(--text-dark);
            font-size: 0.875rem;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #4a5568;
            font-size: 1.125rem;
            font-weight: 500;
        }

        .content-section {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            padding: var(--spacing-xl);
            border-radius: var(--spacing-md);
            box-shadow: 0 6px 20px rgba(66, 153, 225, 0.08);
            margin-bottom: var(--spacing-lg);
            border: 1px solid rgba(66, 153, 225, 0.1);
            position: relative;
            overflow: hidden;
        }

        .content-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
        }

        .content-section h4 {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: var(--spacing-lg);
            display: flex;
            align-items: center;
            font-size: 1.25rem;
        }

        .content-section h4 i {
            margin-right: var(--spacing-sm);
            color: var(--primary-color);
            font-size: 1.3em;
            filter: drop-shadow(0 2px 4px rgba(66, 153, 225, 0.3));
        }

        .content-text {
            background: white;
            padding: var(--spacing-lg);
            border-radius: var(--spacing-sm);
            border-left: 4px solid var(--primary-color);
            font-size: 1.125rem;
            line-height: 1.7;
            color: #4a5568;
            box-shadow: 0 4px 12px rgba(66, 153, 225, 0.08);
            border: 1px solid rgba(66, 153, 225, 0.1);
            position: relative;
        }

        .content-text::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 15px;
            font-size: 3rem;
            color: var(--primary-color);
            opacity: 0.3;
            font-family: Georgia, serif;
        }

        .btn-back {
            background: linear-gradient(135deg, #718096, #a0aec0);
            color: white;
            border: none;
            padding: var(--spacing-xs) var(--spacing-md);
            font-weight: 600;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 4px 12px rgba(113, 128, 150, 0.2);
            font-size: 0.875rem;
            position: relative;
            overflow: hidden;
        }

        .btn-back::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-back:hover::before {
            left: 100%;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #4a5568, #718096);
            box-shadow: 0 8px 30px rgba(113, 128, 150, 0.35);
            transform: translateY(-3px);
            color: white;
            text-decoration: none;
        }

        .btn-back i {
            margin-right: var(--spacing-xs);
            transition: transform var(--transition-speed) ease;
        }

        .btn-back:hover i {
            transform: translateX(-4px);
        }

        @media (max-width: 768px) {
            .content-card-body {
                padding: var(--spacing-lg);
            }
            
            .info-card, .content-section {
                padding: var(--spacing-lg);
            }

            .content-card-header {
                padding: var(--spacing-lg);
                flex-direction: column;
                gap: var(--spacing-md);
            }

            .info-item {
                padding: var(--spacing-sm) var(--spacing-md);
            }

            .info-icon {
                width: 40px;
                height: 40px;
                margin-right: var(--spacing-md);
            }
        }

        @media (max-width: 480px) {
            .content-card-body {
                padding: var(--spacing-md);
            }

            .info-card, .content-section {
                padding: var(--spacing-md);
            }
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
                <div class="content-card">
                    <div class="content-card-header">
                        <div>
                            <i class="fas fa-comment-alt"></i>
                            Detail Kritik dan Saran
                        </div>
                        <a href="{{ route('suggestion.index') }}" class="btn-back">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <div class="content-card-body">
                        <nav aria-label="breadcrumb" class="mb-4">
                            <ol class="breadcrumb bg-transparent p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('suggestion.index') }}" class="text-decoration-none">Kritik dan Saran</a></li>
                                <li class="breadcrumb-item active text-muted" aria-current="page">Detail</li>
                            </ol>
                        </nav>

                        <div class="section-heading">
                            <i class="fas fa-info-circle"></i>
                            Informasi Pengirim
                        </div>

                        <div class="info-card">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Nama Lengkap</div>
                                    <div class="info-value">{{ $suggestion->name }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">{{ $suggestion->email }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Nomor Telepon</div>
                                    <div class="info-value">{{ $suggestion->phone }}</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Tanggal Kirim</div>
                                    <div class="info-value">{{ \Carbon\Carbon::parse($suggestion->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="section-heading">
                            <i class="fas fa-comment-dots"></i>
                            Isi Kritik dan Saran
                        </div>

                        <div class="content-section">
                            <h4><i class="fas fa-quote-left"></i> Pesan</h4>
                            <div class="content-text">
                                {{ $suggestion->message }}
                            </div>
                        </div>


                    </div>
                </div>
        </div>
    </div>
</div>
@endsection