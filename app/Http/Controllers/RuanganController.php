<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
  public function index(){
    if(!empty( $request->id ))
    {
      $ruangan = Ruangan::where('id', $request->id)->get();
    } else{
        $ruangan = Ruangan::get();
    }
    return view('ruangan/index')->with(['ruangan' => $ruangan]);
  }
  public function create(){

    return view('ruangan/create');
  }
  public function edit($id){

    $ruangan = Ruangan::where('id', $id)->firstOrFail();
    return view('ruangan/edit')->with(['ruangan' => $ruangan]);
  }

  public function save(Request $request){

    $validated =  $request->validate([
                    'nama' => 'required',
                    'jabatan'  => 'required',
                    'nama_ormawa'  => 'required',
                    'tujuan'  => 'required',
                    'nama_ruangan'  => 'required',
                    'tanggal_pinjam'  => 'required|date',
                    'mulai'  =>'required',
                    'selesai' => 'required'
               ]);
    $proposal = Ruangan::create($this->params($request));

    return redirect()->route('ruangan')->with(['message_success' => 'Berhasil menambahkan data']);
  }

  public function update(Request $request){

    $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\Ruangan',
                    'nama' => 'required',
                    'jabatan'  => 'required',
                    'nama_ormawa'  => 'required',
                    'tujuan'  => 'required',
                    'nama_ruangan'  => 'required',
                    'tanggal_pinjam'  => 'required|date',
                    'mulai'  =>'required',
                    'selesai' => 'required'
               ]);
    $proposal = Ruangan::where('id', $request->id)->update($this->params($request));

    return redirect()->route('ruangan')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = Ruangan::where('id', $id)->delete();

    return redirect()->route('ruangan')->with(['message_success' => 'Berhasil Menghapus data']);
  }

  public function diterima($id){


    $proposal = Ruangan::where('id', $id)->update($this->paramAcc());

    return redirect()->route('ruangan')->with(['message_success' => 'Berhasil menyutujui data']);
  }
  public function ditolak($id){


    $proposal = Ruangan::where('id', $id)->update($this->paramDitolak());

    return redirect()->route('ruangan')->with(['message_success' => 'Berhasil menolak data']);
  }
  private function paramAcc()
  {

    if(auth()->user()->role == "akademik")
    {
      $params['status_akademik'] = 'Diterima';
    }
    elseif(auth()->user()->role == "kemahasiswaan")
    {
      $params['status_kemahasiswaan'] = 'Diterima';
    }

    return $params;
  }
  private function paramDitolak()
  {
    if(auth()->user()->role == "akademik")
    {
      $params['status_akademik'] = 'Ditolak';
    }
    elseif(auth()->user()->role == "kemahasiswaan")
    {
      $params['status_kemahasiswaan'] = 'Diterima';
    }

    return $params;
  }
  private function params($request)
  {
      $params = [
      'nama' => $request->nama,
      'jabatan'  => $request->jabatan,
      'nama_ormawa'  => $request->nama_ormawa,
      'tujuan'  => $request->tujuan,
      'nama_ruangan'  => $request->nama_ruangan,
      'tanggal_pinjam'  => $request->tanggal_pinjam,
      'mulai'  => $request->mulai,
      'selesai' => $request->selesai
    ];


      return $params;
  }


}
