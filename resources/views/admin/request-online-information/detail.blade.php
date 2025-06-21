@extends('admin.layout.main')

@section('title', 'Detail Permintaan Informasi Online')

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
            --card-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            --border-radius: 12px;
            --transition-speed: 0.3s;
            --spacing-xs: 8px;
            --spacing-sm: 12px;
            --spacing-md: 16px;
            --spacing-lg: 24px;
            --spacing-xl: 32px;
        }

        .content-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            margin-bottom: 20px;
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

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .breadcrumb-item {
            font-size: 0.95rem;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color var(--transition-speed) ease;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: '/';
            color: var(--text-muted);
            margin: 0 8px;
        }

        .section-heading {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2d3748;
            display: flex;
            align-items: center;
            position: relative;
            padding-bottom: 10px;
        }

        .section-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, #4299e1, #667eea);
            border-radius: 5px;
        }

        .section-heading i {
            margin-right: 10px;
            color: #4299e1;
            font-size: 1.3em;
        }

        .info-card {
            background: linear-gradient(145deg, #ffffff, #f5f7fa);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            border-left: 4px solid #4299e1;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 12px;
            background: rgba(66, 153, 225, 0.05);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: rgba(66, 153, 225, 0.1);
            transform: translateX(5px);
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4299e1, #667eea);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 16px;
        }

        .info-content {
            flex: 1;
        }

        .info-label {
            font-weight: 600;
            color: #2d3748;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        .info-value {
            color: #4a5568;
            font-size: 1rem;
        }

        .content-section {
            background: linear-gradient(145deg, #ffffff, #f5f7fa);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .content-section h4 {
            color: #2d3748;
            font-weight: 700;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .content-section h4 i {
            margin-right: 10px;
            color: #4299e1;
        }

        .content-text {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #4299e1;
            font-size: 16px;
            line-height: 1.6;
            color: #4a5568;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
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
                padding: 20px;
            }

            .info-card, .content-section {
                padding: 20px;
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
                                <i class="fas fa-file-alt"></i>
                                Detail Permintaan Informasi Online
                            </div>
                            <a href="{{ route('admin.request-online-information.index') }}" class="btn-back">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                        <div class="content-card-body">
                            <nav aria-label="breadcrumb" class="mb-4">
                                <ol class="breadcrumb bg-transparent p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.request-online-information.index') }}" class="text-decoration-none">Permintaan Informasi Online</a></li>
                                    <li class="breadcrumb-item active text-muted" aria-current="page">Detail</li>
                                </ol>
                            </nav>

                            <div class="section-heading">
                                <i class="fas fa-user-circle"></i>
                                Informasi Pemohon
                            </div>

                            <div class="info-card">
                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Nama Pemohon</div>
                                        <div class="info-value">{{ $requestInfo->name }}</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Email</div>
                                        <div class="info-value">{{ $requestInfo->email }}</div>
                                    </div>
                                </div>

                                <div class="info-item">
                                     <div class="info-icon">
                                         <i class="fas fa-phone"></i>
                                     </div>
                                     <div class="info-content">
                                         <div class="info-label">Nomor Telepon</div>
                                         <div class="info-value">{{ $requestInfo->phone_number }}</div>
                                     </div>
                                 </div>

                                <div class="info-item">
                                    <div class="info-icon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-label">Tanggal Dibuat</div>
                                        <div class="info-value">{{ $requestInfo->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="content-section">
                                <h4><i class="fas fa-info-circle"></i> Informasi yang Diminta</h4>
                                <div class="content-text">
                                    {{ $requestInfo->information }}
                                </div>
                            </div>

                            <div class="content-section">
                                <h4><i class="fas fa-question-circle"></i> Alasan Permintaan</h4>
                                <div class="content-text">
                                    {{ $requestInfo->reason }}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
