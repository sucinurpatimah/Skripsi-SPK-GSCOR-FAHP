@extends('layouts.app')

@section('title', 'Data SCOR')
@section('page-title', 'Data SCOR')

@section('content')

    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Variabel</th>
                            <th class="text-center">Atribut</th>
                            <th class="text-center">Indikator</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($dataPerencanaan as $item) --}}
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada indikator scor.</td>
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
