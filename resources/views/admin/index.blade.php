@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')


    {{-- Grafik  --}}
    <div class="card mt-4 mb-4">
        <div class="card-header bg-dark text-white fw-bold">
            <i class="fas fa-chart-area me-1"></i>
            Diagram Hasil Perhitungan Pengukuran Kinerja
        </div>
        <div class="card-body text-center">

            @if ($hasil->isEmpty())
                <div class="py-5">
                    <em class="text-muted text-center">
                        Belum Ada Hasil Pengukuran Kinerja Rantai Pasok.
                    </em>
                </div>
            @else
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
            @endif

        </div>
    </div>

    {{-- Tabel Rekomendasi Perbaikan --}}
    <div class="card mb-4 shadow">
        <div class="card-header bg-dark text-white fw-bold">
            <i class="fas fa-tools me-2"></i> Rekomendasi Perbaikan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 60px;">NO.</th>
                            <th style="width: 40%;">Indikator Kinerja</th>
                            <th>Rekomendasi Perbaikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp

                        @forelse ($rekomendasi as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td class="text-start">{{ $item['indikator'] }}</td>
                                <td class="text-start" style="text-align: justify;">{{ $item['rekomendasi'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-muted text-center py-4">
                                    <em>Belum Ada Rekomendasi Perbaikan Kinerja Rantai Pasok.
                                        <br>Silahkan Lakukan Perhitungan Kinerja Rantai Pasok Terlebih Dahulu.</em>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @if (!$hasil->isEmpty())
        <script>
            const labels = @json($labelsSingkat);
            const dataNilaiAkhir = @json($hasil->pluck('nilai_akhir'));

            const ctx = document.getElementById('myAreaChart').getContext('2d');
            const myAreaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nilai Akhir Kinerja Rantai Pasok per-Indikator',
                        data: dataNilaiAkhir,
                        fill: false,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10
                        }
                    }
                }
            });
        </script>
    @endif

@endsection
