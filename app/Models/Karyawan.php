<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gaji()
    {
        return $this->hasOne(Gaji::class, 'id_karyawan', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }

    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'id_posisi', 'id');
    }

    // untuk di controller add-koki livewire
    public function absen()
    {
        return $this->hasMany(Absen::class, 'id_karyawan', 'id');
    }
}
