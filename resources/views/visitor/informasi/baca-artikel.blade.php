@extends('visitor.layout.main')

@section('title', $article->title)

@section('style')
    <style>
        @media (min-width: 992px) {
            .right-panel {
                padding-right: 50px;
            }

            .left-panel {
                padding-left: 50px;
            }
        }

        @media (max-width: 767.98px) {

            .left-panel,
            .right-panel {
                margin-top: 20px;
            }
        }

        /* .recommended-title {
              white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            } */

        .copy-btn {
            background-color: green;
            color: white;
            padding: 4px 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .copied {
            border: none;
            border-radius: 5px;
            background-color: gray;
            color: white;
            cursor: not-allowed;
        }
    </style>
@endsection

@section('content')
    <div class="p-4">
        <div class="row">
            <!-- Bagian Kiri (60%) -->
            <div class="col-md-8 col-lg-7 left-panel">
                <h2>{{ $article->title }}</h2>
                <div class="row justify-content-between align-items-center mb-3">
                    <div class="col-auto text-black">
                        <span class="card-text text-muted text-left">/ {{ $article->author }} /
                            {{ $article->created_at->format('d - m - Y') }} </span>
                    </div>
                    <div class="col-auto">
                        <button id="copyButton" class="copy-btn mr-1" onclick="copyUrl()">Copy URL</button>
                        <img id="whatsappImage" src="{{ asset('visitor/assets/icon/whatsapp.png') }}" width="40px"
                            alt="whatsapp" class="text-right">
                    </div>
                </div>
                <img src="{{ asset('images/article/thumbnails/' . $article->thumbnail) }}" width="100%" class="img-fluid">
                {!! $article->description !!}
            </div>
            <!-- Bagian Kanan (40%) -->
            <div class="col-md-4 col-lg-5 right-panel">
                <hr>
                <h3>Artikel Lainnya</h3>
                <hr>
                @foreach ($articles as $article)
                    <a href="/artikel/{{ $article->slug }}" class="recommended-title text-dark">
                        <p class="text-dark"><strong>{{ $article->title }}</strong></p>
                    </a>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('whatsappImage').addEventListener('click', function() {
            const pageUrl = window.location.href;
            const whatsappLink = 'whatsapp://send?text=' + encodeURIComponent(pageUrl);
            window.location.href = whatsappLink;
        });

        function copyUrl() {
            const url = window.location.href;
            const copyText = document.createElement('textarea');
            document.body.appendChild(copyText);
            copyText.value = url;
            copyText.select();
            document.execCommand('copy');
            document.body.removeChild(copyText);

            const button = document.getElementById('copyButton');
            button.innerHTML = 'Copied';
            button.classList.remove('copy-btn');
            button.classList.add('copied');
            button.disabled = true;
        }
    </script>

@endsection
