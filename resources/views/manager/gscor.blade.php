@extends('layouts.app')

@section('title', 'Data Green SCOR')
@section('page-title', 'Data Green SCOR')

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
                            <th class="text-center">Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataGscor as $item)
                            <tr>
                                <td class="text-center">{{ $item->variabel }}</td>
                                <td class="text-center" style="width: 150px;">{{ $item->atribut }}</td>
                                <td class="text-center" style="width: 150px;">
                                    {{ $item->indikator }}
                                </td>
                                <td
                                    style="max-width: 300px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                    {{ $item->keterangan }}
                                </td>
                                <td
                                    style="max-width: 300px; white-space: normal; word-wrap: break-word; text-align: justify;">
                                    {{ $item->rekomendasi_bawaan }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data Green SCOR.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
