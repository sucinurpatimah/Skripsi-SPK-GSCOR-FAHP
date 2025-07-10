@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')


    {{-- Grafik  --}}
    <div class="card mt-4 mb-4">
        <div class="card-header"><i class="fas fa-chart-area me-1"></i>Nilai Akhir SCM</div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
    </div>

    {{-- Tabel Rekomendasi Perbaikan --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Rekomendasi Perbaikan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Indikator Kinerja</th>
                        <th>Permasalahan</th>
                        <th>Rekomendasi Perbaikan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO.</th>
                        <th>Indikator Kinerja</th>
                        <th>Permasalahan</th>
                        <th>Rekomendasi Perbaikan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Timely Delivery Performance by Supplier</td>
                        <td>Pengiriman bahan baku dari supplier terkadang masih belum sesuai dengan waktu yang ditentukan.
                            CV. Sekar Langgeng memberikan batas waktu sampai dengan 10 hari lamanya.</td>
                        <td>Perusahaan sebaiknya melakukan konfirmasi kepada pihak supplier apakah bahan baku sudah ada
                            untuk jumlah pesanan yang banyak sehingga nantinya tidak terjadi keterlambatan pengiriman bahan
                            baku.</td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td>Adherence to Production Schedule</td>
                        <td>Kurangnya komunikasi antara supplier dan perusahaan, mengakibatkan keterlambatan pengiriman
                            bahan baku. Waktu pengiriman bahan baku yang diharapkan perusahaan adalah 6 hari.</td>
                        <td>Meningkatkan proses komunikasi antara perusahaan dengan supplier, dan perusahaan harus selalu
                            memberikan informasi kepada supplier tentang ketersediaan bahan baku, sehingga supplier dapat
                            bersiap jika kondisi bahan baku tidak mencukupi. Selain itu, supplier juga harus memberikan
                            informasiterkini tentang status bahan baku, sehingga perusahaan dapat mengambil keputusan atau
                            memprediksi jika terjadi sesuatu dalam penyediaan bahan baku.</td>
                    </tr>
                    <tr>
                        <td>3. </td>
                        <td>Timely Delivery Performance By The Company</td>
                        <td>Komplain dari pelanggan dikarenakan keterlambatan pengiriman barang.</td>
                        <td>Dilakukan penjadwalan produksi serta menganalisa setiap work center.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Ambil label indikator dan nilainya dari PHP
        const labels = @json($labelsSingkat);
        const dataNilaiAkhir = @json($hasil->pluck('nilai_akhir'));

        const ctx = document.getElementById('myAreaChart').getContext('2d');
        const myAreaChart = new Chart(ctx, {
            type: 'line', // ubah menjadi line chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai Akhir SCM',
                    data: dataNilaiAkhir,
                    fill: false,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.3, // membuat garis sedikit melengkung
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // titik di garis
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 10 // Sesuaikan skala jika perlu
                    }
                }
            }
        });
    </script>

@endsection
