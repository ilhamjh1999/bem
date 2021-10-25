@extends('layouts.app')
@section('title','Ubah data Laporan Program Kerja')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('program_kerja.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="hidden" name="id"  value="{{$program_kerja->id}}">
        <input type="text" name="nama" value="{{$program_kerja->nama}}"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="text" name="jabatan" value="{{$program_kerja->jabatan}}" placeholder="Jabatan"  class="form-control">

      <label>Nama Ormawa</label>
      <select name="nama_ormawa" class="form-control">
        @foreach($ormawa as $o)
          <option value="{{$o->nama_ormawa}}" @if($o->nama_ormawa == $program_kerja->nama_ormawa) selected @endif>{{$o->nama_ormawa}}</option>
        @endforeach
      </select>
      <label>Nama Laporan Kegiatan</label>
      <input type="text" name="nama_laporan_kegiatan" value="{{$program_kerja->nama_laporan_kegiatan}}"  placeholder="Nama Laporan Kegiatan" class="form-control">
      <label>Lampiran<small> Harus berupa : PDF,DOC,EXCEL atau DOCX dan ukuran maksimal 10 MB</small></label>
      <input type="file"  accept="application/pdf,application/msword, application/vnd.ms-excel" name="lampiran"  class="form-control">
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')

@endsection
