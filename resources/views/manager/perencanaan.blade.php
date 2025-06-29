@extends('layouts.app')

@section('title', 'Data Perencanaan')
@section('page-title', 'Data Perencanaan')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Bulan</th>
                            <th class="text-center">Permintaan (Kg)</th>
                            <th class="text-center">Jumlah Pekerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPerencanaan as $item)
                            <tr>
                                <td class="text-center">{{ $item->tahun }}</td>
                                <td class="text-center">{{ $item->bulan }}</td>
                                <td class="text-center">{{ $item->permintaan }}</td>
                                <td class="text-center">{{ $item->jumlah_pekerja }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
