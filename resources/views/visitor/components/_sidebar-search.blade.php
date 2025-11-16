<!-- Sidebar Search Component -->
<div class="sidebar-search-wrapper">
    <div class="sidebar-search-header">
        <h4 class="sidebar-search-title">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="search-title-icon">
                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Cari {{ $contentType === 'artikel' ? 'Artikel' : 'Berita' }}
        </h4>
    </div>

    <div class="sidebar-search-container">
        <div class="sidebar-search-inner">
            <input
                type="text"
                id="{{ $searchInputId ?? 'sidebarSearchInput' }}"
                name="search"
                class="sidebar-search-input"
                placeholder="Cari {{ $contentType === 'artikel' ? 'artikel kesehatan' : 'berita terkini' }}..."
                autocomplete="off"
            >

            <div class="sidebar-search-icon-container">
                <svg class="sidebar-search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <button type="button" class="sidebar-clear-button" id="{{ $clearButtonId ?? 'sidebarClearSearch' }}" title="Hapus pencarian">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>

        <!-- Search Dropdown -->
        @include('visitor.components._search-dropdown', [
            'dropdownId' => ($searchInputId ?? 'sidebarSearchInput') . 'Dropdown',
            'contentType' => $contentType,
            'searchEndpoint' => $searchEndpoint
        ])

        <div class="sidebar-search-status" id="{{ $statusId ?? 'sidebarSearchStatus' }}"></div>
    </div>

    @if($showHint ?? true)
    <div class="sidebar-search-hint">
        <small class="text-muted">
            <i class="fas fa-lightbulb"></i>
            Ketik 2+ karakter untuk hasil dropdown
        </small>
    </div>
    @endif
</div>