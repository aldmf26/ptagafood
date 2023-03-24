<?php

namespace App\Http\Livewire\AddKoki;

use App\Models\Karyawan;
use App\Models\AddKoki as Koki;
use Livewire\Component;

class AddKoki extends Component
{
    public $tasks = [];
    public $selectedTasks = [];
    public $tglhariIni;
    public $id_lokasi = 1;

    public function mount()
    {
        $this->tglhariIni = date('Y-m-d');
        $idkok = Koki::where('tgl', $this->tglhariIni)->get();
        $idk = [];
        foreach ($idkok as $id) {
            $idk[] = $id->id_karyawan;
        }
        $this->tasks = Karyawan::where('id_status', '1')
                ->join('absens', 'karyawans.id', '=', 'absens.id_karyawan')
                ->where('absens.tgl', $this->tglhariIni)
                ->whereNotIn('absens.id_karyawan', $idk)
                ->where('absens.id_lokasi', $this->id_lokasi)->get();
    }

    public function delete($id)
    {
        Koki::where('id_koki', $id)->delete();
    }

    public function saveKoki()
    {
        foreach($this->selectedTasks as $d)
        {
            $t = explode('-', $d);
            $t = array_shift($t);
            $cek = Koki::where([['id_karyawan', $t], ['tgl', $this->tglhariIni]])->first();
            if(!$cek) {
                Koki::create([
                    'id_karyawan' => $t,
                    'tgl' => $this->tglhariIni,
                    'status' => 1,
                    'id_lokasi' => $this->id_lokasi,
                ]);
            }
        }
        $this->reset('selectedTasks');
    }

    public function render()
    {
        $data = [
            'koki' => Koki::with('karyawan')->where('id_lokasi', $this->id_lokasi)->get(),
        ];
        return view('livewire.add-koki.add-koki', $data);
    }
}
