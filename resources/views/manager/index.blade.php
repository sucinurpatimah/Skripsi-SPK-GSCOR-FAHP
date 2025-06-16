@extends('layouts.app')

@section('title', 'Dashboard Manager')
@section('page-title', 'Dashboard')

@section('content')

    {{-- Konten Ringkasan / Komponen --}}
    <div class="row mt-4 justify-content-between">
        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-primary text-white w-100">
                <div class="card-body">Data SCM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-success text-white w-100">
                <div class="card-body">Data Green SCOR</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-warning text-white w-100">
                <div class="card-body">Laporan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>


    {{-- Grafik atau Statistik Bisa Ditambahkan Di Sini --}}
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area me-1"></i>Nilai Akhir SCM</div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
    </div>

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

@endsection
