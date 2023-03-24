<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Posisi;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Karyawan',
            'karyawans' => Karyawan::with('gaji', 'posisi', 'status')->get(),
            'posisi' => Posisi::all(),
            'status' => Status::all(),
        ];
        return view('administrator.karyawans.index', $data);
    }

    public function create(Request $r)
    {
        
        $cek = Karyawan::where('nm_karyawan', $r->nama)->first();
        if($cek) {
            return redirect()->route('karyawan')->with('error', 'Gagal! Nama sudah ada');
        } else {
            $data = [
                'nm_karyawan' => $r->nama,
                'id_status' => $r->id_status,
                'id_posisi' => $r->id_posisi,
                'tgl_masuk' => $r->tgl_masuk,
            ];
    
            $kr = Karyawan::create($data);
            $nm_karyawan = $r->status == '1' ? 'K-'.$r->nama : $r->nama;

            $data2 = [
                'id_karyawan' => $kr->id,
                'rp_m' => $r->rp_m,
                'rp_e' => $r->rp_e,
                'rp_sp' => $r->rp_sp,
                'g_bulanan' => $r->g_bulanan,
            ];
            Gaji::create($data2);

            $data3 = [
                'id_karyawan' => $kr->id,
                'nm_karyawan' => $nm_karyawan,
                'posisi' => 'WAITRESS',
                'pangkat' => 'SERVER'
            ];
            DB::table('tb_karyawan_majo')->insert($data3);

            // $response = Http::withHeaders([
            //     'X-API-KEY' => '@Takemor.'
            // ])->get("https://majoo-laravel.putrirembulan.com/api/add_karyawan/$nm_karyawan");

            return redirect()->route('karyawan')->with('sukses', 'Berhasil tambah karyawan');
        }

    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id)->with('gaji', 'posisi', 'status')->first();
        $posisi = Posisi::all();
        $status = Status::all();

        return view('administrator.karyawans.edit', compact('karyawan', 'posisi', 'status'));
    }
    
    public function update(Request $r)
    {
        $id_gaji = $r->id_gaji;
        $id_karyawan = $r->id_karyawan;

        $data = [
            'nm_karyawan' => $r->nama,
            'id_status' => $r->id_status,
            'id_posisi' => $r->id_posisi,
            'tgl_masuk' => $r->tgl_masuk
        ];
    
        Karyawan::find($id_karyawan)->update($data);

        $data = [
            'id_karyawan' => $id_karyawan,
            'rp_m' => $r->rp_m,
            'rp_e' => $r->rp_e,
            'rp_sp' => $r->rp_sp,
            'g_bulanan' => $r->g_bulanan,
        ];

        if (empty($id_gaji || $id_karyawan)) {
            Gaji::create($data);
        } else {      
            Gaji::where('id_karyawan', $id_karyawan)->update($data);
        }

        return redirect()->route('karyawan')->with('sukses', 'Berhasil update data');
    }

    public function delete($id)
    {
        $user = Karyawan::find($id)->delete();
        Gaji::where('id_karyawan',$id)->delete();
        DB::table('tb_karyawan_majo')->where('id_karyawan',$id)->delete();
        return redirect()->route('karyawan')->with('sukses', 'Berhasil hapus data');
    }

    public function point(Request $r)
    {
        Karyawan::find($r->id_karyawan)->update(['point' => $r->value]);
        return redirect()->route('karyawan')->with('sukses', 'Berhasil add point karyawan');
    }
}
