<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::orderBy('id', 'DESC')->get();
        return view('employee.employee')->with('dataEmployee', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Position::all();
        return view('employee.create')->with('positions', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nip', $request->nip);
        Session::flash('jabatan', $request->jabatan);
        Session::flash('nomor_telpon', $request->nomor_telpon);
        Session::flash('departemen', $request->departemen);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('tahun_lahir', $request->tahun_lahir);
        Session::flash('alamat', $request->alamat);
        Session::flash('agama', $request->agama);
        Session::flash('status', $request->status);

        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:employees',
            'nomor_telpon' => 'required|numeric',
            'tanggal_lahir' => 'required',
            'departemen' => 'required',
            'tahun_lahir' => 'required|numeric',
            'alamat' => 'required',
            'agama' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,gif'
        ], [
            'nama.required' => 'Nama Karyawan harus diisi',
            'nip.required' => 'Nip Karyawan harus diisi',
            'nip.unique' => 'Nip Karyawan sudah ada',
            'nomor_telpon.required' => 'Nomor Telpon Karyawan harus diisi',
            'nomor_telpon.numeric' => 'Nomor Telpon Karyawan harus berupa angka',
            'tanggal_lahir.required' => 'Tanggal Lahir Karyawan harus diisi',
            'tahun_lahir.required' => 'Tahun Lahir Karyawan harus diisi',
            'tahun_lahir.numeric' => 'Tahun Lahir Karyawan harus berupa angka',
            'alamat.required' => 'Alamat Karyawan harus diisi',
            'departemen.required' => 'Departemen Karyawan harus diisi',
            'agama.required' => 'Agama Karyawan harus diisi',
            'foto.required' => 'Silahkan masukkan foto',
            'foto.mimes' => 'Foto harus berekstensi JPG, JPEG, PNG, dan GIF'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = "IMG_" . date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('foto_ktp'), $foto_nama);

        $data = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'position_id' => $request->input('position_id'),
            'nomor_telpon' => $request->input('nomor_telpon'),
            'departemen' => $request->input('departemen'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'alamat' => $request->input('alamat'),
            'agama' => $request->input('agama'),
            'status' => $request->input('status'),
            'foto' => $foto_nama
        ];

        $employee = Employee::create($data);
        if ($employee) {
            Session::flash('success', 'Data berhasil ditambahkan.');
        } else {
            Session::forget('success');
        }

        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(String $employee)
    {
        $data = Employee::find($employee);
        return view('employee.show')->with('dataEmployee', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(String $employee)
    {
        $positions = Position::all();
        $data = Employee::find($employee);
        return view('employee.edit')->with('dataEmployee', $data)->with('positions', $positions);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, String $id)
    {
        Session::flash('nama', $request->nama);
        Session::flash('nip', $request->nip);
        Session::flash('jabatan', $request->jabatan);
        Session::flash('nomor_telpon', $request->nomor_telpon);
        Session::flash('departemen', $request->departemen);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('tahun_lahir', $request->tahun_lahir);
        Session::flash('alamat', $request->alamat);
        Session::flash('agama', $request->agama);

        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:employees',
            'nomor_telpon' => 'required|numeric',
            'tanggal_lahir' => 'required',
            'departemen' => 'required',
            'tahun_lahir' => 'required|numeric',
            'alamat' => 'required',
            'agama' => 'required'
        ], [
            'nama.required' => 'Nama Karyawan harus diisi',
            'nip.required' => 'Nip Karyawan harus diisi',
            'nip.unique' => 'Nip Karyawan sudah ada',
            'nomor_telpon.required' => 'Nomor Telpon Karyawan harus diisi',
            'nomor_telpon.numeric' => 'Nomor Telpon Karyawan harus berupa angka',
            'tanggal_lahir.required' => 'Tanggal Lahir Karyawan harus diisi',
            'tahun_lahir.required' => 'Tahun Lahir Karyawan harus diisi',
            'tahun_lahir.numeric' => 'Tahun Lahir Karyawan harus berupa angka',
            'alamat.required' => 'Alamat Karyawan harus diisi',
            'departemen.required' => 'Departemen Karyawan harus diisi',
            'agama.required' => 'Agama Karyawan harus diisi'
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'position_id' => $request->input('position_id'),
            'nomor_telpon' => $request->input('nomor_telpon'),
            'departemen' => $request->input('departemen'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'alamat' => $request->input('alamat'),
            'agama' => $request->input('agama')
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'required|mimes:png,jpg,jpeg,gif'
            ], [
                'foto.mimes' => 'Foto harus berekstensi JPG, JPEG, PNG, dan GIF'
            ]);

            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = "IMG_" . date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move(public_path('foto_ktp'), $foto_nama);

            $data_foto = Employee::where('id', $id)->first();
            File::delete(public_path('foto_ktp') . '/' . $data_foto->foto);

            $data['foto'] = $foto_nama;
        }

        $employee = Employee::where('id', $id)->update($data);
        if ($employee) {
            Session::flash('success', 'Data berhasil ditambahkan.');
        } else {
            Session::forget('success');
        }

        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $employee)
    {
        $data = Employee::find($employee);
        File::delete(public_path('foto_ktp' . '/' . $data->foto));
        $data->delete();

        if ($data) {
            Session::flash('success', 'Data berhasil dihapus.');
        } else {
            Session::forget('success');
        }

        return redirect(route('employee.index'));
    }

    function status(String $id)
    {
        $data = Employee::find($id);
        if ($data->status == '1') {
            Employee::where('id', $id)->update('status',);
        }
    }
}
