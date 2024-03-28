@extends('visitor.layout.main')

@section('title', 'Alur Pelayanan')

@section('style')
<style>
    .square-image{
        border: 2px solid #283779; /* Border berwarna hitam */
        border-radius: 10px; /* Radius border */
        padding: 50px;
    }
</style>
@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Alur Pelayanan</h1>
    </div>

    <div class="container text-center">
        <div class="mb-5 square-image">
            <img src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan IGD.png') }}" alt="Alur Peyananan IGD">
        </div>
        <div class="mb-5 square-image">
            <img src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Rawat Jalan.png') }}" alt="Alur Pelayanan Rawat Jalan">
        </div>
        <div class="mb-5 square-image">
            <img src="{{ asset('visitor/assets/img/alur-pelayanan/Alur Pelayanan Hemodialisis.png') }}" alt="Alur Pelayanan Hemodialisis">
        </div>
    </div>
@endsection
