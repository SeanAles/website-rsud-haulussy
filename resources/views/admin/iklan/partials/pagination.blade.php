<div class="custom-pagination-wrapper">
    <nav aria-label="Pagination Navigation">
        <ul class="pagination-list custom-pagination">
            {{-- Previous Page Link --}}
            @if ($iklans->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" onclick="changePage({{ $iklans->currentPage() - 1 }})">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($iklans->getUrlRange(1, $iklans->lastPage()) as $page => $url)
                @if ($page == $iklans->currentPage())
                    <li class="page-item active">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" onclick="changePage({{ $page }})">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($iklans->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" onclick="changePage({{ $iklans->currentPage() + 1 }})">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
</div>
