@extends('layouts.app')

@section('title', 'Data Pengadaan')
@section('page-title', 'Data Pengadaan')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Bahan Baku</th>
                            <th class="text-center">Pewarna</th>
                            <th class="text-center">Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPengadaan as $item)
                            <tr>
                                <td class="text-center">{{ number_format($item->bahan_baku, 0, ',', '.') }} Kg</td>
                                <td class="text-center">{{ $item->pewarna ?? '-' }} Kg</td>
                                <td class="text-center">{{ $item->supplier_iso ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pengadaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
