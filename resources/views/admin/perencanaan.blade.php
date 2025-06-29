@extends('layouts.app')

@section('title', 'Kelola Data Perencanaan')
@section('page-title', 'Kelola Data Perencanaan')

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
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Permintaan (Kg)</th>
                            <th class="text-center">Jumlah Pekerja</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPerencanaan as $item)
                            <tr>
                                <td class="text-center">{{ $item->tahun }}</td>
                                <td class="text-center">{{ $item->bulan }}</td>
                                <td class="text-center">{{ number_format($item->permintaan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $item->jumlah_pekerja }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('perencanaan.delete', $item->id) }}" method="POST"
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
                                <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
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
                <form action="{{ route('perencanaan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="modalTambahLabel">
                            <i></i> Tambah Data Perencanaan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control"
                                    placeholder="Contoh: 2025" required>
                            </div>
                            <div class="col-md-6">
                                <label for="bulan" class="form-label">Bulan</label>
                                <select name="bulan" id="bulan" class="form-select" required>
                                    <option value="" disabled selected>Pilih Bulan</option>
                                    @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="permintaan" class="form-label">Permintaan (Kg)</label>
                                <input type="number" name="permintaan" id="permintaan" class="form-control"
                                    placeholder="Contoh: 5000" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jumlah_pekerja" class="form-label">Jumlah Pekerja</label>
                                <input type="number" name="jumlah_pekerja" id="jumlah_pekerja" class="form-control"
                                    placeholder="Contoh: 10" required>
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
    @foreach ($dataPerencanaan as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
            aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow">
                    <form action="{{ route('perencanaan.update', $item->id) }}" method="POST">
                        @csrf
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="modalEditLabel{{ $item->id }}">
                                <i></i> Edit Data Perencanaan
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="tahun{{ $item->id }}" class="form-label">Tahun</label>
                                    <input type="number" name="tahun" id="tahun{{ $item->id }}"
                                        class="form-control" value="{{ $item->tahun }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="bulan{{ $item->id }}" class="form-label">Bulan</label>
                                    <select name="bulan" id="bulan{{ $item->id }}" class="form-select" required>
                                        <option value="" disabled>Pilih Bulan</option>
                                        @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                            <option value="{{ $bulan }}"
                                                {{ $item->bulan == $bulan ? 'selected' : '' }}>{{ $bulan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="permintaan{{ $item->id }}" class="form-label">Permintaan (Kg)</label>
                                    <input type="number" name="permintaan" id="permintaan{{ $item->id }}"
                                        class="form-control" value="{{ $item->permintaan }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_pekerja{{ $item->id }}" class="form-label">Jumlah
                                        Pekerja</label>
                                    <input type="number" name="jumlah_pekerja" id="jumlah_pekerja{{ $item->id }}"
                                        class="form-control" value="{{ $item->jumlah_pekerja }}" required>
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
