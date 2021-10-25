@extends('layouts.app')
@section('title','Ubah data Laporan Pertanggungjawaban')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('catatan_surat.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
          <input type="hidden" name="id"  value="{{$catatan_surat->id}}">
        <input type="text" name="nama" value="{{$catatan_surat->nama}}"   placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="text" name="jabatan" value="{{$catatan_surat->jabatan}}"  placeholder="Jabatan"  class="form-control">

      <label>Tujuan</label>
      <input type="text" name="tujuan_surat"  value="{{$catatan_surat->tujuan_surat}}"  placeholder="Tujuan Surat" class="form-control">
      <label>Tujuan Pengirim</label>
      <input type="text" name="tujuan_pengirim" value="{{$catatan_surat->tujuan_pengirim}}"  placeholder="Tujuan Pengirim" class="form-control">
      <label>Lampiran<small> Harus berupa : DF,DOC,EXCEL atau DOCX dan ukuran maksimal 10 MB</small></label>
      <input type="file"  accept="application/pdf,application/msword, application/vnd.ms-excel"  name="lampiran"  class="form-control">
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')

@endsection
