@extends('layouts.app')

@section('title', 'Normalisasi Snorm De Boer')
@section('page-title', 'Normalisasi Snorm De Boer')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-center mb-3 mt-3">
        <form action="{{ route('snorm.generate') }}" method="POST"
            onsubmit="return confirm('Generate Normalisasi Snorm De Boer?')">
            @csrf
            <button type="submit" class="btn btn-dark">Generate Perhitungan</button>
        </form>
    </div>

    @if ($hasil->isNotEmpty())
        <div class="mt-4">
            <h4 class="fw-bold text-center mb-3">Tabel Nilai Kinerja dan Snorm De Boer</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Atribut</th>
                            <th class="text-center">Indikator</th>
                            <th class="text-center">Nilai Kinerja</th>
                            <th class="text-center">Snorm De Boer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $row)
                            <tr>
                                <td class="text-center">{{ $row->kpi->variabel ?? '-' }}</td>
                                <td class="text-center">{{ $row->kpi->atribut ?? '-' }}</td>
                                <td class="text-center">{{ $row->kpi->indikator ?? '-' }}</td>
                                <td class="text-center">{{ number_format($row->nilai_kinerja, 3) }}</td>
                                <td class="text-center">{{ number_format($row->snorm_de_boer, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tombol Lanjut Perhitungan Nilai Akhir SCM --}}
            <div class="d-flex justify-content-center mt-4">
                <form action="{{ route('nilai-akhir-scm.generate') }}" method="POST"
                    onsubmit="return confirm('Generate Nilai Akhir SCM?')">
                    @csrf
                    <button type="submit" class="btn btn-dark">
                        Lanjut Perhitungan Nilai Akhir SCM
                    </button>
                </form>
            </div>
        </div>
    @else
        <div class="text-center text-muted mt-4">
            Belum ada hasil perhitungan. Silakan lakukan generate perhitungan terlebih dahulu.
        </div>
    @endif

@endsection
