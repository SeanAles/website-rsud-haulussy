@extends('visitor.layout.main')

@section('title', 'SP4N Lapor!')

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
        background: rgba(27, 113, 161, 0.1);
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

    /* Manfaat Card Styling */
    .manfaat-card {
        text-align: left;
        padding: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .manfaat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .manfaat-icon {
        padding: 25px;
        text-align: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-bottom: 1px solid #e9ecef;
    }

    .manfaat-content {
        padding: 25px;
    }

    .manfaat-card h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 12px;
        color: #2c3e50;
    }

    .manfaat-card p {
        font-size: 15px;
        line-height: 1.6;
        color: #5a6c7d;
        margin-bottom: 20px;
    }

    .manfaat-tags {
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

    /* Responsive Manfaat Cards */
    @media (max-width: 991px) {
        .manfaat-icon {
            padding: 20px;
        }

        .manfaat-content {
            padding: 20px;
        }

        .manfaat-card h3 {
            font-size: 18px;
        }

        .manfaat-card p {
            font-size: 14px;
        }
    }

    @media (max-width: 767px) {
        .manfaat-card {
            margin-bottom: 15px;
        }

        .manfaat-icon {
            padding: 15px;
        }

        .manfaat-content {
            padding: 15px;
        }

        .manfaat-card h3 {
            font-size: 17px;
            text-align: center;
        }

        .manfaat-card p {
            font-size: 13px;
            text-align: center;
            margin-bottom: 15px;
        }

        .manfaat-tags {
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


    /* CTA Section - Profesional dengan warna RSUD */
    .cta-section {
        background: linear-gradient(135deg, #2E86AB 0%, #1B4F72 100%);
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

    .btn-lapor {
        background: #ffffff;
        color: #1B4F72;
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

    .btn-lapor:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        background: #f8f9fa;
        border-color: #e9ecef;
        color: #1B4F72;
        text-decoration: none !important;
    }

    .btn-lapor:focus {
        text-decoration: none !important;
        outline: none;
    }

    .btn-lapor:visited {
        text-decoration: none !important;
        color: #1B4F72;
    }

    .btn-lapor i {
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
        color: #e8f4f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cta-note {
        margin-top: 20px;
        font-size: 14px;
        opacity: 0.88;
        font-style: italic;
        color: #d0e8f0;
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

        .btn-lapor {
            padding: 18px 45px;
            font-size: 17px;
            border-radius: 8px;
        }

        .btn-lapor i {
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

        .btn-lapor {
            padding: 16px 40px;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 8px;
        }

        .btn-lapor i {
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

        .btn-lapor {
            padding: 14px 35px;
            font-size: 15px;
            border-radius: 8px;
            margin-top: 6px;
        }

        .btn-lapor i {
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

        .btn-lapor {
            padding: 12px 30px;
            font-size: 14px;
            border-radius: 8px;
        }

        .btn-lapor i {
            font-size: 14px;
            margin-right: 6px;
        }

        .cta-note {
            margin-top: 10px;
            font-size: 11px;
        }
    }

    /* Alur Section Styling */
    .alur-container {
        max-width: 100%;
    }

    .alur-img {
        max-width: 70%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin: 15px 0;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .clickable-img:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .clickable-img:hover::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(27, 113, 161, 0.1);
        border-radius: 8px;
    }

    /* Desktop/Tablet Steps */
    .alur-overview {
        margin-top: 30px;
    }

    .alur-step-item {
        text-align: center;
        padding: 20px;
        transition: all 0.3s ease;
    }

    .alur-step-item:hover {
        transform: translateY(-3px);
    }

    .step-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1B71A1 0%, #283779 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 24px;
    }

    .alur-step-item h4 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .alur-step-item p {
        font-size: 14px;
        color: #5a6c7d;
        line-height: 1.5;
    }

    /* Mobile Styling */
    .alur-img-mobile {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin: 10px 0;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* Mobile hover/touch effect */
    .alur-img-mobile:hover,
    .alur-img-mobile:active {
        transform: scale(1.02);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* Touch device indication */
    @media (hover: none) {
        .alur-img-mobile {
            position: relative;
        }

        .alur-img-mobile::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(27, 113, 161, 0.05);
            border-radius: 6px;
            pointer-events: none;
        }
    }

    .alur-steps-mobile {
        margin-top: 20px;
    }

    .step-mobile {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid #1B71A1;
    }

    .step-number {
        background: #1B71A1;
        color: white;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .step-content {
        flex: 1;
    }

    .step-content h5 {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .step-content p {
        font-size: 13px;
        color: #5a6c7d;
        line-height: 1.4;
        margin-bottom: 0;
    }

    /* Simple Modal Styling - Minimal */
    #alurModal .close:hover {
        opacity: 1;
    }

    /* Jenis Pengaduan Section - Clean & Professional */
    .pengaduan-item {
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
        align-items: center;
    }

    .pengaduan-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        border-color: #1B71A1;
    }

    .pengaduan-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1B71A1 0%, #283779 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 24px;
    }

    .pengaduan-item h4 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 12px 0;
    }

    .pengaduan-item p {
        font-size: 14px;
        color: #5a6c7d;
        line-height: 1.5;
        margin: 0;
    }

    /* Responsive for Pengaduan Items */
    @media (max-width: 991px) {
        .pengaduan-item {
            padding: 25px 15px;
            min-height: 200px;
        }

        .pengaduan-icon {
            width: 55px;
            height: 55px;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .pengaduan-item h4 {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .pengaduan-item p {
            font-size: 13px;
        }
    }

    @media (max-width: 767px) {
        .pengaduan-item {
            padding: 20px 15px;
            min-height: 180px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            max-width: 300px;
        }

        .pengaduan-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
            margin-bottom: 12px;
            margin-left: auto;
            margin-right: auto;
        }

        .pengaduan-item h4 {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
            width: 100%;
        }

        .pengaduan-item p {
            font-size: 13px;
            text-align: center;
            width: 100%;
        }

        /* Ensure row is centered on tablets and below */
        .row.justify-content-center {
            justify-content: center !important;
        }
    }

    @media (max-width: 576px) {
        .pengaduan-item {
            padding: 18px 12px;
            min-height: 160px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-left: auto !important;
            margin-right: auto !important;
            max-width: 280px !important;
            float: none !important;
            position: relative !important;
            left: 0 !important;
            right: 0 !important;
            transform: none !important;
        }

        .pengaduan-icon {
            width: 45px;
            height: 45px;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pengaduan-item h4 {
            font-size: 15px;
            margin-bottom: 6px;
            text-align: center;
            width: 100%;
            display: block;
        }

        .pengaduan-item p {
            font-size: 12px;
            text-align: center;
            width: 100%;
            line-height: 1.4;
            display: block;
        }

        /* Ensure row centers content on mobile */
        .row.justify-content-center {
            justify-content: center !important;
            text-align: center !important;
        }

        /* Override any conflicting column styles */
        .col-lg-3.col-md-6.col-12 {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }
    }

    /* Jenis Pengaduan Mobile Centering - Proven Working Pattern */
    @media (max-width: 767px) {
        .pengaduan-item {
            padding: 20px 15px;
            min-height: 180px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            max-width: 300px;
        }

        .pengaduan-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
            margin-bottom: 12px;
            margin-left: auto;
            margin-right: auto;
        }

        .pengaduan-item h4 {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
            width: 100%;
        }

        .pengaduan-item p {
            font-size: 13px;
            text-align: center;
            width: 100%;
        }

        /* Ensure row centers content on tablets and below */
        .row {
            justify-content: center !important;
        }
    }

    @media (max-width: 576px) {
        .pengaduan-item {
            padding: 18px 12px;
            min-height: 160px;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-left: auto !important;
            margin-right: auto !important;
            max-width: 280px !important;
            float: none !important;
            position: relative !important;
            left: 0 !important;
            right: 0 !important;
            transform: none !important;
        }

        .pengaduan-icon {
            width: 45px;
            height: 45px;
            font-size: 18px;
            margin-bottom: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .pengaduan-item h4 {
            font-size: 15px;
            margin-bottom: 6px;
            text-align: center;
            width: 100%;
        }

        .pengaduan-item p {
            font-size: 12px;
            text-align: center;
            width: 100%;
            line-height: 1.4;
        }

        /* Ensure row centers content on mobile */
        .row {
            justify-content: center !important;
            text-align: center !important;
        }

        /* Override any conflicting column styles */
        .col-lg-3.col-md-6.col-12 {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
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
        border-left: 4px solid #1B71A1;
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
        background: #1B71A1;
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
        color: #1B71A1;
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

    /* Custom padding untuk SP4N Lapor! - Override global section padding untuk semua ukuran layar */
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
</style>
@endsection

@section('content')
    <!-- Simple Title Section -->
    <div class="simple-title-section text-center">
        <h1>SP4N Lapor!</h1>
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
                                        Apa itu SP4N Lapor?
                                    </h2>
                                    <p class="lead card-text mb-3">SP4N-Lapor! adalah sistem terpadu untuk mengelola pengaduan masyarakat terkait pelayanan publik di seluruh Indonesia.</p>
                                    <p class="card-text">Melalui platform ini, Anda dapat menyampaikan aspirasi, pengaduan, dan permintaan informasi terkait pelayanan publik yang diselenggarakan oleh pemerintah, termasuk layanan kesehatan di RSUD dr. M. Haulussy Ambon.</p>
                                </div>
                            </div>

                            <!-- Icon Section -->
                            <div class="col-lg-4 col-md-5">
                                <div class="pengenalan-icon">
                                    <!-- Desktop/Tablet Icon -->
                                    <div class="d-none d-md-block text-center">
                                        <i class="fas fa-comments icon-large" style="color: #1B71A1;"></i>
                                        <p class="mt-3 text-muted small">
                                            Sistem Pengelolaan Pengaduan<br>Pelayanan Publik Nasional
                                        </p>
                                    </div>

                                    <!-- Mobile Icon -->
                                    <div class="d-block d-md-none text-center">
                                        <div class="icon-circle mx-auto">
                                            <i class="fas fa-comments fa-2x" style="color: #1B71A1;"></i>
                                        </div>
                                        <p class="mt-2 text-muted small">
                                            Sistem Pengelolaan Pengaduan<br>Pelayanan Publik Nasional
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Manfaat Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="section-title">Keunggulan SP4N Lapor!</h2>
                    <p class="lead text-center mb-4">Platform pengaduan pemerintah dengan berbagai keuntungan untuk masyarakat</p>
                </div>

                <!-- Card 1: Mudah & Aksesibel -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card manfaat-card">
                        <div class="manfaat-icon">
                            <i class="fas fa-mobile-alt" style="color: #27ae60; font-size: 36px;"></i>
                        </div>
                        <div class="manfaat-content">
                            <h3 class="card-title">Mudah & Aksesibel</h3>
                            <p class="card-text">Pengaduan dapat disampaikan melalui website, aplikasi mobile, WhatsApp, atau datang langsung ke gerai pelayanan terdekat.</p>
                            <div class="manfaat-tags">
                                <span class="tag">24/7 Access</span>
                                <span class="tag">Multi Platform</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Cepat & Transparan -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card manfaat-card">
                        <div class="manfaat-icon">
                            <i class="fas fa-tachometer-alt" style="color: #3498db; font-size: 36px;"></i>
                        </div>
                        <div class="manfaat-content">
                            <h3 class="card-title">Cepat & Transparan</h3>
                            <p class="card-text">Standar waktu respon maksimal 5 hari kerja. Status pengaduan dapat dipantau secara real-time dengan informasi terbuka.</p>
                            <div class="manfaat-tags">
                                <span class="tag">5 Hari Respon</span>
                                <span class="tag">Real-time Tracking</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Aman & Berdampak -->
                <div class="col-lg-4 card-spacing">
                    <div class="info-card manfaat-card">
                        <div class="manfaat-icon">
                            <i class="fas fa-shield-alt" style="color: #e74c3c; font-size: 36px;"></i>
                        </div>
                        <div class="manfaat-content">
                            <h3 class="card-title">Aman & Berdampak</h3>
                            <p class="card-text">Identitas pelapor dapat dirahasiakan (opsional). Setiap pengaduan digunakan untuk perbaikan pelayanan yang nyata.</p>
                            <div class="manfaat-tags">
                                <span class="tag">Anonymous Option</span>
                                <span class="tag">Service Improvement</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alur Pelayanan Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="section-title">Alur Pelayanan SP4N Lapor!</h2>
                    <p class="lead text-center mb-4">Proses lengkap pengaduan masyarakat dari awal hingga selesai</p>
                </div>
            </div>

            <!-- Desktop/Tablet: Image + Overview -->
            <div class="row d-none d-md-block">
                <div class="col-lg-12">
                    <div class="alur-container">
                        <div class="alur-image-wrapper text-center mb-4">
                            <img src="{{ asset('images/sp4n-lapor!/alur-span-lapor.png') }}"
                                 alt="Alur Pelayanan SP4N Lapor"
                                 class="alur-img clickable-img"
                                 data-toggle="modal"
                                 data-target="#alurModal">
                            <p class="mt-2 text-muted">
                                <small><i class="fas fa-search-plus me-1"></i>Klik gambar untuk memperbesar</small>
                            </p>
                        </div>

                        <!-- Key Steps Overview -->
                        <div class="row alur-overview">
                            <div class="col-md-3">
                                <div class="alur-step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <h4>Registrasi</h4>
                                    <p>Buat akun atau login sebagai pelapor</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alur-step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <h4>Pengisian Form</h4>
                                    <p>Lengkapi data pengaduan dengan detail</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alur-step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <h4>Proses</h4>
                                    <p>Pengaduan dianalisis dan ditindaklanjuti</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="alur-step-item">
                                    <div class="step-icon">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <h4>Selesai</h4>
                                    <p>Feedback dan evaluasi pelayanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Compact Version -->
            <div class="row d-block d-md-none">
                <div class="col-12">
                    <div class="alur-mobile">
                        <!-- Mobile Image -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('images/sp4n-lapor!/alur-span-lapor.png') }}"
                                 alt="Alur Pelayanan SP4N Lapor"
                                 class="alur-img-mobile clickable-img"
                                 data-toggle="modal"
                                 data-target="#alurModal">
                            <p class="mt-2 text-muted">
                                <small><i class="fas fa-search-plus me-1"></i>Klik untuk detail</small>
                            </p>
                        </div>

                        <!-- Mobile Steps -->
                        <div class="alur-steps-mobile">
                            <div class="step-mobile">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h5>Registrasi Akun</h5>
                                    <p>Daftar atau login sebagai pelapor</p>
                                </div>
                            </div>
                            <div class="step-mobile">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h5>Isi Pengaduan</h5>
                                    <p>Lengkapi form dengan data detail</p>
                                </div>
                            </div>
                            <div class="step-mobile">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h5>Proses Verifikasi</h5>
                                    <p>Tim analis akan menindaklanjuti</p>
                                </div>
                            </div>
                            <div class="step-mobile">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h5>Selesai & Feedback</h5>
                                    <p>Evaluasi pelayanan yang diberikan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Jenis Pengaduan Section -->
        <section class="section-spacing">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="section-title">Jenis Pengaduan yang Dapat Disampaikan</h2>
                    <p class="lead text-center mb-4">Berbagai aspek pelayanan rumah sakit yang dapat dievaluasi</p>
                </div>

                <!-- Simple Grid Layout - Like Other Working Sections -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <h4>Pelayanan Medis</h4>
                            <p>Kualitas layanan dokter, perawat, dan tenaga kesehatan lainnya</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Waktu Tunggu</h4>
                            <p>Lama antrian, konsultasi, dan proses pelayanan</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-pills"></i>
                            </div>
                            <h4>Ketersediaan Obat</h4>
                            <p>Ketersediaan dan kualitas obat, serta alat kesehatan</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-broom"></i>
                            </div>
                            <h4>Kebersihan</h4>
                            <p>Sanitasi lingkungan, kebersihan ruangan, dan fasilitas</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4>Sikap Petugas</h4>
                            <p>Tingkah laku, komunikasi, dan etika tenaga medis</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-file-medical"></i>
                            </div>
                            <h4>Administrasi</h4>
                            <p>Proses pendaftaran, pembayaran, dan kelengkapan dokumen</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-wheelchair"></i>
                            </div>
                            <h4>Aksesibilitas</h4>
                            <p>Kemudahan akses untuk penyandang disabilitas dan lansia</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center mb-4">
                        <div class="pengaduan-item">
                            <div class="pengaduan-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>Informasi</h4>
                            <p>Ketersediaan informasi dan transparansi pelayanan</p>
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
                        <h1 class="cta-title">Wujudkan Pelayanan Kesehatan yang Lebih Baik</h1>
                        <p class="cta-subtitle">
                            Setiap masukan Anda membantu kami meningkatkan kualitas pelayanan untuk masyarakat
                        </p>

                        <!-- Trust Indicators -->
                        <div class="cta-features">
                            <div class="cta-feature">
                                <i class="fas fa-shield-alt"></i>
                                <span>Aman & Terjamin</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-clock"></i>
                                <span>Responsif 24/7</span>
                            </div>
                            <div class="cta-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Terpercaya</span>
                            </div>
                        </div>

                        <a href="https://lapor.go.id" target="_blank" class="btn-lapor">
                            <i class="fas fa-paper-plane"></i>
                            LAPORKAN SEKARANG
                        </a>

                        <p class="cta-note">
                            <i class="fas fa-external-link-alt me-1"></i>
                            Anda akan diarahkan ke portal resmi SP4N Lapor! Kementerian PAN-RB
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
                    <h3 class="card-title mb-4 text-center">Informasi & Kontak Tambahan</h3>
                    <div class="contact-grid">
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-globe contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Website Resmi</h4>
                                <p><a href="https://lapor.go.id" target="_blank">lapor.go.id</a></p>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-phone contact-icon"></i>
                            </div>
                            <div>

                            </div>
                            <div class="contact-info">
                                <h4>SMS</h4>
                                <p>1708 (Layanan Pengaduan Nasional)</p>
                            </div>
                        </div>
                        <div class="contact-card">
                            <div class="contact-icon-wrapper">
                                <i class="fas fa-envelope contact-icon"></i>
                            </div>
                            <div class="contact-info">
                                <h4>Email</h4>
                                <p>info@lapor.go.id</p>
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

    <!-- Simple Modal untuk gambar alur - Full screen tanpa frame -->
    <div class="modal fade" id="alurModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content" style="background: rgba(0,0,0,0.9); border: none; border-radius: 0;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: fixed; top: 20px; right: 30px; z-index: 9999; color: white; opacity: 0.8; font-size: 40px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body d-flex align-items-center justify-content-center" style="padding: 0;">
                    <img src="{{ asset('images/sp4n-lapor!/alur-span-lapor.png') }}"
                         alt="Alur Pelayanan SP4N Lapor - Versi Besar"
                         style="max-width: 95%; max-height: 95vh; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
@endsection
