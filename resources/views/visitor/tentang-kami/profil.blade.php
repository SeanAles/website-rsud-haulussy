@extends('visitor.layout.main')

@section('title', 'Profil Rumah Sakit')

@section('style')

@endsection

@section('content')
    <div class="text-center mb-5">
        <h1>Profil Rumah Sakit</h1>
    </div>
    <div class="container">
        <div class="row align-items-center">


            <video controls autoplay controlsList="nodownload">
                <!-- Replace "video.mp4" with the actual path to your video file -->
                <source src="{{ asset('visitor/assets/video/Video Profil Rumah Sakit.mp4') }}" type="video/mp4">
                <!-- Provide alternative sources for different formats if necessary -->
                <!-- <source src="video.webm" type="video/webm"> -->
                <!-- <source src="video.ogg" type="video/ogg"> -->
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

@endsection
