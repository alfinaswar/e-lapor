@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Master Status</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('status.index') }}">Daftar Status</a></li>
                    <li class="breadcrumb-item active">Edit Status</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title mb-0">Formulir Edit Status</h4>
                    <p class="card-text mb-0">
                        Silakan edit data status di bawah ini.
                    </p>
                </div>
                <div class="card-body">
                    <form action="{{ route('status.update', encrypt($data->id)) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="nama" class="form-label"><strong>Nama Status</strong></label>
                                <input type="text" name="Nama"
                                    class="form-control @error('Nama') is-invalid @enderror" id="nama"
                                    placeholder="Nama Status" value="{{ old('Nama', $data->Nama) }}">
                                @error('Nama')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="Deskripsi" class="form-label"><strong>Deskripsi</strong></label>
                                <textarea name="Deskripsi" id="Deskripsi" class="form-control @error('Deskripsi') is-invalid @enderror" rows="4"
                                    placeholder="Deskripsi Status">{{ old('Deskripsi', $data->Deskripsi) }}</textarea>
                                @error('Deskripsi')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 text-end mt-3">
                                <a href="{{ route('status.index') }}" class="btn btn-secondary me-2">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Simpan
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
