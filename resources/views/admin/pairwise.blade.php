@extends('layouts.app')

@section('title', 'Matriks Perbandingan Berpasangan')
@section('page-title', 'Matriks Perbandingan Berpasangan')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Matriks Perbandingan --}}
    <div class="mt-4">
        <h4 class="fw-bold text-center mb-3">Matriks Perbandingan Berpasangan</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="text-center">Indikator</th>
                        @foreach ($labels as $id => $label)
                            <th class="text-center">{{ $label }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($values as $indikatorId => $row)
                        <tr>
                            <th class="text-center bg-dark text-white">{{ $labels[$indikatorId] ?? '-' }}</th>
                            @foreach ($row as $v)
                                <td class="text-center">{{ is_numeric($v) ? number_format($v, 2) : '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                    <tr class="table-secondary fw-bold">
                        <td class="text-center">Total</td>
                        @foreach ($totals as $total)
                            <td class="text-center">{{ number_format($total, 2) }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mb-3 mt-4">
            <form action="{{ route('perhitungan.pairwise.normalisasi') }}" method="POST"
                onsubmit="return confirm('Lakukan normalisasi matriks?')">
                @csrf
                <button type="submit" class="btn btn-dark">
                    Normalisasi Matriks
                </button>
            </form>
        </div>
    </div>

    {{-- Matriks Normalisasi --}}
    @if (!empty($normalized) && count($normalized))
        <div class="mt-5">
            <h4 class="fw-bold text-center mb-3">Hasil Normalisasi Matriks Perbandingan Berpasangan</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center align-middle">Indikator</th>
                            @foreach ($labels as $id => $label)
                                <th class="text-center align-middle">{{ $label }}</th>
                            @endforeach
                            <th class="text-center align-middle">Bobot Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalized as $indikatorId => $row)
                            <tr>
                                <th class="text-center bg-dark text-white">{{ $labels[$indikatorId] ?? '-' }}</th>
                                @foreach ($row as $v)
                                    <td class="text-center">
                                        {{ is_numeric($v) ? number_format($v, 4) : '-' }}
                                    </td>
                                @endforeach
                                <td class="text-center fw-bold">
                                    {{ isset($weights[$indikatorId]) && is_numeric($weights[$indikatorId])
                                        ? number_format($weights[$indikatorId], 4)
                                        : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
