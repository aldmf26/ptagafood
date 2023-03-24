<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Absen'
        ];
        return view('absen.absen',$data);
    }
}
