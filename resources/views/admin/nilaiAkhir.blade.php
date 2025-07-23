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
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="text-center align-middle">Variabel</th>
                        <th class="text-center align-middle">Indikator</th>
                        <th class="text-center">Bobot Prioritas</th>
                        <th class="text-center">Snorm de Boer</th>
                        <th class="text-center">Nilai Akhir SCM</th>
                        <th class="text-center align-middle">Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $item)
                        @php
                            $warnaSnorm = '';
                            $statusSnorm = '';
                            $rekomendasiBawaan = '-';

                            if ($item->snorm >= 80) {
                                $warnaSnorm = 'bg-success text-white';
                                $statusSnorm = 'Bagus, tidak perlu rekomendasi';
                            } elseif ($item->snorm >= 60) {
                                $warnaSnorm = 'bg-warning';
                                $statusSnorm = 'Butuh perhatian';
                            } else {
                                $warnaSnorm = 'bg-danger text-white';
                                $statusSnorm = 'Perlu tindakan segera';
                            }

                            // Cek apakah KPI dan relasinya ada
                            if ($item->kpi) {
                                if ($item->kpi->scor && $item->kpi->scor->rekomendasi_bawaan) {
                                    $rekomendasiBawaan = $item->kpi->scor->rekomendasi_bawaan;
                                } elseif ($item->kpi->gscor && $item->kpi->gscor->rekomendasi_bawaan) {
                                    $rekomendasiBawaan = $item->kpi->gscor->rekomendasi_bawaan;
                                }
                            }
                        @endphp

                        <tr>
                            <td class="text-center">{{ optional($item->kpi)->variabel ?? '-' }}</td>
                            <td class="text-center">{{ optional($item->kpi)->indikator ?? '-' }}</td>
                            <td class="text-center">{{ number_format($item->bobot_prioritas, 4) }}</td>
                            <td class="text-center {{ $warnaSnorm }}">{{ number_format($item->snorm, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_akhir, 2) }}</td>
                            <td class="text-center" style="width: 250px;">
                                <div class="small mb-1">{{ $statusSnorm }}</div>

                                @if ($item->snorm < 70 && $rekomendasiBawaan !== '-')
                                    <div class="mt-1 text-muted small" style="text-align: justify; font-size: 14px;">
                                        {{ $rekomendasiBawaan }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold table-secondary">
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

    <div class="d-flex justify-content-center mt-4">
        <form action="{{ route('riwayat.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-dark">Selesai</button>
        </form>
    </div>


@endsection
