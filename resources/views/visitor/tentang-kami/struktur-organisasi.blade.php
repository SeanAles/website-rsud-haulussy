@extends('visitor.layout.main')

@section('title', 'Struktur Organisasi')

@section('content')
    <div class="text-center mb-5">
        <h1>Struktur Organisasi</h1>
    </div>
    <div class="container">
        <img src="{{ asset('visitor/assets/img/diagram/Struktur Organisasi (New 2).png') }}" alt="" style="width:100%;">
        <p class="text-danger">
            <i>*Diperbarui Februari 2024</i>
        </p>
    </div>
@endsection
