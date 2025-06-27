@extends('layouts.app')

@section('title', 'Data Produksi')
@section('page-title', 'Data Produksi')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Listrik (Kwh)</th>
                            <th class="text-center">Air (M3)</th>
                            <th class="text-center">Hasil Produksi (Kg)</th>
                            <th class="text-center">Sampah (Kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data produksi.</td>
                            {{-- <td></td>
                        <td></td>
                        <td></td>
                        <td></td> --}}
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

@endsection
