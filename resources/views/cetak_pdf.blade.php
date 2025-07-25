<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengukuran Kinerja</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        .title {
            text-align: center;
            margin: 20px 0;
        }

        .kop-table,
        .kop-table td,
        .kop-table th {
            border: none !important;
            padding: 0;
        }


        .kop-container {
            text-align: center;
            margin-bottom: 10px;
        }

        .kop-logo-text {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .kop-logo-text img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .kop-logo-text .text {
            text-align: left;
            font-size: 12px;
            line-height: 1.3;
        }

        hr.double {
            border: none;
            border-top: 2px solid black;
            border-bottom: 3px double black;
            margin-top: 5px;
            margin-bottom: 10px;
        }


        ul {
            margin-top: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <div class="kop-container" style="margin-bottom: 10px;">
        <table class="kop-table" style="width: 100%;">
            <tr>
                <td style="width: 100px; text-align: center;">
                    <img src="{{ public_path('assets/img/logo arida kuning.png') }}" alt="Logo Arida"
                        style="width: 150px; height: auto;">
                </td>
                <td style="text-align: left; padding-left: 70px; vertical-align: middle;">
                    <div style="font-size: 14px; font-weight: bold;">PT. ARTERIA DAYA MULIA</div>
                    <div style="font-size: 12px;">
                        Jl. Dukuh Duwur No. 46, Cirebon 45113, Jawa Barat - Indonesia<br>
                        Telp. (0231) 206507 | Fax. (0231) 206478 - 206842
                    </div>
                </td>
            </tr>
        </table>
        <hr class="double">
    </div>



    <!-- Judul Laporan -->
    <h3 class="title">
        Laporan Pengukuran Kinerja Rantai Pasok Proses Produksi Tambang<br>
        PT. Arteria Daya Mulia
    </h3>

    <!-- Tabel Hasil -->
    <table>
        <thead>
            <tr>
                <th class="text-center">Variabel</th>
                <th class="text-center">Atribut</th>
                <th class="text-center">Indikator</th>
                <th class="text-center">Bobot Prioritas</th>
                <th class="text-center">Snorm De Boer</th>
                <th class="text-center">Nilai Akhir SCM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hasilPerIndikator as $item)
                <tr>
                    <td style="text-align: center;">{{ $item['variabel'] }}</td>
                    <td style="text-align: center;">{{ $item['atribut'] }}</td>
                    <td style="text-align: center;">{{ $item['indikator'] }}</td>
                    <td style="text-align: center;">{{ $item['bobot_prioritas'] }}</td>
                    <td style="text-align: center;">{{ $item['snorm_de_boer'] }}</td>
                    <td style="text-align: center;">{{ $item['nilai_akhir'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align: center;"><strong>Total Nilai Akhir SCM</strong></td>
                <td style="text-align: center;"><strong>{{ $riwayat->total_nilai_akhir }}</strong></td>
            </tr>
        </tbody>

    </table>

    <!-- Rekomendasi Umum -->
    <p><strong>Rekomendasi : </strong> {{ $riwayat->rekomendasi }} Lakukan Perbaikan Untuk Indikator
        Dibawah Ini.</p>

    <!-- Rekomendasi Per Indikator -->
    @if (count($rekomendasiIndikator) > 0)
        <table>
            <thead>
                <tr>
                    <th>Indikator</th>
                    <th>Rekomendasi Perbaikan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekomendasiIndikator as $item)
                    <tr>
                        <td style="width: 200px;">{{ $item['indikator'] }}</td>
                        <td>{{ $item['rekomendasi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p><em>Tidak ada indikator dengan nilai akhir di bawah 70.</em></p>
    @endif

    @php
        use App\Models\User;
        use Carbon\Carbon;

        Carbon::setLocale('id'); // Set bahasa ke Indonesia
        $manager = User::where('role', 'manager')->first();
    @endphp

    @if ($manager)
        <table style="width: 100%; margin-top: 60px; border: none;">
            <tr>
                <td style="border: none; width: 60%;"></td>
                <td style="border: none; text-align: right;">
                    <div style="margin-bottom: 5px;">Cirebon, {{ Carbon::now()->translatedFormat('d F Y') }}</div>
                    <div style="margin-bottom: 90px;">Manager Produksi Tambang</div>
                    <div style="font-weight: bold; text-decoration: underline;">{{ $manager->name }}</div>
                </td>
            </tr>
        </table>
    @endif

    <!-- Catatan Istilah dan Penjelasan -->
    <div style="margin-top: 30px; text-align: justify;">
        <strong>Catatan:</strong>
        <ul style="padding-left: 20px;">
            <li><strong>Bobot Prioritas:</strong> Nilai kepentingan relatif suatu indikator terhadap indikator lainnya
                berdasarkan hasil perbandingan berpasangan dengan metode Fuzzy AHP.</li>
            <li><strong>Snorm De Boer:</strong> Nilai yang dihasilkan dari proses normalisasi menggunakan metode Snorm
                De Boer untuk menentukan performa masing-masing indikator.</li>
            <li><strong>Nilai Akhir SCM:</strong> Nilai hasil kali antara bobot prioritas dengan nilai Snorm De Boer
                yang merepresentasikan kinerja supply chain pada indikator tersebut.</li>
            <li><strong>Indikator dengan nilai Snorm De Boer di bawah 70</strong> dianggap memerlukan perbaikan karena
                tidak memenuhi standar kinerja rantai pasok yang telah ditetapkan.</li>
            <li><strong>Total Nilai Akhir SCM di atas 70</strong> menunjukkan bahwa kinerja supply chain management
                (SCM) secara keseluruhan telah berjalan dengan baik pada perusahaan tersebut.</li>
            <li><strong>Indikator yang digunakan</strong> dalam analisis ini
                disesuaikan dengan kebutuhan dan kondisi aktual perusahaan, sehingga hasil pengukuran lebih relevan dan
                akurat.</li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>

</body>

</html>
