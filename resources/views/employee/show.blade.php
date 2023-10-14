@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center">
                                @if ($dataEmployee->foto)
                                    <img src="{{ url('foto_ktp') . '/' . $dataEmployee->foto }}" class="mx-auto mt-3"
                                        width="280px" height="240px">
                                @endif
                            </div>
                            <div class="col-8">
                                <form>
                                    <fieldset>
                                        <div class="mb-2">
                                            <label for="nama" class="form-label">Nama Karyawan</label>
                                            <input type="text" id="nama" class="form-control" disabled readonly
                                                value="{{ $dataEmployee->nama }}">
                                        </div>
                                        <div class="mb-2">
                                            <label for="nip" class="form-label">Nip Karyawan</label>
                                            <input type="text" id="nip" class="form-control" disabled readonly
                                                value="{{ $dataEmployee->nip }}">
                                        </div>
                                        <div class="mb-2">
                                            <label for="position" class="form-label">Posisi Karyawan</label>
                                            <input type="text" id="position" class="form-control" disabled readonly
                                                value="{{ $dataEmployee->position->name }}">
                                        </div>
                                        <div class="mb-2">
                                            <label for="nomor_telpon" class="form-label">Nomor Telepon Karyawan</label>
                                            <input type="text" id="nomor_telpon" class="form-control" disabled readonly
                                                value="{{ $dataEmployee->nomor_telpon }}">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="mt-2">
                            <form>
                                <fieldset>
                                    <div class="mb-2">
                                        <label for="departemen" class="form-label">Departemen Karyawan</label>
                                        <input type="text" id="departemen" class="form-control" disabled readonly
                                            value="{{ $dataEmployee->departemen }}">
                                    </div>
                                    <div class="mb-2">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir Karyawan</label>
                                        <input type="text" id="tanggal_lahir" class="form-control" disabled readonly
                                            value="{{ $dataEmployee->tanggal_lahir }}">
                                    </div>
                                    <div class="mb-2">
                                        <label for="tahun_lahir" class="form-label">Tahun Lahir Karyawan</label>
                                        <input type="text" id="tahun_lahir" class="form-control" disabled readonly
                                            value="{{ $dataEmployee->tahun_lahir }}">
                                    </div>
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea id="alamat" cols="30" rows="2" class="form-control" disabled readonly>{{ $dataEmployee->alamat }}</textarea>
                                    </div>
                                </fieldset>
                            </form>
                            <p><strong>Status :</strong>{{ $dataEmployee->status }}</p>
                            <p><strong>Dibuat pada :</strong>{{ $dataEmployee->created_at }}</p>
                            <p><strong>Diedit pada :</strong>{{ $dataEmployee->updated_at }}</p>
                        </div>
                        <div class="m-3">
                            <a href="{{ route('employee.index') }}" class="btn btn-secondary">Kembali ke
                                Halaman Sebelumnya</a>
                            {{-- <form class="d-inline" method="post" action="{{ route('employee.status', [$employee->id]) }}">
                                @csrf
                                @method('PUT')
                                @if ($dataEmployee->status == '1')
                                    <button type="submit" class="btn btn-primary float-right px-2">Nonaktifkan
                                        Status</button>
                                @else
                                    <button type="submit" class="btn btn-primary float-right px-2">Aktifkan Status</button>
                                @endif
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
