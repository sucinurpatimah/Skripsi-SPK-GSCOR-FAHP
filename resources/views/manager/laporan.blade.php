@extends('layouts.app')

@section('title', 'Laporan')
@section('page-title', 'Laporan')

@section('content')
    <div class="table-responsive mt-3">
        <table class="table table-bordered text-center align-middle" style="width: 100%;">
            <thead class="table-light">
                <tr>
                    <th style="width: 80%;">Judul</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayats as $riwayat)
                    <tr>
                        <td class="text-center">{{ $riwayat->judul }}</td>
                        <td>
                            <!-- Tombol Detail -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalDetail{{ $riwayat->id }}">
                                Detail
                            </button>
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
                                                <td colspan="2" class="text-muted text-center py-4">
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
