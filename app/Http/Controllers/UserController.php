<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => User::with('posisi')->get(),
            'posisi' => Posisi::all(),
        ];
        return view('administrator.users.index', $data);
    }

    public function create(Request $r)
    {
        $id_lokasi = 1;
        User::create([
            'name' => $r->nama,
            'username' => $r->username,
            'id_posisi' => $r->id_posisi,
            'password' => bcrypt($r->password),
            'id_lokasi' => $id_lokasi,
        ]);

        return redirect()->route('users')->with('sukses', 'Berhasil tambah data');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $posisi = Posisi::all();
        return view('administrator.users.edit', compact('user', 'posisi'));
    }
    
    public function update(Request $r)
    {
        User::find($r->id_user)->update([
            'name' => $r->nama,
            'username' => $r->username,
            'id_posisi' => $r->id_posisi,
        ]);

        return redirect()->route('users')->with('sukses', 'Berhasil update data');
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('users')->with('sukses', 'Berhasil hapus data');
    }
}
