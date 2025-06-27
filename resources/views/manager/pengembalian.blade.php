@extends('layouts.app')

@section('title', 'Data Pengembalian')
@section('page-title', 'Data Pengembalian')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Nama Agen</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Produk Dikembalikan (Kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data pengembalian.</td>
                            {{-- <td></td>
                    <td></td>
                    <td></td> --}}
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
