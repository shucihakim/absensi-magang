<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /*
        ADMIN
    */
    public function list() {
        $rooms = Rooms::all();
        $data = [
            'rooms' => $rooms,
        ];
        return view('admin/ruangan', $data);
    }

    public function create(Request $request) {
        $rules = [
            'name' => 'required|unique:rooms,name',
        ];

        $messages = [
            'name.required' => 'Nama ruangan harus diisi',
            'name.unique' => 'Nama ruangan sudah ada',
        ];

        $request->validate($rules, $messages);

        Rooms::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.ruangan');
    }

    public function update(Request $request) {
        $rules = [
            'name' => 'required|unique:rooms,name',
        ];

        $messages = [
            'name.required' => 'Nama ruangan harus diisi',
            'name.unique' => 'Nama ruangan sudah ada',
        ];

        $request->validate($rules, $messages);

        Rooms::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.ruangan');
    }

    public function delete(Request $request) {
        Rooms::where('id', $request->id)->delete();
        return redirect()->route('admin.ruangan');
    }
}
