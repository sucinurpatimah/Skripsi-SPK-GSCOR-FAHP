@extends('layouts.app')

@section('title', 'Uji Konsistensi')
@section('page-title', 'Uji Konsistensi')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="d-flex justify-content-center mb-3">
        <form action="{{ route('uji-konsistensi.generate') }}" method="POST"
            onsubmit="return confirm('Generate uji konsistensi?')">
            @csrf
            <button type="submit" class="btn btn-dark">Generate Uji Konsistensi</button>
        </form>
    </div>

    @if ($hasil)
        <div class="mt-4">
            <h4 class="fw-bold text-center mb-3">Hasil Uji Konsistensi</h4>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 50%;">Lambda Max</th>
                            <td class="text-center">{{ number_format($hasil->lambda_max, 2) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Consistency Index (CI)</th>
                            <td class="text-center">{{ number_format($hasil->ci, 2) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Random Index (RI)</th>
                            <td class="text-center">{{ number_format($hasil->ri, 2) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Consistency Ratio (CR)</th>
                            <td class="text-center">{{ number_format($hasil->cr, 2) }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">Status</th>
                            <td class="text-center fw-bold">
                                {{ $hasil->status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tombol Lanjut Normalisasi SNORM de Boer --}}
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('perhitungan.snorm') }}" class="btn btn-dark">
                    Lanjut Normalisasi SNORM de Boer
                </a>
            </div>
        </div>
    @else
        <div class="text-center text-muted mt-4">
            Belum ada perhitungan uji konsistensi. Silakan klik tombol Generate.
        </div>
    @endif

@endsection
