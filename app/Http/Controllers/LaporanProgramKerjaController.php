<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramKerja;

class LaporanProgramKerjaController extends Controller
{
  public function index(){
    $program_kerja = ProgramKerja::get();
    return view('program_kerja/index')->with(['program_kerja' => $program_kerja]);
  }
  public function create(){

    return view('program_kerja/create');
  }
  public function edit($id){

    $program_kerja = ProgramKerja::where('id', $id)->firstOrFail();
    return view('program_kerja/edit')->with(['program_kerja' => $program_kerja]);
  }

  public function save(Request $request){

    $validated =  $request->validate([
                  'nama' => 'required',
                  'jabatan'  => 'required',
                  'nama_ormawa'  => 'required',
                  'nama_laporan_kegiatan'  => 'required',
                  'lampiran'  => 'nullable|mimes:doc,docx,pdf|max:10000',
               ]);
    $proposal = ProgramKerja::create($this->params($request));

    return redirect()->route('program_kerja')->with(['message_success' => 'Berhasil menambahkan data']);
  }

  public function download($file){

      $prog = ProgramKerja::where('lampiran', $file)->firstOrFail();

      //PDF file is stored under project/public/download/info.pdf
      $file= $dest_path = storage_path('app/laporan_kegiatan/').$prog->lampiran;



      return response()->download($file, $prog->lampiran);
  }

  public function update(Request $request){

    $validated = $request->validate([
                    'id' => 'required|exists:\App\Models\ProgramKerja',
                    'nama' => 'required',
                    'jabatan'  => 'required',
                    'nama_ormawa'  => 'required',
                    'nama_laporan_kegiatan'  => 'required',
                    'lampiran'  => 'nullable|mimes:doc,docx,pdf|max:10000',
               ]);
    $proposal = ProgramKerja::where('id', $request->id)->update($this->params($request));

    return redirect()->route('program_kerja')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = ProgramKerja::where('id', $id)->delete();

    return redirect()->route('program_kerja')->with(['message_success' => 'Berhasil Menghapus data']);
  }
  private function params($request)
  {
      $params = [
      'nama' => $request->nama,
      'jabatan'  => $request->jabatan,
      'nama_ormawa'  => $request->nama_ormawa,
      'nama_laporan_kegiatan'  => $request->nama_laporan_kegiatan,
    ];

      if(!empty($request->lampiran))
      {
        $params['lampiran'] = $this->fileProcessing($request,$request->lampiran);
      }
      return $params;
  }

  private function fileProcessing($request,$file)
  {
      $dest_path = storage_path('app/laporan_kegiatan/');
       if(!is_dir($dest_path)){
          mkdir($dest_path,770);
       }
      $ext =  $file->getClientOriginalExtension();
      $filename = 'LaporanKegiatan-'.date('Y-m-d').'-'.md5(time()).".".$ext;
      $file ->move($dest_path, $filename);

      return $filename;


  }


}
