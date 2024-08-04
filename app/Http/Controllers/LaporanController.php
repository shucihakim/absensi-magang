<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // Laporan Kegiatan Admin
    public function laporanKegiatan_Admin()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        $laporan = $laporan->filter(function ($item) {
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            return !empty($text);
        });
        return view('admin/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran admin
    public function laporanKehadiran_Admin()
    {
        $laporan = Attendance::with('user')->with('room')->where('is_activity', 'F')->get();
        $coor = [
            'latitude' => Settings::getValue('latitude'),
            'longitude' => Settings::getValue('longitude')
        ];
        $laporan = $laporan->map(function ($item) use ($coor) {
            // check activity
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            if (empty($text)) {
                $text = "-";
            }
            $item->activity = $text;
            // distance calculation
            $lat1 = explode(',', $item->coordinate)[0];
            $lon1 = explode(',', $item->coordinate)[1];
            $distance = $this->calculateDistance($lat1, $lon1, $coor['latitude'], $coor['longitude']);
            $item->distance = $this->formatDistance($distance);
            return $item;
        });
        return view('admin/laporan_kehadiran', ['laporan' => $laporan]);
    }
    // laporan kegiatan pembimbing
    public function laporanKegiatan_pembimbing()
    {
        $laporan = Attendance::with('user')->with('room')->get();
        $laporan = $laporan->filter(function ($item) {
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            return !empty($text);
        });
        return view('pembimbing/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran pembimnbing
    public function laporanKehadiran_pembimbing()
    {
        $laporan = Attendance::with('user')->with('room')->where('is_activity', 'F')->get();
        $coor = [
            'latitude' => Settings::getValue('latitude'),
            'longitude' => Settings::getValue('longitude')
        ];
        $laporan = $laporan->map(function ($item) use ($coor) {
            // check activity
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            if (empty($text)) {
                $text = "-";
            }
            $item->activity = $text;
            // distance calculation
            $lat1 = explode(',', $item->coordinate)[0];
            $lon1 = explode(',', $item->coordinate)[1];
            $distance = $this->calculateDistance($lat1, $lon1, $coor['latitude'], $coor['longitude']);
            $item->distance = $this->formatDistance($distance);
            return $item;
        });
        return view('pembimbing/laporan_kehadiran', ['laporan' => $laporan]);
    }

    // laporan kegiatan mahasiswa
    public function laporanKegiatan_mahasiswa()
    {
        $laporan = Attendance::where('user_id', Auth::id())->with('user')->with('room')->get();
        $laporan = $laporan->filter(function ($item) {
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            return !empty($text);
        });
        return view('mahasiswa/laporan_kegiatan', ['laporan' => $laporan]);
    }

    // laporan kehadiran mahasiswa
    public function laporanKehadiran_mahasiswa()
    {
        $laporan = Attendance::where('user_id', Auth::id())->with('user')->with('room')->where('is_activity', 'F')->get();
        $coor = [
            'latitude' => Settings::getValue('latitude'),
            'longitude' => Settings::getValue('longitude')
        ];
        $laporan = $laporan->map(function ($item) use ($coor) {
            // check activity
            $dom = new \DOMDocument();
            $dom->loadHTML($item->activity ?? '<p></p>');
            $text = $dom->textContent;
            if (empty($text)) {
                $text = "-";
            }
            $item->activity = $text;
            // distance calculation
            $lat1 = explode(',', $item->coordinate)[0];
            $lon1 = explode(',', $item->coordinate)[1];
            $distance = $this->calculateDistance($lat1, $lon1, $coor['latitude'], $coor['longitude']);
            $item->distance = $this->formatDistance($distance);
            return $item;
        });
        return view('mahasiswa/laporan_kehadiran', ['laporan' => $laporan]);
    }
}
