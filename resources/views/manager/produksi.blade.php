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
                            <th class="text-center">Penggunaan Listrik</th>
                            <th class="text-center">Penggunaan Air</th>
                            <th class="text-center">Hasil Produksi</th>
                            <th class="text-center">Sampah Produksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataProduksi as $item)
                            <tr>
                                <td class="text-center">{{ number_format($item->listrik, 0, ',', '.') }} Kwh</td>
                                <td class="text-center">{{ number_format($item->air, 0, ',', '.') }} M3</td>
                                <td class="text-center">{{ number_format($item->hasil_produksi, 0, ',', '.') }} Kg</td>
                                <td class="text-center">{{ number_format($item->sampah, 0, ',', '.') }} Kg</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data produksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
