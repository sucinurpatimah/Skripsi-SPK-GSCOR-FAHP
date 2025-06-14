@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

    {{-- Konten Ringkasan / Komponen --}}
    <div class="row mt-4 justify-content-between">
        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-primary text-white w-100">
                <div class="card-body">Kelola Data SCM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-success text-white w-100">
                <div class="card-body">Kelola Data Green SCOR</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card bg-warning text-white w-100">
                <div class="card-body">Kelola Perhitungan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>


    {{-- Grafik atau Statistik Bisa Ditambahkan Di Sini --}}
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-chart-area me-1"></i> Statistik Contoh</div>
        <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
    </div>

@endsection
