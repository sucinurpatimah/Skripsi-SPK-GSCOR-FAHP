@extends('layouts.app')

@section('title', 'Kelola Data Pengadaan')
@section('page-title', 'Kelola Data Pengadaan')

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
                            <th class="text-center">Bahan Baku</th>
                            <th class="text-center">Pewarna</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
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
                        {{-- @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
                        </tr>
                    @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <form action="" method="">
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
                                <label for="bahan_baku" class="form-label">Bahan Baku</label>
                                <input type="text" name="bahan_baku" id="bahan_baku" class="form-control"
                                    placeholder="Contoh: LLDPE" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pewarna" class="form-label">Pewarna</label>
                                <input type="text" name="pewarna" id="pewarna" class="form-control"
                                    placeholder="Contoh: Merah" required>
                            </div>
                            <div class="col-md-12">
                                <label for="supplier" class="form-label">Supplier</label>
                                <input type="text" name="supplier" id="supplier" class="form-control"
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

@endsection
