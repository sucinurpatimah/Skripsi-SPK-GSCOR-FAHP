@extends('layouts.app')

@section('title', 'Data Pengembalian')
@section('page-title', 'Data Pengembalian')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">Nama Agen</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Produk Dikembalikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPengembalian as $item)
                            <tr>
                                <td class="text-center">{{ $item->nama_agen }}</td>
                                <td class="text-center">{{ $item->alamat }}</td>
                                <td class="text-center">{{ number_format($item->produk_dikembalikan, 2, ',', '.') }} Kg</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data pengembalian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
