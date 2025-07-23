@extends('layouts.app')

@section('title', 'Data Perencanaan')
@section('page-title', 'Data Perencanaan')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                @php
                    $tahunSebelumnya = null;
                @endphp

                <table class="table table-bordered mb-0">
                    @forelse ($dataPerencanaan as $item)
                        @if ($tahunSebelumnya !== $item->tahun)
                            @if ($tahunSebelumnya !== null)
                                </tbody>
                            @endif
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th colspan="4" class="text-center">
                                        Data Perencanaan Produksi Tambang Tahun {{ $item->tahun }}
                                    </th>
                                </tr>
                                <tr class="table-secondary">
                                    <th class="text-center">Bulan</th>
                                    <th class="text-center">Permintaan</th>
                                    <th class="text-center">Jumlah Pekerja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $tahunSebelumnya = $item->tahun; @endphp
                        @endif
                        <tr>
                            <td class="text-center">{{ $item->bulan }}</td>
                            <td class="text-center">{{ number_format($item->permintaan, 0, ',', '.') }} Kg</td>
                            <td class="text-center">{{ $item->jumlah_pekerja }} Orang</td>
                        </tr>
                    @empty
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data perencanaan.</td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>

            </div>
        </div>
    </div>

@endsection
