@extends('layouts.app')

@section('title', 'Kelola Data Distribusi')
@section('page-title', 'Kelola Data Distribusi')

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
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">Nama Agen</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Produk Dikirim</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataDistribusi as $item)
                            <tr>
                                <td class="text-center">{{ $item->nama_agen }}</td>
                                <td class="text-center">{{ $item->alamat }}</td>
                                <td class="text-center">{{ number_format($item->produk_dikirim, 0, ',', '.') }} Kg</td>
                                <td class="text-center">
                                    {{-- Button Aksi --}}
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('distribusi.delete', $item->id) }}" method="POST"
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
                                <td colspan="5" class="text-center text-muted">Belum ada data distribusi.</td>
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
                <form action="{{ route('distribusi.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="modalTambahLabel">
                            <i></i> Tambah Data Distribusi
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="nama_agen" class="form-label">Nama Agen</label>
                                <input type="text" name="nama_agen" id="nama_agen" class="form-control"
                                    placeholder="Contoh: CV. Sejahtera Abadi" required>
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control"
                                    placeholder="Contoh: Jl. Merdeka No.123, Jakarta" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="produk_dikirim" class="form-label">Produk Dikirim</label>
                                <input type="number" name="produk_dikirim" id="produk_dikirim" class="form-control"
                                    placeholder="Contoh: 2500" min="0" required>
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
    @foreach ($dataDistribusi as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
            aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow">
                    <form action="{{ route('distribusi.update', $item->id) }}" method="POST">
                        @csrf
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="modalEditLabel{{ $item->id }}">
                                <i></i> Edit Data Distribusi
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="nama_agen{{ $item->id }}" class="form-label">Nama Agen</label>
                                    <input type="text" name="nama_agen" id="nama_agen{{ $item->id }}"
                                        class="form-control" value="{{ $item->nama_agen }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="alamat{{ $item->id }}" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat{{ $item->id }}" rows="3" class="form-control" required>{{ $item->alamat }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="produk_dikirim{{ $item->id }}" class="form-label">Produk
                                        Dikirim</label>
                                    <input type="number" name="produk_dikirim" id="produk_dikirim{{ $item->id }}"
                                        class="form-control" value="{{ $item->produk_dikirim }}" required>
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
