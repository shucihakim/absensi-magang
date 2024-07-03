<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function lokasi_view()
    {
        $latitude = Settings::getValue('latitude');
        $longitude = Settings::getValue('longitude');
        $jarak = Settings::getValue('jarak');
        $data = [
            'latitude' => $latitude ?? '-6.9018145',
            'longitude' => $longitude ?? '107.6179723',
            'jarak' => $jarak ?? '50',
        ];
        return view('admin/lokasi', $data);
    }

    public function lokasi_update(Request $request)
    {
        $rules = [
            'latitude' => 'required',
            'longitude' => 'required',
            'jarak' => 'required',
        ];

        $messages = [
            'latitude.required' => 'Latitude harus diisi',
            'longitude.required' => 'Longitude harus diisi',
            'jarak.required' => 'Jarak harus diisi',
        ];

        $request->validate($rules, $messages);

        Settings::setValue('latitude', $request->latitude);
        Settings::setValue('longitude', $request->longitude);
        Settings::setValue('jarak', $request->jarak);

        return redirect()->route('admin.lokasi');
    }
}
