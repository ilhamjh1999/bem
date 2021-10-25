@extends('layouts.app')
@section('title','Ubah data Pengajuan proposal')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('proposal.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="nama" value="{{$proposal->nama}}"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="hidden" name="id" value="{{$proposal->id}}" >
      <input type="text" name="jabatan" value="{{$proposal->jabatan}}" placeholder="Jabatan"  class="form-control">
      <label>Nama Proposal</label>
      <input type="text" name="nama_proposal" value="{{$proposal->nama_proposal}}"  placeholder="Nama Proposal" class="form-control">
      <label>Nama Ormawa</label>
      <select name="nama_ormawa" class="form-control">
        @foreach($ormawa as $o)
          <option value="{{$o->nama_ormawa}}" @if($o->nama_ormawa == $proposal->nama_ormawa) selected @endif>{{$o->nama_ormawa}}</option>
        @endforeach
      </select>
      <label>Lampiran<small> Harus berupa : PDF,DOC,atau DOCX dan ukuran maksimal 10 MB</small></label>
      <input type="file"  accept="application/pdf,application/msword, application/vnd.ms-excel" name="lampiran"  class="form-control">
      <span class="badge badge-info">Kosongkan lampiran jika tidak ingin mengubah</span>
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')

@endsection
