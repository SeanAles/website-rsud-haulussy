@extends('admin.layout.main')

@section('title', 'Kelola Kategori')

@section('link')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
        /* DataTables search styling */
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }
        .dataTables_wrapper .dataTables_filter label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: #4a5568;
        }
        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0;
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            outline: none;
            transition: all 0.2s;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #4299e1;
            box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.25);
        }
        .dataTables_wrapper .dataTables_filter i {
            color: #4299e1;
        }
        
        /* Category list styling - same as article */
        .category-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            border: none;
        }

        .category-card-header {
            background: linear-gradient(to right, #4299e1, #7f9cf5);
            color: white;
            padding: 18px 25px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .category-card-body {
            padding: 25px;
            background-color: #fff;
        }

        .category-stats {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3182ce;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #718096;
            margin-top: 5px;
        }

        /* Button styling */
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

        /* Action button styling */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
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

        .btn-view {
            background-color: #edf2f7;
            color: #3182ce;
            border: 1px solid #e2e8f0;
        }

        .btn-view:hover {
            background-color: #e6f0ff;
            color: #2b6cb0;
            border-color: #bee3f8;
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
        
        /* Icon preview styling */
        .icon-preview {
            width: 40px;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="category-card">
                    <div class="category-card-header">
                        <div>
                            <i class="fas fa-tags mr-2" style="font-size: 24px; vertical-align: middle;"></i>
                            <span>Manajemen Kategori</span>
                        </div>
                        <a href="{{ route('categories.create') }}" class="btn-create">
                            <i class="fas fa-plus"></i>
                            Buat Kategori Baru
                        </a>
                    </div>
                    <div class="category-card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- Quick Stats -->
                        <div class="category-stats mb-4">
                            <div class="stat-item">
                                <div class="stat-value" id="totalCategories">0</div>
                                <div class="stat-label">Total Kategori</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value" id="activeCategories">0</div>
                                <div class="stat-label">Kategori Aktif</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value" id="totalArticlesInCategories">0</div>
                                <div class="stat-label">Total Artikel</div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="categoriesTable" class="table category-table data-table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="8%">Icon</th>
                                        <th width="25%">Nama Kategori</th>
                                        <th width="10%">Warna</th>
                                        <th width="12%">Status</th>
                                        <th width="10%">Urutan</th>
                                        <th width="10%">Artikel</th>
                                        <th width="20%" class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data akan dimuat via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <script>
        // Initialize DataTable
        var table = $('.data-table').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row mt-3'<'col-sm-5'i><'col-sm-7'p>>",
            language: {
                "lengthMenu": "Tampilkan _MENU_ data",
                "search": "<i class='fas fa-search'></i> Cari:",
                'info': 'Menampilkan _START_ hingga _END_ dari _TOTAL_ data',
                'infoEmpty': 'Tidak ada data',
                "infoFiltered": "",
                "processing": "<div class='d-flex justify-content-center'><div class='spinner-border text-primary' role='status'></div></div>",
                "emptyTable": "<div class='empty-state'><i class='fas fa-tags fa-3x mb-3'></i><h4>Belum Ada Kategori</h4><p>Kategori yang Anda buat akan muncul di sini</p></div>",
                "zeroRecords": "<div class='empty-state'><i class='fas fa-search fa-3x mb-3'></i><h4>Tidak Ada Hasil</h4></div>",
                'paginate': {
                    'previous': '<i class="fas fa-chevron-left"></i>',
                    'next': '<i class="fas fa-chevron-right"></i>'
                }
            },
            order: [[5, "asc"]], // Order by sort_order
            columnDefs: [{
                targets: [0],
                orderable: false,
                searchable: false
            }],
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('categories.index') }}",
                dataSrc: function(json) {
                    // Update stats
                    updateStats(json);
                    return json.data;
                }
            },
            columns: [
                {data: 'DT_RowIndex', 'orderable': false, 'searchable': false},
                {data: 'icon_preview', name: 'icon_preview', orderable: false, searchable: false, className: 'icon-preview'},
                {data: 'name', name: 'name', render: function(data, type, row) {
                    return '<span class="fw-bold">' + data + '</span>';
                }},
                {data: 'color_preview', name: 'color_preview', orderable: false, searchable: false},
                {data: 'status', name: 'is_active'},
                {data: 'sort_order', name: 'sort_order'},
                {data: 'posts_count', name: 'posts_count', orderable: false, searchable: false},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            drawCallback: function() {
                // Apply styles to action buttons after table draw
                styleActionButtons();
            }
        });

        // Update stats based on data
        function updateStats(json) {
            try {
                // Update total categories
                const totalCategories = json.recordsTotal || 0;
                $('#totalCategories').text(totalCategories);

                // Get additional stats
                $.ajax({
                    url: "{{ route('categories.index') }}",
                    method: 'GET',
                    data: { get_stats: true },
                    success: function(statsData) {
                        if (statsData) {
                            $('#activeCategories').text(statsData.active_count || 0);
                            $('#totalArticlesInCategories').text(statsData.total_articles || 0);
                        }
                    },
                    error: function() {
                        $('#activeCategories').text('0');
                        $('#totalArticlesInCategories').text('0');
                    }
                });
            } catch (error) {
                console.error('Error updating stats:', error);
                $('#totalCategories').text('0');
                $('#activeCategories').text('0'); 
                $('#totalArticlesInCategories').text('0');
            }
        }

        // Style action buttons
        function styleActionButtons() {
            // Style view buttons
            $('.btn-primary').addClass('btn-action btn-view').removeClass('btn-primary btn-sm');
            $('.btn-view').html('<i class="fas fa-eye"></i>').attr('title', 'Lihat Detail');

            // Style edit buttons  
            $('.btn-success').addClass('btn-action btn-edit').removeClass('btn-success btn-sm');
            $('.btn-edit').html('<i class="fas fa-edit"></i>').attr('title', 'Edit Kategori');

            // Style delete buttons
            $('.btn-danger').addClass('btn-action btn-delete').removeClass('btn-danger btn-sm');
            $('.btn-delete').html('<i class="fas fa-trash-alt"></i>').attr('title', 'Hapus Kategori');
        }

        // Auto refresh alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@endsection