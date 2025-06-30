@extends('layouts.app')

@section('title', 'Data Distribusi')
@section('page-title', 'Data Distribusi')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Nama Agen</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Produk Dikirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataDistribusi as $item)
                            <tr>
                                <td class="text-center">{{ $item->nama_agen }}</td>
                                <td class="text-center">{{ $item->alamat }}</td>
                                <td class="text-center">{{ number_format($item->produk_dikirim, 0, ',', '.') }} Kg</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data distribusi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
