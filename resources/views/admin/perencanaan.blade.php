@extends('layouts.app')

@section('title', 'Kelola Data Perencanaan')
@section('page-title', 'Kelola Data Perencanaan')

@section('content')

    <div class="d-flex justify-content-end mb-3">
        <a href="#" class="btn btn-dark">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

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
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                {{-- Button Aksi --}}
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        {{-- @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data perencanaan.</td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
