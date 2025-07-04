@extends('layouts.app')

@section('title', 'Matriks Perbandingan Berpasangan')
@section('page-title', 'Matriks Perbandingan Berpasangan')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- <div class="card mt-4">
        <div class="card-body table-responsive">
            <h4 class="fw-bold text-center mb-3">Matriks Perbandingan Berpasangan</h4> --}}
    <table class="table table-bordered mt-4">
        <thead class="table-light">
            <tr>
                <th class="text-center align-middle">Indikator</th>
                @foreach ($labels as $label)
                    <th class="text-center">{{ $label }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($values as $i => $row)
                <tr>
                    <th class="text-center">{{ array_values($labels)[$i] }}</th>
                    @foreach ($row as $nilai)
                        <td class="text-center">{{ is_numeric($nilai) ? number_format($nilai, 2) : '-' }}</td>
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
    {{-- </div>
    </div> --}}

    <div class="d-flex justify-content-center mb-3 mt-4">
        <form action="{{ route('perhitungan.pairwise.normalisasi') }}" method="POST"
            onsubmit="return confirm('Lakukan normalisasi matriks?')">
            @csrf
            <button type="submit" class="btn btn-dark">
                <i></i> Normalisasi Matriks
            </button>
        </form>
    </div>

    @if (isset($normalized))
        <div class="mt-5">
            <h4 class="fw-bold text-center mb-3">Normalisasi Matriks Perbandingan Berpasangan</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Indikator</th>
                            @foreach ($labels as $label)
                                <th class="text-center">{{ $label }}</th>
                            @endforeach
                            <th class="text-center">Bobot Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalized as $i => $row)
                            <tr>
                                <th class="text-center">{{ array_values($labels)[$i] }}</th>
                                @foreach ($row as $v)
                                    <td class="text-center">{{ number_format($v, 4) }}</td>
                                @endforeach
                                <td class="text-center fw-bold">{{ number_format($weights[$i], 4) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
