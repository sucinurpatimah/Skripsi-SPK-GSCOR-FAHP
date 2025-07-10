@extends('layouts.app')

@section('title', 'Nilai Akhir SCM')
@section('page-title', 'Nilai Akhir SCM')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($hasil->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle mt-3">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Variabel</th>
                        <th class="text-center align-middle">Indikator</th>
                        <th class="text-center">Bobot Prioritas</th>
                        <th class="text-center">Snorm de Boer</th>
                        <th class="text-center">Nilai Akhir SCM</th>
                        <th class="text-center align-middle">Rekomendasi</th>
                        <th class="text-center align-middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $i => $item)
                        @php
                            // Tentukan warna dan status
                            $warnaSnorm = '';
                            $statusSnorm = '';
                            $tampilkanTombol = false;

                            if ($item->snorm >= 80) {
                                $warnaSnorm = 'bg-success text-white';
                                $statusSnorm = 'Bagus, tidak perlu rekomendasi';
                            } elseif ($item->snorm >= 60) {
                                $warnaSnorm = 'bg-warning';
                                $statusSnorm = 'Butuh perhatian';
                                $tampilkanTombol = true;
                            } else {
                                $warnaSnorm = 'bg-danger text-white';
                                $statusSnorm = 'Perlu tindakan segera';
                                $tampilkanTombol = true;
                            }
                        @endphp
                        <tr>
                            <td class="text-center">{{ optional($item->kpi)->variabel ?? '-' }}</td>
                            <td class="text-center">{{ optional($item->kpi)->indikator ?? '-' }}</td>
                            <td class="text-center">{{ number_format($item->bobot_prioritas, 4) }}</td>
                            <td class="text-center {{ $warnaSnorm }}">{{ number_format($item->snorm, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_akhir, 2) }}</td>
                            <td class="text-center">
                                <div class="small mb-1">{{ $statusSnorm }}</div>
                                @if ($item->rekomendasi)
                                    <div class="mt-1">{{ $item->rekomendasi }}</div>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($item->nilai_akhir >= 8 || $item->snorm >= 80)
                                    <span class="text-success">
                                        <i class="fas fa-check-circle"></i> OK
                                    </span>
                                @elseif ($tampilkanTombol)
                                    <button type="button"
                                        class="btn btn-sm btn-primary d-inline-flex align-items-center gap-1 py-1 px-2"
                                        data-bs-toggle="modal" data-bs-target="#modalRekomendasi{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                        <span>Rekomendasi</span>
                                    </button>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>

                        {{-- Modal Tambah/Edit Rekomendasi --}}
                        <div class="modal fade" id="modalRekomendasi{{ $item->id }}" tabindex="-1"
                            aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $item->id }}">Rekomendasi untuk
                                                Indikator</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Indikator</label>
                                                <input type="text" class="form-control"
                                                    value="{{ optional($item->kpi)->indikator ?? '-' }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Rekomendasi</label>
                                                <textarea name="rekomendasi" class="form-control" rows="4">{{ $item->rekomendasi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <tr class="fw-bold table-primary">
                        <td class="text-center" colspan="5">TOTAL NILAI AKHIR SCM</td>
                        <td class="text-center" colspan="2">{{ number_format($total, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-muted mt-4">
            Belum Ada Hasil Perhitungan Nilai Akhir.
        </div>
    @endif

@endsection
