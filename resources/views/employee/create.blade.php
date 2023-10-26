@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Data Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-11 m-auto">
                                {!! Form::open(['route' => 'employee.store', 'class' => 'row', 'files' => true]) !!}
                                @csrf
                                <div class="form-group col-sm-8">
                                    {!! Form::label('nama', 'Nama') !!}
                                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                                    @error('nama')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('nip', 'NIP') !!}
                                    {!! Form::number('nip', null, ['class' => 'form-control']) !!}
                                    @error('nip')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('position_id', 'Position') !!}
                                    {!! Form::select('position_id', ['' => 'Pilih Posisi'] + $positions->toArray(), null, [
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('departemen', 'Departemen') !!}
                                    {!! Form::text('departemen', null, ['class' => 'form-control']) !!}
                                    @error('departemen')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('nomor_telpon', 'Nomor Telepon') !!}
                                    {!! Form::number('nomor_telpon', null, ['class' => 'form-control']) !!}
                                    @error('nomor_telpon')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
                                    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control']) !!}
                                    @error('tanggal_lahir')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('tahun_lahir', 'Tahun Lahir') !!}
                                    {!! Form::number('tahun_lahir', null, ['class' => 'form-control']) !!}
                                    @error('tahun_lahir')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('alamat', 'Alamat') !!}
                                    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 3]) !!}
                                    @error('alamat')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('agama', 'Agama') !!}
                                    {!! Form::text('agama', null, ['class' => 'form-control']) !!}
                                    @error('agama')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('status', 'Status') !!}
                                    {!! Form::select('status', ['' => 'Pilih Status', '1' => 'Aktif', '2' => 'Tidak Aktif'], null, [
                                        'class' => 'form-control',
                                    ]) !!}
                                    @error('status')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    {!! Form::label('foto', 'Foto KTP') !!}
                                    {!! Form::file('foto', ['class' => 'form-control']) !!}
                                    @error('foto')
                                        <div id="error-container" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
