@extends('admin.layout.main')
@section('title', 'Edit Iklan')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .iklan-form-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            border: none;
        }

        .iklan-form-header {
            background: linear-gradient(to right, #4299e1, #7f9cf5);
            color: white;
            padding: 18px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .iklan-form-body {
            padding: 30px;
            background: linear-gradient(145deg, #ffffff, #f5f7fa);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
            display: block;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .form-control {
            height: 50px;
            font-size: 15px;
            border: 2px solid #e0e6ed;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.02);
            padding: 12px 15px;
        }

        .form-control:focus {
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
            background-color: #fff;
        }

        textarea.form-control {
            height: auto;
            min-height: 120px;
            resize: vertical;
        }

        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 50px;
            margin-bottom: 0;
        }

        .custom-file-input {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 50px;
            margin: 0;
            opacity: 0;
        }

        .custom-file-label {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            height: 50px;
            padding: 12px 15px;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            border: 2px solid #e0e6ed;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .custom-file-label::after {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 3;
            display: block;
            height: 46px;
            padding: 12px 15px;
            line-height: 1.5;
            color: #495057;
            content: "Browse";
            background-color: #e9ecef;
            border-left: inherit;
            border-radius: 0 6px 6px 0;
        }

        .custom-file-input:focus ~ .custom-file-label {
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }

        .btn-submit {
            background: linear-gradient(to right, #3182ce, #4299e1);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.2);
            min-width: 150px;
            justify-content: center;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(49, 130, 206, 0.25);
            color: white;
        }

        .btn-submit i {
            margin-right: 8px;
            font-size: 18px;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
            text-decoration: none;
            min-width: 150px;
            justify-content: center;
        }

        .btn-cancel:hover {
            background: #5a6268;
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
        }

        .img-thumbnail {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }

        .is-invalid {
            border-color: #e53e3e !important;
        }

        .invalid-feedback {
            color: #e53e3e;
            font-weight: 500;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .text-danger {
            color: #e53e3e !important;
        }

        .form-text {
            color: #718096;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .form-check {
            padding-left: 0;
            margin-bottom: 15px;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            margin-top: 0;
            margin-right: 10px;
            border: 2px solid #e0e6ed;
            border-radius: 4px;
        }

        .form-check-input:checked {
            background-color: #4299e1;
            border-color: #4299e1;
        }

        .form-check-label {
            font-weight: 500;
            color: #333;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        input[type="date"] {
            position: relative;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            color: #4299e1;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        @media (max-width: 768px) {
            .form-actions {
                flex-direction: column;
            }

            .btn-submit,
            .btn-cancel {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="iklan-form-card">
                    <div class="iklan-form-header">
                        <div>
                            <i class="material-icons-round mr-2" style="font-size: 24px; vertical-align: middle;">edit</i>
                            <span>Edit Iklan</span>
                        </div>
                    </div>
                    <div class="iklan-form-body">
                        <form action="{{ route('iklan.update', $iklan->id) }}" method="POST" enctype="multipart/form-data" id="formIklan">
                            @method('PUT')
                            @include('admin.iklan._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
