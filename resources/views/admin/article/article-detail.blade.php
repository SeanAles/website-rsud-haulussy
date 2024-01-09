@extends('admin.layout.main')

@section('title', 'Detail Artikel')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection


@section('content')
    <div>
        <table class="table table-bordered">
            <tr>
                <td>Judul Artikel</td>
                <td><b>{{ $article->title }}</b></td>
            </tr>
            <tr>
                <td>Pembuat Artikel</td>
                <td><b>{{ $article->author }}</b></td>
            </tr>
            <tr>
                <td>Diposting Oleh</td>
                <td><b>{{ $article->user->name }}</b></td>
            </tr>
            <tr>
                <td>Tanggal Diposting</td>
                <td><b>{{ $article->created_at->format('d F Y (H:i)') }}</b></td>
            </tr>
            <tr>
                <td>Slug Artikel</td>
                <td><b>{{ $article->slug }}</b></td>
            </tr>

        </table>

        <table class="table table-bordered mt-2">
            <tr>
                <td class="text-center"><b>Thumbnail Artikel</b></td>
            </tr>
            <tr>
                <td class="text-center">
                   <img style="max-width: 400px;" src="{{ asset("images/article/thumbnails/$article->thumbnail") }}">
                </td>
            </tr>
        </table>

        <table class="table table-bordered mt-2">
            <tr>
                <td colspan="2" class="text-center"><b>Konten Artikel</b></td>
            </tr>
            <tr>
                <td>
                    {!! $article->description !!}
                </td>
            </tr>
        </table>
    </div>
@endsection

@section('script')

@endsection
