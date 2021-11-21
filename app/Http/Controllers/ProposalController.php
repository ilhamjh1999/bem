<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Ormawa;

class ProposalController extends Controller
{
  public function index(){
    if(!empty( $request->id ))
    {
      $proposal = Proposal::where('id', $request->id)->get();
    } else{
        $proposal = Proposal::get();
    }
    
    $ormawa = Ormawa::get();
    return view('proposal/index')->with(['proposal' => $proposal,'ormawa' => $ormawa]);
  }
  public function create(){
      $ormawa = Ormawa::get();
    return view('proposal/create')->with(['ormawa' => $ormawa]);
  }
  public function download($file){

      $proposal = Proposal::where('lampiran', $file)->firstOrFail();

      //PDF file is stored under project/public/download/info.pdf
      $file= $dest_path = storage_path('app/proposal/').$proposal->lampiran;



      return response()->download($file, $proposal->lampiran);
  }
  public function edit($id){
    $ormawa = Ormawa::get();
    $proposal = Proposal::where('id', $id)->firstOrFail();
    return view('proposal/edit')->with(['proposal' => $proposal,'ormawa' => $ormawa]);
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

  public function diterima($id){


    $proposal = Proposal::where('id', $id)->update($this->paramAcc());

    return redirect()->route('proposal')->with(['message_success' => 'Berhasil menyutujui data']);
  }
  public function ditolak($id){


    $proposal = Proposal::where('id', $id)->update($this->paramDitolak());

    return redirect()->route('proposal')->with(['message_success' => 'Berhasil menolak data']);
  }
  private function paramAcc()
  {

    if(auth()->user()->role == "bem")
    {
      $params['status_bem'] = 'Diterima';
    }
    elseif(auth()->user()->role == "kemahasiswaan")
    {
      $params['status_kemahasiswaan'] = 'Diterima';
    }
    elseif(auth()->user()->role == "dpm")
    {
      $params['status_dpm'] = 'Diterima';
    }

    return $params;
  }
  private function paramDitolak()
  {
    if(auth()->user()->role == "bem")
    {
      $params['status_bem'] = 'Ditolak';
    }
    elseif(auth()->user()->role == "kemahasiswaan")
    {
      $params['status_kemahasiswaan'] = 'Ditolak';
    }
    elseif(auth()->user()->role == "dpm")
    {
      $params['status_dpm'] = 'Ditolak';
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
