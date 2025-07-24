@extends('layouts.app')

@section('title', 'Kelola Data SCOR')
@section('page-title', 'Kelola Data SCOR')

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

    {{-- Form PENGIRIMAN DATA TERPILIH KE KPI --}}
    <form id="pilihForm" action="{{ route('kpi.storeSelected') }}" method="POST">
        @csrf
        <div class="card mt-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="text-center" style="width: 40px;">No</th>
                                <th class="text-center" style="width: 40px;">Pilih</th>
                                <th class="text-center">Variabel</th>
                                <th class="text-center">Atribut</th>
                                <th class="text-center">Indikator</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Rekomendasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataScor as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="selected[]" value="{{ $item->id }}">
                                        <input type="hidden" name="kategori[{{ $item->id }}]" value="SCOR">
                                    </td>
                                    <td class="text-center">{{ $item->variabel }}</td>
                                    <td class="text-center" style="width: 100px;">{{ $item->atribut }}</td>
                                    <td class="text-center" style="width: 100px;">{{ $item->indikator }}</td>
                                    <td
                                        style="max-width: 200px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td
                                        style="max-width: 200px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                        {{ $item->rekomendasi_bawaan }}
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault(); if(confirm('Yakin ingin menghapus data ini?')) document.getElementById('delete-form-{{ $item->id }}').submit();">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data SCOR.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-3 mb-4">
            <button type="submit" class="btn btn-dark">Pilih</button>
        </div>
    </form>

    {{-- Form DELETE tersembunyi --}}
    @foreach ($dataScor as $item)
        <form id="delete-form-{{ $item->id }}" action="{{ route('scor.delete', $item->id) }}" method="POST"
            style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <form action="{{ route('scor.store') }}" method="POST">
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
                                    <option value="Plan">Plan (Perencanaan)</option>
                                    <option value="Source">Source (Pengadaan)</option>
                                    <option value="Make">Make (Produksi)</option>
                                    <option value="Deliver">Deliver (Pengiriman)</option>
                                    <option value="Return">Return (Pengembalian)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="atribut" class="form-label">Atribut</label>
                                <select name="atribut" id="atribut" class="form-select" required>
                                    <option value="" disabled selected>Pilih Atribut</option>
                                    <option value="Reliability">Reliability (Keandalan)</option>
                                    <option value="Responsiveness">Responsiveness (Respon Cepat)</option>
                                    <option value="Agility">Agility (Kelincahan)</option>
                                    <option value="Sustainability">Sustainability (Keberlanjutan)</option>
                                    <option value="Cost">Cost (Biaya)</option>
                                    <option value="Asset Management">Asset Management (Pengelolaan Aset)</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="indikator" class="form-label">Indikator</label>
                                <textarea name="indikator" id="indikator" rows="3" class="form-control"
                                    placeholder="Contoh: MPS - Comitment Monthly Order" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control"
                                    placeholder="Tulis Keterangan Disini" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="rekomendasi_bawaan" class="form-label">Rekomendasi</label>
                                <textarea name="rekomendasi_bawaan" id="rekomendasi_bawaan" rows="3" class="form-control"
                                    placeholder="Tulis Rekomendasi Disini" required></textarea>
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
    @foreach ($dataScor as $item)
        <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1"
            aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow">
                    <form action="{{ route('scor.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header bg-dark text-white">
                            <h5 class="modal-title" id="modalEditLabel{{ $item->id }}">
                                <i></i> Edit Data SCOR
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="variabel{{ $item->id }}" class="form-label">Variabel</label>
                                    <select name="variabel" id="variabel{{ $item->id }}" class="form-select"
                                        required>
                                        <option value="" disabled>Pilih Variabel</option>
                                        <option value="Plan" {{ $item->variabel == 'Plan' ? 'selected' : '' }}>Plan
                                            (Perencanaan)
                                        </option>
                                        <option value="Source" {{ $item->variabel == 'Source' ? 'selected' : '' }}>Source
                                            (Pengadaan)</option>
                                        <option value="Make" {{ $item->variabel == 'Make' ? 'selected' : '' }}>Make
                                            (Produksi)</option>
                                        <option value="Deliver" {{ $item->variabel == 'Deliver' ? 'selected' : '' }}>
                                            Deliver
                                            (Pengiriman)</option>
                                        <option value="Return" {{ $item->variabel == 'Return' ? 'selected' : '' }}>Return
                                            (Pengembalian)</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="atribut{{ $item->id }}" class="form-label">Atribut</label>
                                    <select name="atribut" id="atribut{{ $item->id }}" class="form-select" required>
                                        <option value="" disabled>Pilih Atribut</option>
                                        <option value="Reliability"
                                            {{ $item->atribut == 'Reliability' ? 'selected' : '' }}>Reliability (Keandalan)
                                        </option>
                                        <option value="Responsiveness"
                                            {{ $item->atribut == 'Responsiveness' ? 'selected' : '' }}>Responsiveness
                                            (Respon Cepat)</option>
                                        <option value="Agility" {{ $item->atribut == 'Agility' ? 'selected' : '' }}>
                                            Agility (Kelincahan)</option>
                                        <option value="Sustainability"
                                            {{ $item->atribut == 'Sustainability' ? 'selected' : '' }}>Sustainability
                                            (Keberlanjutan)</option>
                                        <option value="Cost" {{ $item->atribut == 'Cost' ? 'selected' : '' }}>Cost
                                            (Biaya)</option>
                                        <option value="Asset Management"
                                            {{ $item->atribut == 'Asset Management' ? 'selected' : '' }}>Asset Management
                                            (Pengelolaan Aset)</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="indikator{{ $item->id }}" class="form-label">Indikator</label>
                                    <textarea name="indikator" id="indikator{{ $item->id }}" rows="3" class="form-control" required>{{ $item->indikator }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="keterangan{{ $item->id }}" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan{{ $item->id }}" rows="3" class="form-control" required>{{ $item->keterangan }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="rekomendasi_bawaan{{ $item->id }}"
                                        class="form-label">Rekomendasi</label>
                                    <textarea name="rekomendasi_bawaan" id="rekomendasi_bawaan{{ $item->id }}" rows="3" class="form-control"
                                        required>{{ $item->rekomendasi_bawaan }}</textarea>
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
