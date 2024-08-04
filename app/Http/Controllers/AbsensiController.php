<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rooms;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        $ruangan = Rooms::all();
        $data = [
            'user' => $user,
            'ruangan' => $ruangan,
        ];
        return view('mahasiswa/absensi', $data);
    }

    public function view_kegiatan()
    {
        $user = Auth::user();
        $data = [
            'user' => $user,
        ];
        return view('mahasiswa/kegiatan', $data);
    }

    public function create(Request $request)
    {
        $rules = [
            'nim' => 'required',
            'room_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $messages = [
            'nim.required' => 'NIM harus diisi',
            'room_id.required' => 'Ruangan harus dipilih',
            'latitude.required' => 'Harap pilih lokasi..',
            'longitude.required' => 'Harap pilih lokasi..',
        ];

        $request->validate($rules, $messages);

        $checkLocation = $this->checkLocation($request->latitude, $request->longitude);
        if (!$checkLocation) {
            return redirect()->back()->withErrors(['Anda tidak berada di dalam area absensi!']);
        }

        Attendance::create([
            'nim' => $request->nim,
            'room_id' => $request->room_id,
            'user_id' => Auth::id(),
            'location' => $request->location,
            'coordinate' => $request->latitude . ',' . $request->longitude,
            'activity' => $request->activity,
        ]);

        return redirect()->route('mahasiswa.absensi')->with('success', 'Absensi berhasil ditambahkan!');
    }

    public function create_kegiatan(Request $request)
    {
        $rules = [
            'nim' => 'required',
            'activity' => 'required',
        ];

        $messages = [
            'nim.required' => 'NIM harus diisi',
            'activity.required' => 'Form kegiatan harus diisi',
        ];

        $request->validate($rules, $messages);

        Attendance::create([
            'user_id' => Auth::id(),
            'nim' => $request->nim,
            'is_activity' => 'T',
            'activity' => $request->activity,
        ]);

        return redirect()->route('mahasiswa.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan!');
    }
}
