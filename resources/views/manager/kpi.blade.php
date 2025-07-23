@extends('layouts.app')

@section('title', 'Data KPI')
@section('page-title', 'Data KPI')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Atribut</th>
                            <th class="text-center">Indikator</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKPI as $item)
                            <tr>
                                <td class="text-center">{{ $item->variabel }}</td>
                                <td class="text-center">{{ $item->atribut }}</td>
                                <td class="text-center" style="width: 250px;">{{ $item->indikator }}</td>
                                <td
                                    style="max-width: 300px; text-align: justify; white-space: normal; word-wrap: break-word;">
                                    {{ $item->keterangan }}
                                </td>
                                <td class="text-center">{{ $item->kategori }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data KPI.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
