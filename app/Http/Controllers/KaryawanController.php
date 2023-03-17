<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Karyawan',
            'karyawans' => Karyawan::with('gaji')->get(),
        ];
        return view('administrator.karyawans.index', $data);
    }

    public function create(Request $r)
    {
        $id_lokasi = 1;
        Karyawan::create([
            'name' => $r->nama,
            'username' => $r->username,
            'id_posisi' => $r->id_posisi,
            'password' => bcrypt($r->password),
            'id_lokasi' => $id_lokasi,
        ]);

        return redirect()->route('karyawans')->with('sukses', 'Berhasil tambah data');
    }

    public function edit($id)
    {
        $user = Karyawan::findOrFail($id);
        return view('administrator.karyawans.edit', compact('user', 'posisi'));
    }
    
    public function update(Request $r)
    {
        Karyawan::find($r->id_user)->update([
            'name' => $r->nama,
            'username' => $r->username,
            'id_posisi' => $r->id_posisi,
        ]);

        return redirect()->route('karyawans')->with('sukses', 'Berhasil update data');
    }

    public function delete($id)
    {
        $user = Karyawan::find($id)->delete();
        return redirect()->route('karyawans')->with('sukses', 'Berhasil hapus data');
    }
}
