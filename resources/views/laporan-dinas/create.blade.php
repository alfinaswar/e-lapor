@extends('layouts.app')

@section('content')
    @push('style')
        <style>
            .dropzone-wrapper {
                cursor: pointer;
                background-color: #f8f9fa;
                transition: 0.3s;
            }

            .dropzone-wrapper:hover {
                background-color: #f1f3f5;
            }

            .dropzone-wrapper.dragover {
                background-color: #e2f0d9;
                border-color: #28a745;
            }
        </style>
    @endpush

    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Laporan Dinas</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan Dinas</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                Justified Pills
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan-dinas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <label for="NomorSurat" class="form-label"><strong>Nomor
                                Surat</strong></label>
                        <input type="text" name="NomorSurat"
                            class="form-control @error('NomorSurat') is-invalid @enderror" id="NomorSurat"
                            placeholder="Nomor Surat" value="{{ old('NomorSurat') }}">
                        @error('NomorSurat')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Provinsi" class="form-label"><strong>Provinsi</strong></label>
                        <input type="text" name="Provinsi"
                            class="form-control @error('Provinsi') is-invalid @enderror" id="Provinsi"
                            placeholder="Provinsi" value="{{ old('Provinsi') }}">
                        @error('Provinsi')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Kota" class="form-label"><strong>Kota</strong></label>
                        <input type="text" name="Kota"
                            class="form-control @error('Kota') is-invalid @enderror" id="Kota"
                            placeholder="Kota" value="{{ old('Kota') }}">
                        @error('Kota')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Kecamatan" class="form-label"><strong>Kecamatan</strong></label>
                        <input type="text" name="Kecamatan"
                            class="form-control @error('Kecamatan') is-invalid @enderror" id="Kecamatan"
                            placeholder="Kecamatan" value="{{ old('Kecamatan') }}">
                        @error('Kecamatan')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Kelurahan" class="form-label"><strong>Kelurahan</strong></label>
                        <input type="text" name="Kelurahan"
                            class="form-control @error('Kelurahan') is-invalid @enderror" id="Kelurahan"
                            placeholder="Kelurahan" value="{{ old('Kelurahan') }}">
                        @error('Kelurahan')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="Tujuan" class="form-label"><strong>Tujuan</strong></label>
                        <input type="text" name="Tujuan"
                            class="form-control @error('Tujuan') is-invalid @enderror" id="Tujuan"
                            placeholder="Tujuan" value="{{ old('Tujuan') }}">
                        @error('Tujuan')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="Alamat" class="form-label"><strong>Alamat</strong></label>
                        <textarea name="Alamat" id="Alamat" class="form-control @error('Alamat') is-invalid @enderror" rows="4"
                            placeholder="Alamat">{{ old('Alamat') }}</textarea>
                        @error('Alamat')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="TanggalBerangkat" class="form-label"><strong>Tanggal
                                Berangkat</strong></label>
                        <input type="date" name="TanggalBerangkat"
                            class="form-control @error('TanggalBerangkat') is-invalid @enderror"
                            id="TanggalBerangkat" placeholder="Tanggal Berangkat"
                            value="{{ old('TanggalBerangkat') }}">
                        @error('TanggalBerangkat')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="TanggalPulang" class="form-label"><strong>Tanggal
                                Pulang</strong></label>
                        <input type="date" name="TanggalPulang"
                            class="form-control @error('TanggalPulang') is-invalid @enderror" id="TanggalPulang"
                            placeholder="Tanggal Pulang" value="{{ old('TanggalPulang') }}">
                        @error('TanggalPulang')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="Uraian" class="form-label"><strong>Uraian</strong></label>
                        <div id="quill-editor" class="mb-3" style="height: 300px;">
                        </div>
                        <textarea rows="3" class="mb-3 d-none" name="Uraian" id="quill-editor-area"></textarea>
                        @error('Uraian')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="FileSurat" class="form-label"><strong>File Surat</strong></label>

                        <div id="drop-zone"
                            class="dropzone-wrapper border border-2 border-dashed rounded-3 p-4 text-center">
                            <div class="dropzone-desc text-muted mb-2">
                                <i class="fa fa-cloud-upload fa-2x d-block mb-2"></i>
                                <span>Tarik file ke sini atau klik untuk memilih</span>
                            </div>
                            <input type="file" name="FileSurat" id="FileSurat"
                                class="dropzone-input d-none" />
                            <div id="file-name-preview" class="mt-2 text-primary fw-bold small"></div>
                        </div>

                        @error('FileSurat')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-12 text-end mt-3">
                        <a href="{{ route('laporan-dinas.index') }}" class="btn btn-secondary me-2">
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
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#jenis_isian').on('change', function() {
                let jenis = $(this).val();
                if (jenis === 'range') {
                    $('#tanggal_selesai_group').show();
                } else {
                    $('#tanggal_selesai_group').hide();
                    $('#TanggalSelesai').val('');
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('FileSurat');
            const preview = document.getElementById('file-name-preview');

            // Klik zona akan memicu file input
            dropZone.addEventListener('click', () => fileInput.click());

            // Drag hover style
            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropZone.classList.add('dragover');
            });

            dropZone.addEventListener('dragleave', function() {
                dropZone.classList.remove('dragover');
            });

            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropZone.classList.remove('dragover');

                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    updatePreview();
                }
            });

            // Update preview filename
            fileInput.addEventListener('change', updatePreview);

            function updatePreview() {
                const fileName = fileInput.files[0]?.name ?? '';
                preview.textContent = fileName ? `File dipilih: ${fileName}` : '';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone2 = document.getElementById('drop-zone2');
            const fileInput2 = document.getElementById('BuktiDukung');
            const preview2 = document.getElementById('file-name-preview-2');

            // Klik zona trigger input
            dropZone2.addEventListener('click', () => fileInput2.click());

            // Dragover
            dropZone2.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropZone2.classList.add('dragover');
            });

            dropZone2.addEventListener('dragleave', function() {
                dropZone2.classList.remove('dragover');
            });

            // Drop file
            dropZone2.addEventListener('drop', function(e) {
                e.preventDefault();
                dropZone2.classList.remove('dragover');
                if (e.dataTransfer.files.length) {
                    fileInput2.files = e.dataTransfer.files;
                    updatePreview2();
                }
            });

            // Update preview
            fileInput2.addEventListener('change', updatePreview2);

            function updatePreview2() {
                let fileList = '';
                for (let i = 0; i < fileInput2.files.length; i++) {
                    fileList += `<div>• ${fileInput2.files[i].name}</div>`;
                }
                preview2.innerHTML = fileList || '<span class="text-muted">Belum ada file dipilih.</span>';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('quill-editor-area')) {
                var editor = new Quill('#quill-editor', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('quill-editor-area');
                editor.on('text-change', function() {
                    quillEditor.value = editor.root.innerHTML;
                });

                quillEditor.addEventListener('input', function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('quill-editor-area2')) {
                var editor = new Quill('#quill-editor2', {
                    theme: 'snow'
                });
                var quillEditor = document.getElementById('quill-editor-area2');
                editor.on('text-change', function() {
                    quillEditor.value = editor.root.innerHTML;
                });

                quillEditor.addEventListener('input', function() {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
    </script>
@endpush
