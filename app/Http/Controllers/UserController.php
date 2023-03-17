<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => User::with('posisi')->get()
        ];
        return view('administrator.users.index', $data);
    }

    public function create(Request $r)
    {
        dd($r->all());
    }
}
