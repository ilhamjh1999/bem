<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class PenggunaController extends Controller
{
    public function index()
    {
      $user = User::all();
        return view('pengguna.index')->with(['pengguna' => $user]);
    }
    public function edit($id)
    {
        $data = User::where('id',$id)->firstOrFail();
        return view('pengguna.edit')->with(['d' => $data]);
    }
    public function create(Request $request)
    {

        return view('pengguna.create');
    }
    public function save(Request $request)
    {
        $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:\App\Models\User,email',
                    'role' => 'required|in:superadmin,bem,akademik,dpm,kemahasiswaan',
                    'password' => 'required|min:6|confirmed',
                        ]);
        User::create($this->params($request));
        return redirect()->route('pengguna')->with(['message_success' => 'Berhasil Menambah pengguna.']);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\User,id',
                    'name' => 'required',
                    'email' => 'required|email|unique:\App\Models\User,email,'.$request->id,
                    'role' => 'required|in:superadmin,bem,akademik,dpm,kemahasiswaan',
                    'password' => 'nullable|min:6|confirmed',
                        ]);
        User::where('id',$request->id)->update($this->params($request));
        return redirect()->route('pengguna')->with(['message_success' => 'Berhasil Mengubah data pengguna.']);
    }
    public function banned(Request $request)
    {
       $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\User,id',
                        ]);
        User::where('id',$request->id)->update(['disabled' => true]);
        return redirect()->route('pengguna')->with(['message_success' => 'Berhasil menonaktifkan pengguna.']);
    }

    public function active(Request $request)
    {
       $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\User,id',
                        ]);
        User::where('id',$request->id)->update(['disabled' => false]);
        return redirect()->route('pengguna')->with(['message_success' => 'Berhasil menonaktifkan pengguna.']);
    }

    private function params($request)
    {
        $params = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                ];
        if(!empty($request->password))
        {
            $params['password'] =  Hash::make($request->password);
        }
        return $params;
    }

}
