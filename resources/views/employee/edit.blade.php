@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-11 m-auto">
                                <form action="{{ route('employee.update', $dataEmployee->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Karyawan</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $dataEmployee->nama }}">
                                        @error('nama')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            value="{{ $dataEmployee->nip }}">
                                        @error('nip')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="position_id" class="form-label">Position</label>
                                        <select class="form-control" aria-label="position_id" name="position_id"
                                            id="position_id">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomor_telpon" class="form-label">Nomor Telpon</label>
                                        <input type="number" class="form-control" id="nomor_telpon" name="nomor_telpon"
                                            value="{{ $dataEmployee->nomor_telpon }}">
                                        @error('nomor_telpon')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="departemen" class="form-label">Departemen</label>
                                        <input type="text" class="form-control" id="departemen" name="departemen"
                                            value="{{ $dataEmployee->departemen }}">
                                        @error('departemen')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                            placeholder="contoh : 11 Februari" value="{{ $dataEmployee->tanggal_lahir }}">
                                        @error('tanggal_lahir')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun_lahir" class="form-label">Tahun Lahir</label>
                                        <input type="year" class="form-control" id="tahun_lahir" name="tahun_lahir"
                                            value="{{ $dataEmployee->tahun_lahir }}">
                                        @error('tahun_lahir')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea id="alamat" name="alamat" cols="30" rows="3" class="form-control">{{ $dataEmployee->alamat }}</textarea>
                                        @error('alamat')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama"
                                            value="{{ $dataEmployee->agama }}">
                                        @error('agama')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @if ($dataEmployee->foto)
                                        <div class="mb-3">
                                            <img src="{{ url('foto_ktp') . '/' . $dataEmployee->foto }}" alt=""
                                                style="max-width: 120px;max-height:120px">
                                        </div>
                                    @endif
                                    <div class="mb-5">
                                        <label for="foto" class="form-label">Foto KTP</label>
                                        <input type="file" class="form-control" id="foto" name="foto"
                                            value="{{ $dataEmployee->foto }}">
                                        @error('foto')
                                            <div id="error-container" style="color: red;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="m-3">
                                        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Kembali ke
                                            Halaman Sebelumnya</a>
                                        <button type="submit" class="btn btn-primary float-right px-5">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
