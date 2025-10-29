@extends('visitor.layout.main')

@section('title', 'SIPPN - CariYanlik')

@section('style')
<style>
    /* Simple Title Section - Seperti halaman lain */
    .simple-title-section {
        margin-bottom: 20px;
    }

    /* Pengenalan Section Styling */
    .pengenalan-content h2 {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(220, 53, 69, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .pengenalan-icon .icon-circle i {
        font-size: 32px;
    }

    .pengenalan-content {
        margin-bottom: 25px;
    }

    .pengenalan-icon {
        margin-top: 20px;
    }

    /* Fitur SIPPN Card Styling */
    .fitur-card {
        text-align: left;
        padding: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .fitur-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .fitur-icon {
        padding: 25px;
        text-align: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 1px solid #e9ecef;
    }

    .fitur-content {
        padding: 25px;
    }

    .fitur-card h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #2c3e50;
    }

    .fitur-card p {
        font-size: 15px;
        line-height: 1.6;
        color: #5a6c7d;
        margin-bottom: 20px;
    }

    .fitur-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        background: #e3f2fd;
        color: #1565c0;
        padding: 4px 10px;
        border-radius: 15px;
        font-size: 11px;
        font-weight: 500;
        display: inline-block;
    }

    .tag:nth-child(2n) {
        background: #f3e5f5;
        color: #7b1fa2;
    }

    .tag:nth-child(3n) {
        background: #e8f5e8;
        color: #2e7d32;
    }

    /* Responsive Fitur Cards */
    @media (max-width: 991px) {
        .fitur-icon {
            padding: 20px;
        }

        .fitur-content {
            padding: 20px;
        }

        .fitur-card h3 {
            font-size: 18px;
        }

        .fitur-card p {
            font-size: 14px;
        }
    }

    @media (max-width: 767px) {
        .fitur-card {
            margin-bottom: 15px;
        }

        .fitur-icon {
            padding: 15px;
        }

        .fitur-content {
            padding: 15px;
        }

        .fitur-card h3 {
            font-size: 17px;
            text-align: center;
        }

        .fitur-card p {
            font-size: 13px;
            text-align: center;
            margin-bottom: 15px;
        }

        .fitur-tags {
            justify-content: center;
        }

        .tag {
            font-size: 10px;
            padding: 3px 8px;
        }
    }

    /* Card consistency - Ukuran dan style yang sama */
    .feature-box, .info-card {
        background: white;
        border-radius: 12px;
        padding: 30px 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        border: 1px solid #e9ecef;
        transition: box-shadow 0.3s ease;
        height: 100%;
    }

    .feature-box:hover, .info-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    /* Sektor Section Styling */
    .sektor-item {
        background: white;
        border-radius: 10px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .sektor-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        border-color: #dc3545;
    }

    .sektor-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 24px;
    }

    .sektor-item h4 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 12px 0;
    }

    .sektor-item p {
        font-size: 14px;
        color: #5a6c7d;
        line-height: 1.5;
        margin: 0;
    }

    /* Responsive for Sektor Items */
    @media (max-width: 991px) {
        .sektor-item {
            padding: 25px 15px;
            min-height: 200px;
        }

        .sektor-icon {
            width: 55px;
            height: 55px;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .sektor-item h4 {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .sektor-item p {
            font-size: 13px;
        }
    }

    @media (max-width: 767px) {
        .sektor-item {
            padding: 20px 15px;
            min-height: 180px;
            margin-bottom: 20px;
        }

        .sektor-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .sektor-item h4 {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .sektor-item p {
            font-size: 13px;
        }
    }

    /* CTA Section - Profesional dengan warna SIPPN */
    .cta-section {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        padding: 50px 0;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 0;
        position: relative;
        overflow: hidden;
    }

    .cta-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .btn-sippn {
        background: #ffffff;
        color: #dc3545;
        padding: 20px 50px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none !important;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 1px solid transparent;
        margin-top: 15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .btn-sippn:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        background: #f8f9fa;
        border-color: #e9ecef;
        color: #dc3545;
        text-decoration: none !important;
    }

    .btn-sippn:focus {
        text-decoration: none !important;
        outline: none;
    }

    .btn-sippn:visited {
        text-decoration: none !important;
        color: #dc3545;
    }

    .btn-sippn i {
        margin-right: 10px;
        font-size: 18px;
        vertical-align: middle;
    }

    .cta-title {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 12px;
        text-shadow: 0 3px 6px rgba(0,0,0,0.3);
        letter-spacing: -1px;
        line-height: 1.2;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cta-subtitle {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 30px;
        opacity: 0.96;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.5;
        color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cta-note {
        margin-top: 20px;
        font-size: 14px;
        opacity: 0.88;
        font-style: italic;
        color: #ffebee;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.4;
    }

    .cta-features {
        display: flex;
        justify-content: center;
        gap: 50px;
        margin: 30px 0;
        flex-wrap: wrap;
        align-items: stretch;
    }

    .cta-feature {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        font-size: 16px;
        font-weight: 600;
        opacity: 0.96;
        padding: 22px 26px;
        background: rgba(255,255,255,0.12);
        border-radius: 16px;
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.25);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        min-width: 140px;
        min-height: 120px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cta-feature:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        border-color: rgba(255,255,255,0.3);
    }

    .cta-feature i {
        font-size: 28px;
        color: #ffffff;
        margin-bottom: 5px;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }

    .cta-feature span {
        color: #ffffff;
        text-align: center;
        font-weight: 700;
        line-height: 1.3;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    /* Responsive CTA Section */
    @media (max-width: 992px) {
        .cta-section {
            padding: 45px 0;
            margin-top: 12px;
        }

        .cta-content {
            padding: 0 25px;
        }

        .cta-title {
            font-size: 40px;
            margin-bottom: 16px;
            letter-spacing: -0.8px;
        }

        .cta-subtitle {
            font-size: 19px;
            margin-bottom: 25px;
            max-width: 550px;
        }

        .cta-features {
            gap: 40px;
            margin: 25px 0;
        }

        .cta-feature {
            padding: 20px 24px;
            min-width: 130px;
            min-height: 110px;
            gap: 10px;
        }

        .cta-feature i {
            font-size: 26px;
            margin-bottom: 4px;
        }

        .cta-feature span {
            font-size: 14px;
        }

        .btn-sippn {
            padding: 18px 45px;
            font-size: 17px;
            border-radius: 8px;
        }

        .btn-sippn i {
            font-size: 17px;
            margin-right: 8px;
        }

        .cta-note {
            margin-top: 18px;
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .cta-section {
            padding: 40px 0;
            margin-top: 8px;
        }

        .cta-content {
            padding: 0 20px;
        }

        .cta-title {
            font-size: 34px;
            margin-bottom: 14px;
            letter-spacing: -0.6px;
            line-height: 1.2;
        }

        .cta-subtitle {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.5;
            max-width: 500px;
        }

        .cta-features {
            gap: 30px;
            margin: 20px 0;
        }

        .cta-feature {
            padding: 18px 20px;
            min-width: 120px;
            min-height: 100px;
            gap: 8px;
        }

        .cta-feature i {
            font-size: 24px;
            margin-bottom: 3px;
        }

        .cta-feature span {
            font-size: 13px;
        }

        .btn-sippn {
            padding: 16px 40px;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 8px;
        }

        .btn-sippn i {
            font-size: 16px;
            margin-right: 8px;
        }

        .cta-note {
            margin-top: 15px;
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .cta-section {
            padding: 35px 0;
            margin-top: 5px;
        }

        .cta-content {
            padding: 0 15px;
        }

        .cta-title {
            font-size: 30px;
            margin-bottom: 12px;
            letter-spacing: -0.4px;
            line-height: 1.2;
        }

        .cta-subtitle {
            font-size: 16px;
            margin-bottom: 18px;
            line-height: 1.5;
            max-width: 450px;
        }

        .cta-features {
            gap: 25px;
            margin: 18px 0;
        }

        .cta-feature {
            padding: 16px 18px;
            min-width: 100px;
            min-height: 90px;
            gap: 6px;
        }

        .cta-feature i {
            font-size: 22px;
            margin-bottom: 2px;
        }

        .cta-feature span {
            font-size: 12px;
            line-height: 1.2;
        }

        .btn-sippn {
            padding: 14px 35px;
            font-size: 15px;
            border-radius: 8px;
            margin-top: 6px;
        }

        .btn-sippn i {
            font-size: 15px;
            margin-right: 7px;
        }

        .cta-note {
            margin-top: 12px;
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .cta-section {
            padding: 30px 0;
        }

        .cta-title {
            font-size: 26px;
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .cta-subtitle {
            font-size: 15px;
            margin-bottom: 15px;
            max-width: 400px;
        }

        .cta-features {
            gap: 20px;
            margin: 15px 0;
        }

        .cta-feature {
            padding: 14px 16px;
            min-width: 90px;
            min-height: 85px;
            gap: 5px;
        }

        .cta-feature i {
            font-size: 20px;
        }

        .cta-feature span {
            font-size: 11px;
        }

        .btn-sippn {
            padding: 12px 30px;
            font-size: 14px;
            border-radius: 8px;
        }

        .btn-sippn i {
            font-size: 14px;
            margin-right: 6px;
        }

        .cta-note {
            margin-top: 10px;
            font-size: 11px;
        }
    }

    /* Informasi & Kontak Tambahan - Professional Design */
    .contact-section {
        background: #ffffff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        margin-top: 20px;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-top: 15px;
    }

    .contact-card {
        display: flex;
        align-items: center;
        padding: 18px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #dc3545;
        transition: all 0.2s ease;
    }

    .contact-card:hover {
        background: #e9ecef;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .contact-icon-wrapper {
        width: 44px;
        height: 44px;
        background: #dc3545;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        flex-shrink: 0;
    }

    .contact-icon {
        font-size: 20px;
        color: white;
    }

    .contact-info h4 {
        margin: 0 0 3px 0;
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
    }

    .contact-info p {
        margin: 0;
        font-size: 14px;
        color: #5a6c7d;
        line-height: 1.4;
    }

    .contact-info a {
        color: #dc3545;
        text-decoration: none;
        font-weight: 500;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-section {
            padding: 20px 15px;
            margin-top: 18px;
        }

        .contact-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .contact-card {
            padding: 14px;
        }

        .contact-icon-wrapper {
            width: 40px;
            height: 40px;
            margin-right: 14px;
        }

        .contact-icon {
            font-size: 18px;
        }

        .contact-info h4 {
            font-size: 14px;
        }

        .contact-info p {
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .contact-section {
            padding: 18px 12px;
            margin-top: 15px;
        }

        .contact-card {
            flex-direction: column;
            text-align: center;
            padding: 18px 12px;
        }

        .contact-icon-wrapper {
            width: 44px;
            height: 44px;
            margin-right: 0;
            margin-bottom: 10px;
        }

        .contact-icon {
            font-size: 18px;
        }

        .contact-info h4 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .contact-info p {
            font-size: 13px;
        }
    }

    /* Spacing yang konsisten */
    .section-spacing {
        margin-bottom: 15px;
    }

    /* Custom padding untuk SIPPN - Override global section padding untuk semua ukuran layar */
    section {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    /* Tablet */
    @media (min-width: 768px) {
        section {
            padding-top: 3.5rem !important;
            padding-bottom: 3.5rem !important;
        }
    }

    /* Desktop */
    @media (min-width: 992px) {
        section {
            padding-top: 4.5rem !important;
            padding-bottom: 4.5rem !important;
        }
    }

    /* Large Desktop */
    @media (min-width: 1200px) {
        section {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }
    }

    .card-spacing {
        margin-bottom: 12px;
    }

    /* List styling yang clean */
    .check-list li {
        color: #5a6c7d;
        padding: 8px 0;
        font-size: 16px;
    }

    .check-list i {
        color: #27ae60;
        margin-right: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        /* Tablet */
        .pengenalan-content h2 {
            font-size: 22px;
            margin-bottom: 15px;
        }

        .pengenalan-content .lead {
            font-size: 17px;
            margin-bottom: 12px;
        }

        .pengenalan-content p {
            font-size: 15px;
            line-height: 1.6;
        }

        .pengenalan-icon .icon-large {
            font-size: 40px;
        }
    }

    @media (max-width: 767px) {
        /* Mobile */
        .simple-title-section {
            margin-bottom: 15px;
        }

        .pengenalan-content {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
        }

        .pengenalan-content h2 {
            text-align: center;
            justify-content: center;
            margin-bottom: 18px;
            font-size: 20px;
        }

        .pengenalan-content .lead {
            text-align: center;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .pengenalan-content p {
            text-align: center;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .pengenalan-icon {
            margin-top: 0;
            padding-top: 20px;
            border-top: 1px solid #f1f3f4;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            margin-bottom: 18px;
        }

        .pengenalan-icon .icon-circle i {
            font-size: 28px;
        }

        .pengenalan-icon p.small {
            font-size: 11px;
            line-height: 1.3;
            margin-bottom: 0;
        }
    }

    @media (max-width: 575px) {
        /* Small Mobile */
        .pengenalan-content {
            margin-bottom: 25px;
            padding-bottom: 15px;
        }

        .pengenalan-content h2 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .pengenalan-content .lead {
            font-size: 15px;
            margin-bottom: 12px;
        }

        .pengenalan-content p {
            font-size: 13px;
        }

        .pengenalan-icon {
            padding-top: 15px;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .pengenalan-icon .icon-circle i {
            font-size: 24px;
        }

        .pengenalan-icon p.small {
            font-size: 10px;
        }
    }

    /* Typography - Kontras dan keterbacaan */
    .section-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 20px;
        text-align: center;
    }

    .card-title {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 20px;
    }

    .card-text {
        color: #5a6c7d;
        line-height: 1.6;
        font-size: 16px;
    }

    .lead {
        color: #34495e;
        font-size: 19px;
        line-height: 1.7;
    }

    /* Icon styling - Lebih konsisten */
    .icon-large {
        font-size: 48px;
        margin-bottom: 20px;
        opacity: 0.9;
    }
</style>
@endsection

@section('content')
    <!-- Simple Title Section -->
    <div class="simple-title-section text-center">
        <h1>SIPPN - CariYanlik</h1>
    </div>

    <div class="container">
        <!-- Pengenalan Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-12">
                    <div class="feature-box">
                        <div class="row align-items-center justify-content-between">
                            <!-- Konten Section -->
                            <div class="col-lg-8 col-md-7">
                                <div class="pengenalan-content">
                                    <h2 class="card-title mb-3">
                                        <i class="fas fa-info-circle text-primary me-2 d-none d-lg-inline"></i>
                                        Apa itu SIPPN CariYanlik?
                                    </h2>
                                    <p class="lead card-text mb-3">SIPPN (Sistem Informasi Pelayanan Publik Nasional) yang kini dikenal sebagai CariYanlik adalah portal terpadu untuk mengakses informasi pelayanan publik dari seluruh instansi pemerintah di Indonesia.</p>
                                    <p class="card-text">Melalui platform ini, Anda dapat menemukan informasi lengkap tentang berbagai layanan publik, mulai dari kesehatan, pendidikan, administrasi, hingga layanan infrastruktur yang disediakan oleh pemerintah.</p>
                                </div>
                            </div>

                            <!-- Icon Section -->
                            <div class="col-lg-4 col-md-5">
                                <div class="pengenalan-icon">
                                    <!-- Desktop/Tablet Icon -->
                                    <div class="d-none d-md-block text-center">
                                        <i class="fas fa-search icon-large" style="color: #dc3545;"></i>
                                        <p class="mt-3 text-muted small">
                                            Sistem Informasi Pelayanan Publik Nasional<br>Cari Informasi Layanan Publik
                                        </p>
                                    </div>

                                    <!-- Mobile Icon -->
                                    <div class="d-block d-md-none text-center">
                                        <div class="icon-circle mx-auto">
                                            <i class="fas fa-search fa-2x" style="color: #dc3545;"></i>
                                        </div>
                                        <p class="mt-2 text-muted small">
                                            Sistem Informasi Pelayanan Publik Nasional<br>Cari Informasi Layanan Publik
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fitur SIPPN Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="section-title">Fitur Utama SIPPN CariYanlik</h2>
                    <p class="lead text-center mb-4">Platform informasi pelayanan publik dengan berbagai kemudahan akses</p>
                </div>

                <!-- Card 1: Informasi Layanan Publik -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card fitur-card">
                        <div class="fitur-icon">
                            <i class="fas fa-hospital" style="color: #dc3545; font-size: 36px;"></i>
                        </div>
                        <div class="fitur-content">
                            <h3 class="card-title">Informasi Layanan Publik</h3>
                            <p class="card-text">Akses database lengkap berbagai layanan publik dari instansi pemerintah se-Indonesia dengan informasi detail dan terupdate.</p>
                            <div class="fitur-tags">
                                <span class="tag">Database Nasional</span>
                                <span class="tag">Info Lengkap</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Berita & Artikel -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card fitur-card">
                        <div class="fitur-icon">
                            <i class="fas fa-newspaper" style="color: #28a745; font-size: 36px;"></i>
                        </div>
                        <div class="fitur-content">
                            <h3 class="card-title">Berita & Artikel</h3>
                            <p class="card-text">Dapatkan informasi terkini tentang pengembangan pelayanan publik, kebijakan baru, dan inovasi layanan pemerintah.</p>
                            <div class="fitur-tags">
                                <span class="tag">Update Terkini</span>
                                <span class="tag">Kebijakan Baru</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Sektor Strategis -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card fitur-card">
                        <div class="fitur-icon">
                            <i class="fas fa-network-wired" style="color: #007bff; font-size: 36px;"></i>
                        </div>
                        <div class="fitur-content">
                            <h3 class="card-title">Sektor Strategis</h3>
                            <p class="card-text">Jelajahi layanan publik dari berbagai sektor penting seperti kesehatan, pendidikan, administrasi, dan infrastruktur.</p>
                            <div class="fitur-tags">
                                <span class="tag">Multi Sektor</span>
                                <span class="tag">Layanan Lengkap</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sektor Layanan Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="section-title">Sektor Strategis Pelayanan Publik</h2>
                    <p class="lead text-center mb-4">Contoh sektor layanan yang umumnya dapat diakses melalui SIPPN (tidak terbatas pada)</p>
                </div>

                <!-- Grid Layout - Konsisten untuk semua device -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sektor-item">
                            <div class="sektor-icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h4>Pelayanan Kesehatan</h4>
                            <p>Informasi rumah sakit, puskesmas, layanan kesehatan, dan program kesehatan masyarakat</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sektor-item">
                            <div class="sektor-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h4>Pendidikan</h4>
                            <p>Data sekolah, universitas, beasiswa, dan program pendidikan nasional</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sektor-item">
                            <div class="sektor-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h4>Administrasi</h4>
                            <p>Pelayanan kependudukan, perizinan, sertifikasi, dan administrasi sipil</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="sektor-item">
                            <div class="sektor-icon">
                                <i class="fas fa-coins"></i>
                            </div>
                            <h4>Sosial & Kesejahteraan</h4>
                            <p>Program bantuan sosial, jaminan kesehatan, dan kesejahteraan masyarakat</p>
                        </div>
                    </div>
                </div>

                <!-- Catatan Kredibilitas -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="alert alert-info" role="alert" style="background: #f8f9fa; border-left: 4px solid #dc3545; border-radius: 8px;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-info-circle me-3" style="color: #dc3545; font-size: 20px;"></i>
                                <div>
                                    <strong style="color: #2c3e50;">Catatan:</strong> SIPPN menyediakan akses informasi ke berbagai sektor strategis pelayanan publik dari seluruh instansi pemerintah. Daftar di atas merupakan contoh sektor yang umumnya tersedia. Untuk informasi lengkap dan terupdate, silakan kunjungi portal resmi SIPPN.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="row">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="cta-title">Temukan Informasi Layanan Publik</h1>
                        <p class="cta-subtitle">
                            Akses mudah ke database lengkap pelayanan publik dari seluruh instansi pemerintah Indonesia
                        </p>

                        <!-- Trust Indicators -->
                        <div class="cta-features">
                            <div class="cta-feature">
                                <i class="fas fa-database"></i>
                                <span>Database Lengkap</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-search"></i>
                                <span>Mudah Dicari</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Informasi Valid</span>
                            </div>
                        </div>

                        <a href="https://sippn.menpan.go.id" target="_blank" class="btn-sippn">
                            <i class="fas fa-external-link-alt"></i>
                            AKSES SIPPN SEKARANG
                        </a>

                        <p class="cta-note">
                            <i class="fas fa-external-link-alt me-1"></i>
                            Anda akan diarahkan ke portal resmi SIPPN Kementerian PAN-RB
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informasi Kontak Section -->
    <div class="container mb-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-section">
                    <h3 class="card-title mb-4 text-center">Informasi & Kontak Terkait</h3>
                    <div class="contact-grid">
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-globe contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Website Resmi</h4>
                                <p><a href="https://sippn.menpan.go.id" target="_blank">sippn.menpan.go.id</a></p>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-phone contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Telephone</h4>
                                <p>(+62)217398381</p>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-envelope contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Email</h4>
                                <p>sippn@menpan.go.id</p>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-hospital contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Unit Layanan Pengaduan RSUD</h4>
                                <p>0822 3109 8642</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
