<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanggungjawaban;

class LaporanPertanggungjawabanController extends Controller
{
  public function index(){
    $pertanggungjawaban = Pertanggungjawaban::get();
    return view('pertanggungjawaban/index')->with(['pertanggungjawaban' => $pertanggungjawaban]);
  }
  public function create(){

    return view('pertanggungjawaban/create');
  }
  public function edit($id){

    $pertanggungjawaban = Pertanggungjawaban::where('id', $id)->firstOrFail();
    return view('pertanggungjawaban/edit')->with(['pertanggungjawaban' => $pertanggungjawaban]);
  }

  public function save(Request $request){

    $validated =  $request->validate([
                  'nama' => 'required',
                  'jabatan'  => 'required',
                  'nama_ormawa'  => 'required',
                  'nama_laporan_pertanggungjawaban'  => 'required',
                  'lampiran'  => 'nullable|mimes:doc,docx,pdf|max:10000',
               ]);
    $proposal = Pertanggungjawaban::create($this->params($request));

    return redirect()->route('pertanggungjawaban')->with(['message_success' => 'Berhasil menambahkan data']);
  }

  public function download($file){

      $prog = Pertanggungjawaban::where('lampiran', $file)->firstOrFail();

      //PDF file is stored under project/public/download/info.pdf
      $file= $dest_path = storage_path('app/laporan_pertanggungjawaban/').$prog->lampiran;



      return response()->download($file, $prog->lampiran);
  }

  public function update(Request $request){

    $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\Pertanggungjawaban',
                    'nama' => 'required',
                    'jabatan'  => 'required',
                    'nama_ormawa'  => 'required',
                    'nama_laporan_pertanggungjawaban'  => 'required',
                    'lampiran'  => 'nullable|mimes:doc,docx,pdf|max:10000',
               ]);
    $proposal = Pertanggungjawaban::where('id', $request->id)->update($this->params($request));

    return redirect()->route('pertanggungjawaban')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = Pertanggungjawaban::where('id', $id)->delete();

    return redirect()->route('pertanggungjawaban')->with(['message_success' => 'Berhasil Menghapus data']);
  }
  private function params($request)
  {
      $params = [
      'nama' => $request->nama,
      'jabatan'  => $request->jabatan,
      'nama_ormawa'  => $request->nama_ormawa,
      'nama_laporan_pertanggungjawaban'  => $request->nama_laporan_pertanggungjawaban,
    ];

      if(!empty($request->lampiran))
      {
        $params['lampiran'] = $this->fileProcessing($request,$request->lampiran);
      }
      return $params;
  }

  private function fileProcessing($request,$file)
  {
      $dest_path = storage_path('app/laporan_pertanggungjawaban/');
       if(!is_dir($dest_path)){
          mkdir($dest_path,770);
       }
      $ext =  $file->getClientOriginalExtension();
      $filename = 'LaporanPertanggungjawaban-'.date('Y-m-d').'-'.md5(time()).".".$ext;
      $file ->move($dest_path, $filename);

      return $filename;


  }


}
