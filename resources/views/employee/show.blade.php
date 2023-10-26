@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Detail Karyawan</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <strong>Nama</strong><br>
                                    <strong>NIP</strong><br>
                                    <strong>Posisi</strong><br>
                                    <strong>Departemen</strong><br>
                                    <strong>Tanggal Lahir</strong><br>
                                    <strong>Tahun Lahir</strong><br>
                                    <strong>Alamat</strong><br>
                                    <strong>Nomor Telepon</strong><br>
                                    <strong>Agama</strong><br>
                                </div>
                                <div class="col-sm-9">
                                    : {{ $dataEmployee->nama }}<br>
                                    : {{ $dataEmployee->nip }}<br>
                                    : {{ $dataEmployee->position->name }}<br>
                                    : {{ $dataEmployee->departemen }}<br>
                                    : {{ $dataEmployee->tanggal_lahir }}<br>
                                    : {{ $dataEmployee->tahun_lahir }}<br>
                                    : {{ $dataEmployee->alamat }}<br>
                                    : {{ $dataEmployee->nomor_telpon }}<br>
                                    : {{ $dataEmployee->agama }}<br>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <strong>Foto KTP</strong><br>
                                <img src="{{ url('foto_ktp') . '/' . $dataEmployee->foto }}" alt="Foto KTP" width="400">
                            </div>
                            <p class="text-center mt-3"><strong>Status:</strong>
                                @if ($dataEmployee->status == 1)
                                    Aktif
                                @elseif($dataEmployee->status == 2)
                                    Tidak Aktif
                                @else
                                    Status Tidak Diketahui
                                @endif
                            </p>
                            <p class="text-center"><strong>Dibuat pada:</strong> {{ $dataEmployee->created_at }}</p>
                            <p class="text-center"><strong>Diedit pada:</strong> {{ $dataEmployee->updated_at }}</p>
                            <div class="row float-right mr-lg-5">
                                @if ($dataEmployee->status == 1)
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#nonaktifkanModal">Nonaktifkan</button>
                                @elseif($dataEmployee->status == 2)
                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#aktifkanModal">Aktifkan</button>
                                @else
                                    Status Tidak Diketahui
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Modal untuk Nonaktifkan -->
<div class="modal fade" id="nonaktifkanModal" tabindex="-1" role="dialog" aria-labelledby="nonaktifkanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nonaktifkanModalLabel">Nonaktifkan Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin nonaktifkan karyawan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ route('nonaktifkan.employee', $dataEmployee->id) }}"
                    class="btn btn-warning">Nonaktifkan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Aktifkan -->
<div class="modal fade" id="aktifkanModal" tabindex="-1" role="dialog" aria-labelledby="aktifkanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aktifkanModalLabel">Aktifkan Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin mengaktifkan karyawan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="{{ route('aktifkan.employee', $dataEmployee->id) }}" class="btn btn-success">Aktifkan</a>
            </div>
        </div>
    </div>
</div>
