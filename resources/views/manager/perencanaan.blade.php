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
                    @php
                        $grouped = $dataPerencanaan->groupBy('tahun');
                    @endphp

                    @forelse ($grouped as $tahun => $items)
                        <thead class="table-light">
                            <tr>
                                <th colspan="5" class="text-center bg-dark text-white">
                                    Data Perencanaan Produksi Tambang Tahun {{ $tahun }}
                                </th>

                            </tr>
                            <tr class="table-secondary">
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Permintaan</th>
                                <th class="text-center">Jumlah Pekerja</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $item->bulan }}</td>
                                    <td class="text-center">{{ number_format($item->permintaan, 0, ',', '.') }} Kg</td>
                                    <td class="text-center">{{ $item->jumlah_pekerja }} Orang</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEdit{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('perencanaan.delete', $item->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @empty
                        <thead class="table-light">
                            <tr>
                                <th colspan="5" class="text-center">Data Perencanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
                            </tr>
                        </tbody>
                    @endforelse
                </table>

            </div>
        </div>
    </div>

@endsection
