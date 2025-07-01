@extends('layouts.app')

@section('title', 'Kelola Data KPI')
@section('page-title', 'Kelola Data KPI')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Atribut</th>
                            <th class="text-center">Indikator</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Aksi</th>
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
                                <td class="text-center">
                                    <form action="{{ route('kpi.delete', $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
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

    {{-- <div class="d-flex justify-content-center mb-3 mt-5">
        <a href="#" class="btn btn-dark">
            <i class="fas fa-calculator me-2"></i> Menghitung
        </a>
    </div> --}}

@endsection
