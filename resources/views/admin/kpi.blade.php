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
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center align-middle">Variabel</th>
                            <th class="text-center align-middle">Atribut</th>
                            <th class="text-center align-middle">Indikator</th>
                            <th class="text-center align-middle">Keterangan</th>
                            <th class="text-center align-middle">Kategori</th>
                            <th class="text-center align-middle" style="width: 80px;">
                                Rata-Rata Skor
                            </th>
                            <th class="text-center
                                align-middle"
                                style="white-space: nowrap;">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKPI as $item)
                            <tr>
                                <td class="text-center">{{ $item->variabel }}</td>
                                <td class="text-center">{{ $item->atribut }}</td>
                                <td class="text-center" style="width: 100px;">{{ $item->indikator }}</td>
                                <td
                                    style="max-width: 200px; text-align: justify; white-space: normal; word-wrap: break-word;">
                                    {{ $item->keterangan }}
                                </td>
                                <td class="text-center">{{ $item->kategori }}</td>
                                <td class="text-center">
                                    {{ $item->skor !== null ? number_format($item->skor, 3) : '-' }}
                                </td>
                                <td class="text-center white-space: normal; word-wrap: break-word;">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalSkor{{ $item->id }}">
                                        <i class="fas fa-edit"></i> Input Skor
                                    </button>
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

                            <!-- Modal Input Skor untuk setiap item -->
                            <div class="modal fade" id="modalSkor{{ $item->id }}" tabindex="-1"
                                aria-labelledby="modalSkorLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('kpi.updateKpi', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title">Input Skor Kuesioner</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Indikator:</strong> {{ $item->indikator }}</p>

                                                <div id="skor-container-{{ $item->id }}">
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        <div class="mb-2">
                                                            <label for="skor{{ $i }}">Skor Responden
                                                                {{ $i }}</label>
                                                            <input type="number" name="skor[]" class="form-control"
                                                                min="1" max="5" step="0.01">
                                                        </div>
                                                    @endfor
                                                </div>

                                                <!-- Tombol Tambah Responden -->
                                                <div class="text-center mt-3">
                                                    <button type="button" class="btn btn-dark btn-sm"
                                                        onclick="tambahKolomSkor({{ $item->id }})">
                                                        <i class="fas fa-plus"></i> Tambah Responden
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-dark">Simpan Rata-rata</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data KPI.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mb-3 mt-5">
        <form action="{{ route('perhitungan.pairwise.generate') }}" method="POST"
            onsubmit="return confirm('Apakah Anda yakin ingin melanjutkan perhitungan berikutnya? Pastikan data KPI sudah sesuai.')">
            @csrf
            <button type="submit" class="btn btn-dark">
                <i></i> Buat Matriks Perbandingan Berpasangan
            </button>
        </form>
    </div>

@endsection

<script>
    let jumlahKolomMap = {};

    function tambahKolomSkor(id) {
        const containerId = 'skor-container-' + id;
        const container = document.getElementById(containerId);

        if (!jumlahKolomMap[id]) {
            jumlahKolomMap[id] = container.querySelectorAll('.skor-item, .mb-2').length;
        }

        jumlahKolomMap[id]++;

        const div = document.createElement('div');
        div.className = 'mb-2';

        const label = document.createElement('label');
        label.setAttribute('for', `skor${jumlahKolomMap[id]}`);
        label.textContent = `Skor Responden ${jumlahKolomMap[id]}`;

        const input = document.createElement('input');
        input.type = 'number';
        input.name = 'skor[]';
        input.className = 'form-control';
        input.min = '1';
        input.max = '10';
        input.step = '0.01';

        div.appendChild(label);
        div.appendChild(input);
        container.appendChild(div);
    }
</script>
