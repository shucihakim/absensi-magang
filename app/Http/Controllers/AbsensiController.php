<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rooms;
use App\Models\Settings;
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

    public function distance($lat1, $lon1, $lat2, $lon2, $dist) {
        $radius = 6371000; // Earth's radius in meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        $distance = $radius * $c;
        return $distance <= $dist;
    }

    public function checkLocation($latitude, $longitude) {
        $place_latitude = Settings::getValue('latitude');
        $place_longitude = Settings::getValue('longitude');
        $place_distance = Settings::getValue('jarak');

        $jarak = $this->distance($latitude, $longitude, $place_latitude, $place_longitude, $place_distance);

        return $jarak;
    }

    public function create(Request $request) {
        $rules = [
            'nim' => 'required',
            'room_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'activity' => 'required',
        ];

        $messages = [
            'nim.required' => 'NIM harus diisi',
            'room_id.required' => 'Ruangan harus dipilih',
            'latitude.required' => 'Harap pilih lokasi..',
            'longitude.required' => 'Harap pilih lokasi..',
            'activity.required' => 'Activity harus diisi',
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
}
