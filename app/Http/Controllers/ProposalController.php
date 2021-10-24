<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
  public function index(){
    $proposal = Proposal::get();
    return view('proposal/index')->with(['proposal' => $proposal]);
  }
  public function create(){

    return view('proposal/create');
  }
  public function download($file){

      $proposal = Proposal::where('lampiran', $file)->firstOrFail();

      //PDF file is stored under project/public/download/info.pdf
      $file= $dest_path = storage_path('app/proposal/').$proposal->lampiran;



      return response()->download($file, $proposal->lampiran);
  }
  public function edit($id){

    $proposal = Proposal::where('id', $id)->firstOrFail();
    return view('proposal/edit')->with(['proposal' => $proposal]);
  }

  public function save(Request $request){

    $validated = $request->validate([
                'jabatan' => 'required',
                'nama_proposal' => 'required',
                'nama' => 'required',
                'nama_ormawa' => 'required',
                'lampiran' => 'required|mimes:doc,docx,pdf',
               ]);
    $proposal = Proposal::create($this->params($request));

    return redirect()->route('proposal')->with(['message_success' => 'Berhasil menambahkan data']);
  }

  public function update(Request $request){

    $validated = $request->validate([
                'id' => 'required|exists:\App\Models\Proposal,id',
                'jabatan' => 'required',
                'nama_proposal' => 'required',
                'nama' => 'required',
                'nama_ormawa' => 'required',
                'lampiran' => 'nullable|mimes:doc,docx,pdf|max:10000',
               ]);
    $proposal = Proposal::where('id', $request->id)->update($this->params($request));

    return redirect()->route('proposal')->with(['message_success' => 'Berhasil mengubah data']);
  }


  public function delete($id){

    $proposal = Proposal::where('id', $id)->delete();

    return redirect()->route('proposal')->with(['message_success' => 'Berhasil Menghapus data']);
  }
  private function params($request)
  {
      $params = ['jabatan' => $request->jabatan,'nama' => $request->nama,'nama_proposal' => $request->nama_proposal,'nama_ormawa' => $request->nama_ormawa];

      if(!empty($request->lampiran))
      {
        $params['lampiran'] = $this->fileProcessing($request,$request->lampiran);
      }


      return $params;
  }

  private function fileProcessing($request,$file)
  {
      $dest_path = storage_path('app/proposal/');
       if(!is_dir($dest_path)){
          mkdir($dest_path,770);
       }
      $ext =  $file->getClientOriginalExtension();
      $filename = 'PROPOSAL-'.date('Y-m-d').'-'.md5(time()).".".$ext;
      $file ->move($dest_path, $filename);

      return $filename;


  }
}
