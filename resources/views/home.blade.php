@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="welcome d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center welcome-text">
                <h3 class="d-flex align-items-center"><img src="assets/img/icons/hi.svg" alt="img">&nbsp;Hi
                    {{ auth()->user()->name }},
                </h3>&nbsp;<h6>, Selamat Datang Di Aplikasi eLaporDinas</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-primary sale-widget flex-fill">
                    <div class="card-body d-flex align-items-center">
                        <span class="sale-icon bg-white text-primary">
                            <i class="ti ti-file-text fs-24"></i>
                        </span>
                        <div class="ms-2">
                            <p class="text-white mb-1">Total Laporan</p>
                            <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                <h4 class="text-white">1</h4>
                                <span class="badge badge-soft-primary"><i class="ti ti-arrow-up me-1"></i>+22%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-secondary sale-widget flex-fill">
                    <div class="card-body d-flex align-items-center">
                        <span class="sale-icon bg-white text-secondary">
                            <i class="ti ti-repeat fs-24"></i>
                        </span>
                        <div class="ms-2">
                            <p class="text-white mb-1">Total Laporan Di Verifikasi</p>
                            <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                <h4 class="text-white">1</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-teal sale-widget flex-fill">
                    <div class="card-body d-flex align-items-center">
                        <span class="sale-icon bg-white text-teal">
                            <i class="ti ti-gift fs-24"></i>
                        </span>
                        <div class="ms-2">
                            <p class="text-white mb-1">Total Belum Diverifikasi</p>
                            <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                <h4 class="text-white">22</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-info sale-widget flex-fill">
                    <div class="card-body d-flex align-items-center">
                        <span class="sale-icon bg-white text-info">
                            <i class="ti ti-brand-pocket fs-24"></i>
                        </span>
                        <div class="ms-2">
                            <p class="text-white mb-1">Total Dalam 1 Bulan Terakhir</p>
                            <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                <h4 class="text-white">33</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="card-title">Daftar Laporan Dinas</h4>
                        <p class="card-text">
                            Tabel ini menampilkan seluruh laporan dinas yang tersedia.
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <select class="form-select" id="filterUnit">
                                        <option value="">Semua Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->Nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" id="filterStart" placeholder="Tanggal Mulai">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" id="filterEnd" placeholder="Tanggal Selesai">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" id="filterStatus">
                                        <option value="">Semua Status</option>
                                        @foreach ($status as $st)
                                            <option value="{{ $st->id }}">{{ $st->Nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew cell-border compact stripe" id="laporanDinasTable" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nomor Surat</th>
                                        <th>Unit</th>
                                        <th>Tujuan</th>
                                        <th>Pergi</th>
                                        <th>Pulang</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    @endsection
