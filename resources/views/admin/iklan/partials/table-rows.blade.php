@forelse ($iklans as $key => $iklan)
<tr>
    <td>{{ $iklans->firstItem() + $key }}</td>
    <td>{{ $iklan->judul }}</td>
    <td>
        @if($iklan->gambar)
            <img src="{{ asset('visitor/assets/img/iklan/' . $iklan->gambar) }}" alt="{{ $iklan->judul }}" width="100" class="iklan-image">
        @else
            <span class="text-muted">Tidak ada gambar</span>
        @endif
    </td>
    <td>
        @if($iklan->is_permanent)
            <span class="badge badge-info">Permanen</span>
        @else
            {{ \Carbon\Carbon::parse($iklan->tanggal_mulai)->isoFormat('D MMMM YYYY') }}
        @endif
    </td>
    <td>
        @if($iklan->is_permanent)
            <span class="badge badge-info">Permanen</span>
        @else
            {{ \Carbon\Carbon::parse($iklan->tanggal_akhir)->isoFormat('D MMMM YYYY') }}
        @endif
    </td>
    <td>
        <div class="status-toggle-container">
            <label class="status-toggle">
                <input type="checkbox"
                       id="statusToggle{{ $iklan->id }}"
                       {{ $iklan->aktif ? 'checked' : '' }}
                       onchange="toggleStatus({{ $iklan->id }}, this.checked)">
                <span class="toggle-slider" id="slider{{ $iklan->id }}"></span>
            </label>
            <span class="status-text {{ $iklan->aktif ? 'active' : 'inactive' }}" id="statusText{{ $iklan->id }}">
                {{ $iklan->aktif ? 'Aktif' : 'Tidak Aktif' }}
            </span>
        </div>
    </td>
    <td>
        @if($iklan->link)
            <a href="{{ $iklan->link }}" target="_blank" title="{{ $iklan->link }}" class="iklan-link">
                <i class="fas fa-link"></i> Link
            </a>
        @else
            <span class="text-muted">-</span>
        @endif
    </td>
    <td>
        <div class="action-buttons">
            <a href="{{ route('iklan.edit', $iklan->id) }}" class="btn btn-action btn-edit" title="Edit">
                <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-action btn-delete" title="Hapus" data-toggle="modal" data-target="#deleteIklanModal{{ $iklan->id }}">
                <i class="fas fa-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteIklanModal{{ $iklan->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteIklanModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteIklanModalLabel">Hapus Iklan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda ingin menghapus iklan dibawah ini?
                            <p>
                               <strong>{{ $iklan->judul }}</strong>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancelDeleteIklan{{ $iklan->id }}" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <form id="formDeleteIklan{{ $iklan->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button type="button" onclick="deleteIklan({{ $iklan->id }})" class="btn btn-danger" id="deleteIklanButton{{ $iklan->id }}">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center py-4">
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Tidak ada data iklan</h5>
            <p class="text-muted mb-0">Silakan tambah iklan baru atau ubah kata kunci pencarian</p>
        </div>
    </td>
</tr>
@endforelse
