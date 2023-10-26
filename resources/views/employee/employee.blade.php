@extends('layout.app')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('breadcrumb')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Karyawan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Karyawan</h3>
                        <a href="{{ route('employee.create') }}" class="btn btn-primary float-right"><i
                                class="fa fa-plus-square fa-lg"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>KTP</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th width="240">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dataEmployee as $employee)
                                    <tr class="text-center">
                                        <th>{{ $no++ }}</th>
                                        <td>
                                            @if ($employee->foto)
                                                <img src="{{ url('foto_ktp') . '/' . $employee->foto }}"
                                                    style="max-width: 60px;max-height:40px">
                                            @endif
                                        </td>
                                        <td>{{ $employee->nama }}</td>
                                        <td>{{ $employee->nip }}</td>
                                        <td>{{ $employee->position->name }}</td>
                                        <td>
                                            @if ($employee->status == '1')
                                                Aktif
                                            @else
                                                Tidak Aktif
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('employee.show', [$employee->id]) }}"
                                                class='btn btn-info btn-sm'>Detail</a>
                                            <a href="{{ route('employee.edit', [$employee->id]) }}"
                                                class='btn btn-secondary btn-sm'>Edit</a>
                                            <form class="d-inline" method="post"
                                                action="{{ route('employee.destroy', [$employee->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="button">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: "text-center"
                },
                {
                    data: 'name'
                }
            ]
        })
    </script>
@endpush
