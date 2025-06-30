@extends('layouts.app')

@section('title', 'Kelola Data Produksi')
@section('page-title', 'Kelola Data Produksi')

@section('content')

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
                            <th class="text-center">Listrik</th>
                            <th class="text-center">Air</th>
                            <th class="text-center">Hasil Produksi</th>
                            <th class="text-center">Sampah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataProduksi as $item)
                            <tr>
                                <td class="text-center">{{ number_format($item->listrik, 0, ',', '.') }} Kwh</td>
                                <td class="text-center">{{ number_format($item->air, 0, ',', '.') }} M3</td>
                                <td class="text-center">{{ number_format($item->hasil_produksi, 0, ',', '.') }} Kg</td>
                                <td class="text-center">{{ number_format($item->sampah, 0, ',', '.') }} Kg</td>
                                <td class="text-center">
                                    {{-- Button Aksi --}}
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data produksi.</td>
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
                <form action="{{ route('produksi.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="modalTambahLabel">
                            <i></i> Tambah Data Produksi
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="listrik" class="form-label">Listrik</label>
                                <input type="number" name="listrik" id="listrik" class="form-control"
                                    placeholder="Contoh: 1500" min="0" required>
                            </div>
                            <div class="col-md-6">
                                <label for="air" class="form-label">Air</label>
                                <input type="number" name="air" id="air" class="form-control"
                                    placeholder="Contoh: 20" min="0" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hasil_produksi" class="form-label">Hasil Produksi</label>
                                <input type="number" name="hasil_produksi" id="hasil_produksi" class="form-control"
                                    placeholder="Contoh: 5000" min="0" required>
                            </div>
                            <div class="col-md-6">
                                <label for="sampah" class="form-label">Sampah</label>
                                <input type="number" name="sampah" id="sampah" class="form-control"
                                    placeholder="Contoh: 50" min="0" required>
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


@endsection
