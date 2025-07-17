@extends('layouts.app')

@section('title', 'Riwayat Perhitungan')
@section('page-title', 'Riwayat Perhitungan')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($riwayats as $i => $riwayat)
                        <tr>
                            <td>{{ $riwayat->judul }}</td>
                            <td>
                                <!-- Tombol Detail -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail{{ $riwayat->id }}">
                                    Detail
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada riwayat perhitungan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals --}}
    @foreach ($riwayats as $riwayat)
        <div class="modal fade" id="modalDetail{{ $riwayat->id }}" tabindex="-1"
            aria-labelledby="modalLabel{{ $riwayat->id }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $riwayat->id }}">
                            Detail Laporan: {{ $riwayat->judul }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body" id="laporan{{ $riwayat->id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>Variabel</th>
                                        <th>Atribut</th>
                                        <th>Indikator</th>
                                        <th>Bobot Prioritas</th>
                                        <th>Snorm De Boer</th>
                                        <th>Nilai Akhir SCM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat->hasil_per_indikator as $item)
                                        <tr>
                                            <td class="text-center">{{ $item['variabel'] }}</td>
                                            <td class="text-center">{{ $item['atribut'] }}</td>
                                            <td class="text-center">{{ $item['indikator'] }}</td>
                                            <td class="text-center">{{ $item['bobot_prioritas'] }}</td>
                                            <td class="text-center">{{ $item['snorm_de_boer'] }}</td>
                                            <td class="text-center">{{ $item['nilai_akhir'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr class="table-light fw-bold">
                                        <td class="text-center" colspan="5">Total Nilai Akhir SCM</td>
                                        <td class="text-center">{{ $riwayat->total_nilai_akhir }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <p><strong>Rekomendasi:</strong> {{ $riwayat->rekomendasi }}</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" onclick="printModal('laporan{{ $riwayat->id }}')">
                            Cetak Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
    <script>
        function printModal(id) {
            const content = document.getElementById(id).innerHTML;
            const win = window.open('', '_blank');
            win.document.write(`
            <html>
                <head>
                    <title>Cetak Laporan</title>
                    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
                </head>
                <body onload="window.print(); window.close();">
                    ${content}
                </body>
            </html>
        `);
            win.document.close();
        }
    </script>
@endpush
