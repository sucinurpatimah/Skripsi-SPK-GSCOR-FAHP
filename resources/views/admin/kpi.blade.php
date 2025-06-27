@extends('layouts.app')

@section('title', 'Kelola Data KPI')
@section('page-title', 'Kelola Data KPI')

@section('content')

    <div class="card mt-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Indikator</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        {{-- @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
                        </tr>
                    @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-3 mt-5">
        <a href="#" class="btn btn-dark">
            <i class="fas fa-calculator me-2"></i> Menghitung
        </a>
    </div>

@endsection
