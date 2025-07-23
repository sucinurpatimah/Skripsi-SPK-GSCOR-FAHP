@extends('layouts.app')

@section('title', 'Riwayat Perhitungan')
@section('page-title', 'Riwayat Perhitungan')

@section('content')
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Judul</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayats as $riwayat)
                        <tr>
                            <td>{{ $riwayat->judul }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail{{ $riwayat->id }}">
                                    <i class="bi bi-info-circle-fill"></i> Detail
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">Belum ada riwayat perhitungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals --}}
    @foreach ($riwayats as $riwayat)
        <div class="modal fade" id="modalDetail{{ $riwayat->id }}" tabindex="-1"
            aria-labelledby="modalLabel{{ $riwayat->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $riwayat->id }}">
                            Detail Laporan: {{ $riwayat->judul }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body" id="laporan{{ $riwayat->id }}">
                        <!-- TABEL UTAMA -->
                        <h5 class="text-center mt-2 mb-4">
                            Laporan Pengukuran Kinerja Rantai Pasok Proses Produksi Tambang PT. Arteria Daya Mulia
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th class="text-center">Variabel</th>
                                        <th class="text-center">Atribut</th>
                                        <th class="text-center">Indikator</th>
                                        <th class="text-center">Bobot Prioritas</th>
                                        <th class="text-center">Snorm De Boer</th>
                                        <th class="text-center">Nilai Akhir SCM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat->hasil_per_indikator as $item)
                                        <tr>
                                            <td class="text-center">{{ $item['variabel'] }}</td>
                                            <td class="text-center">{{ $item['atribut'] }}</td>
                                            <td class="text-center">{{ $item['indikator'] }}</td>
                                            <td class="text-center">{{ $item['bobot_prioritas'] }}</td>
                                            <td class="text-center">{{ $item['snorm_de_boer'] }}</td>
                                            <td class="text-center">{{ $item['nilai_akhir'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-light fw-bold">
                                        <td class="text-center" colspan="5">Total Nilai Akhir SCM</td>
                                        <td class="text-center">{{ $riwayat->total_nilai_akhir }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- REKOMENDASI UMUM -->
                        <div class="mt-2">
                            <p><strong>Rekomendasi:</strong> {{ $riwayat->rekomendasi }} Lakukan Perbaikan Untuk Indikator
                                Dibawah Ini.</p>
                        </div>

                        <!-- TABEL REKOMENDASI PERBAIKAN PER INDIKATOR -->
                        <div class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th style="width: 40%;">Indikator Kinerja</th>
                                            <th>Rekomendasi Perbaikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($riwayat->rekomendasi_indikator ?? [] as $item)
                                            <tr>
                                                <td class="text-start">{{ $item['indikator'] }}</td>
                                                <td class="text-start" style="text-align: justify;">
                                                    {{ $item['rekomendasi'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-muted text-center py-4">
                                                    <em>Tidak ada indikator dengan nilai akhir di bawah 70.</em>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="{{ route('riwayat.cetak', $riwayat->id) }}" class="btn btn-dark" target="_blank">
                            Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
