{{-- Search Dropdown Component for Autocomplete --}}
{{-- Usage: @include('visitor.components._search-dropdown', [
    'dropdownId' => 'searchDropdown',
    'contentType' => 'artikel', // or 'berita'
    'searchEndpoint' => '/artikel' // or '/berita'
]) --}}

<div id="{{ $dropdownId ?? 'searchDropdown' }}" class="search-dropdown">
    {{-- Loading State --}}
    <div class="search-dropdown-loading" id="{{ $dropdownId ?? 'searchDropdown' }}Loading">
        <div class="dropdown-loading-spinner"></div>
        <span class="dropdown-loading-text">Mencari {{ $contentType ?? 'konten' }}...</span>
    </div>

    {{-- Search Results Container --}}
    <div class="search-dropdown-results" id="{{ $dropdownId ?? 'searchDropdown' }}Results">
        {{-- Results will be dynamically inserted here --}}
    </div>

    {{-- No Results State --}}
    <div class="search-dropdown-no-results" id="{{ $dropdownId ?? 'searchDropdown' }}NoResults" style="display: none;">
        <div class="dropdown-no-results-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 11H14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="dropdown-no-results-text">
            Tidak ada {{ $contentType ?? 'konten' }} yang ditemukan
        </div>
    </div>

    {{-- See All Results Button --}}
    <div class="search-dropdown-footer">
        <button type="button" class="dropdown-see-all-btn" id="{{ $dropdownId ?? 'searchDropdown' }}SeeAll">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Lihat semua hasil
        </button>
    </div>
</div>

{{-- Template for Individual Result Item (used by JavaScript) --}}
<template id="{{ $dropdownId ?? 'searchDropdown' }}ItemTemplate">
    <div class="search-dropdown-item">
        <div class="dropdown-item-thumbnail">
            <img src="" alt="" loading="lazy" class="dropdown-item-img">
        </div>
        <div class="dropdown-item-content">
            <div class="dropdown-item-title"></div>
            <div class="dropdown-item-meta">
                <span class="dropdown-item-date">
                    <i class="far fa-calendar-alt"></i>
                    <span class="date-text"></span>
                </span>
                <span class="dropdown-item-views">
                    <i class="far fa-eye"></i>
                    <span class="views-text"></span>
                </span>
            </div>
        </div>
        <div class="dropdown-item-arrow">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</template>