@extends('visitor.layout.main')

@section('title', 'Survey Kepuasan Pengguna')

@section('style')

@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Survey Kepuasan Pengguna</h1>
    </div>

    <div class="text-center">
        <img class="col-6 col-sm-6 col-md-4 col-lg-2 mb-3"
            src="{{ asset('visitor/assets/img/qrcode/Kuesioner Kepuasan Pelayanan RSUD dr. M. Haulussy Ambon (1).png') }}"
            alt=""><br>
        <a href="https://forms.gle/n3tMqqkmyCKWUPDa9" target="_blank" class="btn btn-info">Tekan Saya</a>
    </div>
@endsection
