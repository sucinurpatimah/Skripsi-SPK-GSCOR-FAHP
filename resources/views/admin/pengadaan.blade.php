@extends('layouts.app')

@section('title', 'Kelola Data Pengadaan')
@section('page-title', 'Kelola Data Pengadaan')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus"></i> Tambah Data
        </button>
    </div>

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Bahan Baku</th>
                            <th class="text-center">Pewarna</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPengadaan as $item)
                            <tr>
                                <td class="text-center">{{ number_format($item->bahan_baku, 0, ',', '.') }} Kg</td>
                                <td class="text-center">{{ $item->pewarna ?? '-' }} Kg</td>
                                <td class="text-center">{{ $item->supplier_iso ?? '-' }}</td>
                                <td class="text-center">
                                    {{-- Button Aksi --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('pengadaan.delete', $item->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pengadaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <form action="{{ route('pengadaan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="modalTambahLabel">
                            <i></i> Tambah Data Pengadaan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="bahan_baku" class="form-label">Jumlah Bahan Baku</label>
                                <input type="text" name="bahan_baku" id="bahan_baku" class="form-control"
                                    placeholder="Contoh: 85.700" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pewarna" class="form-label">Jumlah Pewarna</label>
                                <input type="text" name="pewarna" id="pewarna" class="form-control"
                                    placeholder="Contoh: 531" required>
                            </div>
                            <div class="col-md-12">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" name="supplier_iso" id="supplier_iso" class="form-control"
                                    placeholder="Contoh: PT. Sumber Rejeki" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-dark">
                            <i class="fas fa-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Data --}}
    @foreach ($dataPengadaan as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
            aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow">
                    <form action="{{ route('pengadaan.update', $item->id) }}" method="POST">
                        @csrf
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="modalEditLabel{{ $item->id }}">
                                <i></i> Edit Data Pengadaan
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="bahan_baku{{ $item->id }}" class="form-label">Bahan Baku</label>
                                    <input type="text" name="bahan_baku" id="bahan_baku{{ $item->id }}"
                                        class="form-control" value="{{ $item->bahan_baku }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pewarna{{ $item->id }}" class="form-label">Pewarna</label>
                                    <input type="text" name="pewarna" id="pewarna{{ $item->id }}"
                                        class="form-control" value="{{ $item->pewarna }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="supplier_iso{{ $item->id }}" class="form-label">Supplier</label>
                                    <input type="text" name="supplier_iso" id="supplier_iso{{ $item->id }}"
                                        class="form-control" value="{{ $item->supplier_iso }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
