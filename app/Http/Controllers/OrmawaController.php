<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormawa;

class OrmawaController extends Controller
{
  public function index(){
    $ormawa = Ormawa::get();
    return view('ormawa/index')->with(['ormawa' => $ormawa]);
  }
  public function create(){

    return view('ormawa/create');
  }
  public function edit($id){

    $ormawa = Ormawa::where('id', $id)->firstOrFail();
    return view('ormawa/edit')->with(['ormawa' => $ormawa]);
  }

  public function save(Request $request){

    $validated =  $request->validate([
                  'nama_ormawa'  => 'required',
               ]);
    $proposal = Ormawa::create($this->params($request));

    return redirect()->route('ormawa')->with(['message_success' => 'Berhasil menambahkan data']);
  }


  public function update(Request $request){

    $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\Pertanggungjawaban',
                    'nama_ormawa'  => 'required',
               ]);
    $proposal = Ormawa::where('id', $request->id)->update($this->params($request));

    return redirect()->route('ormawa')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = Ormawa::where('id', $id)->delete();

    return redirect()->route('ormawa')->with(['message_success' => 'Berhasil Menghapus data']);
  }


  private function params($request)
  {
      $params = [
      'nama_ormawa'  => $request->nama_ormawa,
    ];


      return $params;
  }



}
