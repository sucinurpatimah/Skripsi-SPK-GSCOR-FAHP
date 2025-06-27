@extends('layouts.app')

@section('title', 'Kelola Data Green SCOR')
@section('page-title', 'Kelola Data Green SCOR')

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
                            <th class="text-center" style="width: 40px;">Opsi</th>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Indikator</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="selected[]">
                            </td>
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
                        <td colspan="4" class="text-center text-muted">Belum ada data perencanaan.</td>
                    </tr>
                    @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
