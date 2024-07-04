<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function view(){
        $penggunas = User::all();
        return view('admin/pengguna', ['penggunas' => $penggunas]);
    }

    public function create(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Pembimbing,Peserta',
        ];
        $message = [
            'name.required' => 'Form nama masih kosong',
            'email.required' => 'Form email masih kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Form password masih kosong',
            'role.required' => 'Form role masih kosong',
            'role.in' => 'Role tidak valid',
        ];

        $request->validate($rules, $message);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function update(Request $request) {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'role' => 'required|in:Admin,Pembimbing,Peserta',
        ];
        $message = [
            'name.required' => 'Form nama masih kosong',
            'email.required' => 'Form email masih kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Form role masih kosong',
            'role.in' => 'Role tidak valid',
        ];

        if ($request->password) {
            $rules['password'] = 'required|min:6';
            $message['password.required'] = 'Form password masih kosong';
        }

        $request->validate($rules, $message);

        $update_data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->password) {
            $update_data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->id)->update($update_data);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diubah!');
    }

    public function delete(Request $request) {
        User::where('id', $request->id)->delete();
        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus!');
    }
}
