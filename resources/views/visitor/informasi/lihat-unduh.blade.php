@extends('visitor.layout.main')

@section('title', 'Unduh')

@section('style')
    <!-- Search and Filter Components CSS -->
    <link rel="stylesheet" href="{{ asset('css/visitor/components/search-and-filters.css') }}">

    <style>
        .download-button {
            color: #283779;
            text-decoration: none;
        }

        .download-button:hover {
            color: #00A0C6;
            text-decoration: none;
        }


        .no-results {
            padding: 2rem;
            text-align: center;
        }

        .search-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .pagination-container {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
        }

        /* Fix table column spacing and improve readability */
        .table {
            font-size: 16px;
        }

        .table td:first-child,
        .table th:first-child {
            text-align: center;
            width: 70px;
            padding: 12px 8px;
        }

        .table td:last-child,
        .table th:last-child {
            text-align: center;
            width: 120px;
            padding: 12px 8px;
        }

        .table td:nth-child(2),
        .table th:nth-child(2) {
            padding: 12px 16px;
        }

        .table th {
            font-size: 16px;
            font-weight: 600;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1>{{ $category->name }}</h1>
    </div>

    <div class="container">
        <!-- Search Form -->
        <div class="search-container mb-4">
            <div class="search-inner">
                <input type="text" id="searchInput" name="search" class="search-input"
                       placeholder="Cari file..." value="{{ $searchTerm }}" autocomplete="off">

                <div class="search-icon-container">
                    <svg class="search-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <button type="button" class="clear-button" id="clearSearch">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
            <div class="search-results-count" id="searchResultsCount"></div>
        </div>

        <!-- Downloads Table -->
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead style="color: white; background-color: #283779">
                        <tr>
                            <th style="width: 70px;">No.</th>
                            <th>Nama File</th>
                            <th style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="downloadsContainer">
                        @if($downloads->count() > 0)
                            @foreach ($downloads as $download)
                                @include('visitor.informasi._download_row', ['download' => $download, 'index' => $loop->iteration + ($downloads->currentPage() - 1) * $downloads->perPage()])
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div class="no-results">
                                        <i class="fas fa-search fa-2x mb-3 text-muted"></i>
                                        <h5 class="mb-3">Tidak ada file ditemukan</h5>
                                        <p class="text-muted mb-4">Maaf, tidak ada file yang sesuai dengan pencarian "{{ $searchTerm }}"</p>
                                        <button type="button" id="backToAllFiles" class="btn btn-primary btn-sm">
                                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke semua file
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination">
                {{ $downloads->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/visitor/components/search-handler.js') }}"></script>
<script>
$(document).ready(function() {
    const searchHandler = new SearchHandler({
        searchInputId: 'searchInput',
        clearButtonId: 'clearSearch',
        containerId: 'downloadsContainer',
        searchResultsCountId: 'searchResultsCount',
        paginationContainerClass: 'pagination-container',
        searchEndpoint: '/unduh/{{ $category->id }}',
        contentType: 'file',
        backButtonId: 'backToAllFiles'
    });
});
</script>
@endsection
