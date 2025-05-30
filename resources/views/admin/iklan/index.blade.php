@extends('admin.layout.main')

@section('title', 'Manajemen Iklan')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .iklan-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            border: none;
        }

        .iklan-card-header {
            background: linear-gradient(to right, #4299e1, #7f9cf5);
            color: white;
            padding: 18px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .iklan-card-body {
            padding: 25px;
            background-color: #fff;
        }

        .btn-create {
            background: linear-gradient(to right, #3182ce, #4299e1);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.2);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(49, 130, 206, 0.25);
            color: white;
        }

        .btn-create i {
            margin-right: 8px;
            font-size: 18px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-start;
        }

        .btn-action {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            padding: 0;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .btn-action span {
            display: none;
        }

        .btn-edit {
            background-color: #edf2f7;
            color: #d69e2e;
            border: 1px solid #e2e8f0;
        }

        .btn-edit:hover {
            background-color: #fefcbf;
            color: #b7791f;
            border-color: #faf089;
        }

        .btn-delete {
            background-color: #edf2f7;
            color: #e53e3e;
            border: 1px solid #e2e8f0;
        }

        .btn-delete:hover {
            background-color: #fff5f5;
            color: #c53030;
            border-color: #fed7d7;
        }

        .btn-action i {
            margin: 0;
            font-size: 16px;
        }

        .btn-action:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.25);
        }

        .table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .table thead th {
            background: linear-gradient(to right, #f8fafc, #edf2f7);
            border: none;
            font-weight: 600;
            color: #4a5568;
            padding: 15px;
        }

        .table tbody td {
            padding: 12px 15px;
            border-color: #e2e8f0;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge-success {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
        }

        .badge-danger {
            background: linear-gradient(135deg, #e53e3e, #c53030);
            color: white;
        }

        .iklan-image {
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .iklan-image:hover {
            transform: scale(1.05);
        }

        .iklan-link {
            color: #4299e1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .iklan-link:hover {
            color: #3182ce;
            text-decoration: none;
        }

        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .alert-success {
            background: linear-gradient(135deg, #f0fff4, #c6f6d5);
            color: #22543d;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fff5f5, #fed7d7);
            color: #742a2a;
        }

        /* Iklan Management Styles */
        .iklan-image {
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Toggle Switch Styles */
        .status-toggle-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .status-toggle {
            position: relative;
            display: inline-block;
            width: 56px;
            height: 30px;
        }

        .status-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #e2e8f0, #cbd5e0);
            transition: all 0.3s ease;
            border-radius: 30px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 24px;
            width: 24px;
            left: 3px;
            bottom: 3px;
            background: linear-gradient(135deg, #ffffff, #f7fafc);
            transition: all 0.3s ease;
            border-radius: 50%;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        input:checked + .toggle-slider {
            background: linear-gradient(135deg, #48bb78, #38a169);
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1), 0 0 8px rgba(72, 187, 120, 0.3);
        }

        input:focus + .toggle-slider {
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.2);
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .toggle-slider.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background: linear-gradient(135deg, #a0aec0, #718096) !important;
        }

        .toggle-slider.disabled:before {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e0) !important;
        }

        .status-text {
            font-size: 0.75rem;
            font-weight: 600;
            text-align: center;
            min-width: 70px;
            padding: 2px 8px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .status-text.active {
            background: linear-gradient(135deg, #c6f6d5, #9ae6b4);
            color: #22543d;
        }

        .status-text.inactive {
            background: linear-gradient(135deg, #fed7d7, #fbb6ce);
            color: #742a2a;
        }

        /* Pagination Controls Styles */
        .pagination-controls {
            background: linear-gradient(135deg, #f8fafc, #edf2f7);
            border-radius: 8px;
            padding: 15px 20px;
            border: 1px solid #e2e8f0;
            margin-bottom: 20px;
        }

        .pagination-controls select {
            border-radius: 6px;
            border: 1px solid #cbd5e0;
            padding: 6px 12px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .pagination-controls select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
        }

        .pagination-info {
            font-size: 0.875rem;
            color: #4a5568;
            font-weight: 500;
            background: linear-gradient(135deg, #ffffff, #f7fafc);
            padding: 8px 16px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .pagination-controls label {
            font-weight: 500;
            color: #4a5568;
            font-size: 0.875rem;
        }

        .pagination-controls span {
            font-size: 0.875rem;
            color: #4a5568;
        }

        /* Custom Pagination Styles */
        .custom-pagination-wrapper {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 15px;
            padding: 10px 0;
        }

        .custom-pagination {
            margin: 0;
        }

        .pagination-list {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 3px;
        }

        .page-item {
            margin: 0;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px 10px;
            margin: 0;
            color: #495057;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
            min-width: 32px;
            height: 32px;
        }

        .page-link:hover {
            color: #495057;
            background-color: #f8f9fa;
            border-color: #6c757d;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .page-item.active .page-link {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
            box-shadow: 0 2px 4px rgba(108,117,125,0.3);
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .page-item.disabled .page-link:hover {
            transform: none;
            box-shadow: none;
        }

        /* Icon styling */
        .page-link i {
            font-size: 10px;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .pagination-list {
                gap: 2px;
            }

            .page-link {
                padding: 5px 8px;
                font-size: 11px;
                min-width: 28px;
                height: 28px;
            }

            .page-link i {
                font-size: 9px;
            }
        }

        /* Search Container Styles */
        .search-container {
            margin-bottom: 24px;
            position: relative;
        }

        .search-box {
            position: relative;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 10px 40px 10px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            background-color: #fff;
            transition: all 0.2s ease;
            outline: none;
        }

        .search-input:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 2px rgba(78, 115, 223, 0.1);
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-size: 14px;
            pointer-events: none;
        }

        .clear-search {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            font-size: 14px;
            cursor: pointer;
            padding: 2px;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .clear-search:hover {
            background-color: #f5f5f5;
            color: #333;
        }

        .search-loading {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #4e73df;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }


    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="iklan-card">
                    <div class="iklan-card-header">
                        <div>
                            <i class="material-icons-round mr-2" style="font-size: 24px; vertical-align: middle;">campaign</i>
                            <span>Iklan</span>
                        </div>
                        <a href="{{ route('iklan.create') }}" class="btn-create">
                            <i class="material-icons-round">add_circle</i>
                            Tambah Iklan Baru
                        </a>
                    </div>
                    <div class="iklan-card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                        <!-- Search Box -->
                        <div class="search-container">
                            <div class="search-box">
                                <input type="text"
                                       id="searchInput"
                                       class="search-input"
                                       placeholder="Cari iklan..."
                                       autocomplete="off">
                                <i class="fas fa-search search-icon" id="searchIcon"></i>
                                <button type="button" class="clear-search" id="clearSearch">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="search-loading" id="searchLoading"></div>
                            </div>
                        </div>

                        <!-- Pagination Controls -->
                        <div class="pagination-controls d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <label for="perPage" class="mr-2 mb-0">Tampilkan:</label>
                                <select id="perPage" class="form-control" style="width: auto; display: inline-block;" onchange="changePerPage()">
                                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                    <option value="10" {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                </select>
                                <span class="ml-2">data per halaman</span>
                            </div>
                            <div class="pagination-info" id="paginationInfo">
                                @if($iklans->total() > 0)
                                    Menampilkan {{ $iklans->firstItem() }} sampai {{ $iklans->lastItem() }} dari {{ $iklans->total() }} data
                                @else
                                    Tidak ada data
                                @endif
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="tabelIklan" class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Status Aktif</th>
                                    <th>Link</th>
                                    <th style="width: 150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @include('admin.iklan.partials.table-rows')
                            </tbody>
                            </table>
                        </div>
                        <!-- Custom Pagination -->
                        <div id="paginationContainer">
                            @if($iklans->hasPages())
                                @include('admin.iklan.partials.pagination')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





@section('script')
<script>
// Anti-spam protection globals
let isProcessing = false;
let pendingRequests = new Map();
let notificationTimeout = null;

// Clear all active notifications
function clearExistingNotifications() {
    toastr.clear();
    if (notificationTimeout) {
        clearTimeout(notificationTimeout);
        notificationTimeout = null;
    }
}

// Show debounced notification
function showNotification(type, message, delay = 300) {
    clearExistingNotifications();

    notificationTimeout = setTimeout(() => {
        if (type === 'success') {
            toastr.success(message);
        } else if (type === 'error') {
            toastr.error(message);
        } else if (type === 'warning') {
            toastr.warning(message);
        }
    }, delay);
}

// Toggle advertisement status with spam protection
function toggleStatus(id, isChecked) {
    // Prevent concurrent processing
    if (isProcessing) {
        const toggle = document.getElementById('statusToggle' + id);
        toggle.checked = !isChecked;
        showNotification('error', 'Mohon tunggu, sedang memproses permintaan sebelumnya...', 100);
        return;
    }

    // Cancel pending request for same ID
    if (pendingRequests.has(id)) {
        const previousRequest = pendingRequests.get(id);
        if (previousRequest && previousRequest.readyState !== 4) {
            previousRequest.abort();
        }
    }

    const toggle = document.getElementById('statusToggle' + id);
    const slider = document.getElementById('slider' + id);
    const statusText = document.getElementById('statusText' + id);

    isProcessing = true;
    clearExistingNotifications();

    // Disable all toggles during request
    const allToggles = document.querySelectorAll('[id^="statusToggle"]');
    const allSliders = document.querySelectorAll('[id^="slider"]');

    allToggles.forEach(t => t.disabled = true);
    allSliders.forEach(s => s.classList.add('disabled'));

    // Execute AJAX request
    const xhr = $.ajax({
        type: 'PATCH',
        url: '/iklan/' + id + '/toggle-status',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'aktif': isChecked ? 1 : 0
        },
        success: function(response) {
            if (response.success) {
                // Update current ad status
                updateStatusDisplay(id, isChecked);

                // Deactivate other ads if this one is activated
                if (isChecked && response.deactivated_ids) {
                    response.deactivated_ids.forEach(function(deactivatedId) {
                        if (deactivatedId != id) {
                            updateStatusDisplay(deactivatedId, false);
                            const deactivatedToggle = document.getElementById('statusToggle' + deactivatedId);
                            if (deactivatedToggle) {
                                deactivatedToggle.checked = false;
                            }
                        }
                    });
                }

                // Show status-appropriate notification
                if (isChecked) {
                    showNotification('success', response.message || 'Iklan berhasil diaktifkan');
                } else {
                    showNotification('error', response.message || 'Iklan berhasil dinonaktifkan');
                }
            }
        },
        error: function(xhr, status, error) {
            // Ignore aborted requests
            if (status !== 'abort') {
                toggle.checked = !isChecked;
                const errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Terjadi kesalahan saat mengubah status';
                showNotification('error', errorMessage);
            }
        },
        complete: function() {
            isProcessing = false;
            pendingRequests.delete(id);

            // Re-enable all toggles
            allToggles.forEach(t => t.disabled = false);
            allSliders.forEach(s => s.classList.remove('disabled'));
        }
    });

    pendingRequests.set(id, xhr);
}

// Update status display elements
function updateStatusDisplay(id, isActive) {
    const statusText = document.getElementById('statusText' + id);
    const toggle = document.getElementById('statusToggle' + id);

    // Update toggle state
    if (toggle) {
        toggle.checked = isActive;
    }

    // Update status text
    if (statusText) {
        if (isActive) {
            statusText.textContent = 'Aktif';
            statusText.className = 'status-text active';
        } else {
            statusText.textContent = 'Tidak Aktif';
            statusText.className = 'status-text inactive';
        }
    }
}

// Reset toggle state after live search updates
function resetToggleState() {
    // Reset processing flag
    isProcessing = false;

    // Clear all pending requests
    pendingRequests.forEach(function(request) {
        if (request && request.readyState !== 4) {
            request.abort();
        }
    });
    pendingRequests.clear();

    // Re-enable all toggles
    const allToggles = document.querySelectorAll('[id^="statusToggle"]');
    const allSliders = document.querySelectorAll('[id^="slider"]');

    allToggles.forEach(t => t.disabled = false);
    allSliders.forEach(s => s.classList.remove('disabled'));

    // Clear any existing notifications
    clearExistingNotifications();
}

// Delete advertisement with confirmation
function deleteIklan(id) {
            const deleteButton = document.getElementById("deleteIklanButton"+id);
            const originalText = deleteButton.innerHTML;

            // Show loading state
            deleteButton.disabled = true;
            deleteButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';

            $.ajax({
                type: 'DELETE',
                url: '/iklan/' + id,
                data: $('#formDeleteIklan' + id).serialize(),
                success: function(response) {
                    // Keep loading animation running
                    // Don't change button state, keep showing loading

                    // Close modal immediately
                    $('#cancelDeleteIklan' + id).click();

                    // Show success notification
                    sessionStorage.setItem('deleteSuccess', 'Iklan berhasil dihapus!');

                    // Check if we're in search mode
                    const searchInput = document.getElementById('searchInput');
                    if (searchInput && searchInput.value.trim() !== '') {
                        // Refresh search results
                        window.performSearch();
                    } else {
                        // Reload page
                        location.reload();
                    }
                },
                error: function(error) {
                    // Reset button to original state only on error
                    deleteButton.innerHTML = originalText;
                    deleteButton.disabled = false;

                    const errorMessage = error.responseJSON ? error.responseJSON.message : 'Terjadi kesalahan';
                    alert('Error: ' + errorMessage);
                }
            });
}

// Change items per page
function changePerPage() {
    const perPage = document.getElementById('perPage').value;
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    url.searchParams.delete('page'); // Reset to first page
    window.location.href = url.toString();
}

// Show success message after page reload
$(document).ready(function() {
    const successMessage = sessionStorage.getItem('deleteSuccess');
    if (successMessage) {
        toastr.success(successMessage);
        sessionStorage.removeItem('deleteSuccess');
    }
});

// Live Search functionality
let searchTimeout;
let searchRequest;

$(document).ready(function() {
    const searchInput = $('#searchInput');
    const clearButton = $('#clearSearch');
    const searchIcon = $('#searchIcon');
    const searchLoading = $('#searchLoading');
    const tableBody = $('#tabelIklan tbody');
    const paginationInfo = $('.pagination-info');
    const paginationWrapper = $('.custom-pagination-wrapper');

    // Live search on input
    searchInput.on('input', function() {
        const query = $(this).val().trim();

        // Show/hide clear button
        if (query.length > 0) {
            clearButton.css('display', 'flex');
            searchIcon.hide();
        } else {
            clearButton.hide();
            searchIcon.show();
        }

        // Clear previous timeout
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        // Cancel previous request
        if (searchRequest && searchRequest.readyState !== 4) {
            searchRequest.abort();
        }

        // Debounce search
        searchTimeout = setTimeout(function() {
            performSearch(query);
        }, 300);
    });

    // Clear search
    clearButton.on('click', function() {
        searchInput.val('');
        clearButton.hide();
        searchIcon.show();
        performSearch('');
    });

    // Perform AJAX search
    window.performSearch = function(query, page = 1) {
        // Show loading indicator
        searchLoading.show();
        searchIcon.hide();
        clearButton.hide();

        searchRequest = $.ajax({
            url: '{{ route("iklan.index") }}',
            type: 'GET',
            data: {
                search: query,
                per_page: $('#perPage').val(),
                page: page,
                ajax: 1
            },
            success: function(response) {
                // Hide loading indicator
                searchLoading.hide();

                // Show appropriate icon/button
                if (query.length > 0) {
                    clearButton.css('display', 'flex');
                } else {
                    searchIcon.show();
                }

                // Update table content
                tableBody.html(response.html);

                // Update pagination info
                paginationInfo.html(response.pagination_info);

                // Update pagination container
                $('#paginationContainer').html(response.pagination_links);

                // Reset toggle status processing state
                resetToggleState();

                // Result updated silently
            },
            error: function(xhr) {
                console.error('Search error:', xhr);
                // Hide loading indicator
                searchLoading.hide();

                // Show appropriate icon/button
                if (searchInput.val().trim().length > 0) {
                    clearButton.css('display', 'flex');
                } else {
                    searchIcon.show();
                }
            }
        });
    }

    // Function to handle pagination clicks
    window.changePage = function(page) {
        const query = searchInput.val().trim();
        performSearch(query, page);
    };
});

// Display session success notifications
@if(session('success'))
    document.addEventListener('DOMContentLoaded', function() {
        toastr.success('{{ session('success') }}');
    });
@endif

// Function to handle pagination clicks from search results
function changePage(page) {
    if (typeof window.changePage === 'function') {
        window.changePage(page);
    } else {
        // Fallback for regular pagination
        const url = new URL(window.location.href);
        url.searchParams.set('page', page);
        window.location.href = url.toString();
    }
}
</script>
@endsection
