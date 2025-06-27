@extends('layouts.app')

@section('title', 'Kelola Data SCOR')
@section('page-title', 'Kelola Data SCOR')

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
                            <th class="text-center" style="width: 40px;">Opsi</th>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Atribut</th>
                            <th class="text-center">Indikator</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="selected[]">
                            </td>
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
                            <td colspan="4" class="text-center text-muted">Belum ada data perencanaan.</td>
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
                            <i></i> Tambah Data SCOR
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="variabel" class="form-label">Variabel</label>
                                <select name="variabel" id="variabel" class="form-select" required>
                                    <option value="" disabled selected>Pilih Variabel</option>
                                    <option value="plan">Plan (Perencanaan)</option>
                                    <option value="source">Source (Pengadaan)</option>
                                    <option value="make">Make (Produksi)</option>
                                    <option value="distribution">Distribution (Pengiriman)</option>
                                    <option value="return">Return (Pengembalian)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="atribut" class="form-label">Atribut</label>
                                <select name="atribut" id="atribut" class="form-select" required>
                                    <option value="" disabled selected>Pilih Atribut</option>
                                    <option value="reliability">Reliability (Keandalan)</option>
                                    <option value="responsiveness">Responsiveness (Respon Cepat)</option>
                                    <option value="agility">Agility (Kelincahan)</option>
                                    <option value="cost">Cost (Biaya)</option>
                                    <option value="asset_management">Asset Management (Pengelolaan Aset)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="indikator" class="form-label">Indikator</label>
                                <textarea name="indikator" id="indikator" rows="3" class="form-control"
                                    placeholder="Contoh: MPS - Comitment Monthly Order" required></textarea>
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
