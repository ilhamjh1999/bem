<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatatanSurat;

class CatatanSuratController extends Controller
{
  public function index(){
    $catatan_surat = CatatanSurat::get();
    return view('catatan_surat/index')->with(['catatan_surat' => $catatan_surat]);
  }
  public function create(){

    return view('catatan_surat/create');
  }
  public function edit($id){

    $catatan_surat = CatatanSurat::where('id', $id)->firstOrFail();
    return view('catatan_surat/edit')->with(['catatan_surat' => $catatan_surat]);
  }

  public function save(Request $request){

    $validated =  $request->validate([
                  'nama' => 'required',
                  'jabatan'  => 'required',
                  'tujuan_pengirim'  => 'required',
                  'tujuan_surat'  => 'required',
                  'lampiran'  => 'nullable|mimes:doc,docx,pdf,xlsx,xls|max:10000',
               ]);
    $proposal = CatatanSurat::create($this->params($request));

    return redirect()->route('catatan_surat')->with(['message_success' => 'Berhasil menambahkan data']);
  }

  public function download($file){

      $surat = CatatanSurat::where('lampiran', $file)->firstOrFail();

      //PDF file is stored under project/public/download/info.pdf
      $file= $dest_path = storage_path('app/surat/').$surat->lampiran;



      return response()->download($file, $prog->lampiran);
  }

  public function update(Request $request){

    $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\CatatanSurat',
                    'nama' => 'required',
                    'jabatan'  => 'required',
                    'tujuan_pengirim'  => 'required',
                    'tujuan_surat'  => 'required',
                    'lampiran'  => 'nullable|mimes:doc,docx,pdf,xlsx,xls|max:10000',
               ]);
    $proposal = CatatanSurat::where('id', $request->id)->update($this->params($request));

    return redirect()->route('catatan_surat')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = CatatanSurat::where('id', $id)->delete();

    return redirect()->route('catatan_surat')->with(['message_success' => 'Berhasil Menghapus data']);
  }
  private function params($request)
  {
      $params = [
      'nama' => $request->nama,
      'jabatan'  => $request->jabatan,
      'tujuan_pengirim'  => $request->tujuan_pengirim,
      'tujuan_surat'  => $request->tujuan_surat,
    ];
      if(!empty($request->lampiran))
      {
        $params['lampiran'] = $this->fileProcessing($request,$request->lampiran);
      }
      return $params;
  }

  private function fileProcessing($request,$file)
  {
      $dest_path = storage_path('app/surat/');
       if(!is_dir($dest_path)){
          mkdir($dest_path,770);
       }
      $ext =  $file->getClientOriginalExtension();
      $filename = 'SURAT-'.date('Y-m-d').'-'.md5(time()).".".$ext;
      $file ->move($dest_path, $filename);

      return $filename;


  }


}
