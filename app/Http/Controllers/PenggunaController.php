<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    //
    public function pengguna_view(){
        return view('admin/pengguna');
    }
}
