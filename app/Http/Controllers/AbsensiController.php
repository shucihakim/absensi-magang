<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function view() {
        $user = Auth::user();
        $ruangan = Rooms::all();
        $data = [
            'user' => $user,
            'ruangan' => $ruangan,
        ];
        return view('mahasiswa/absensi', $data);
    }
}
