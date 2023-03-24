<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddKokiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Add Koki'
        ];

        return view('add_koki.add_koki',$data);
    }
}
