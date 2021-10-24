@extends('layouts.app')
@section('title','Tambah Laporan Program Kerja')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('program_kerja.save')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="nama"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="text" name="jabatan" placeholder="Jabatan"  class="form-control">

      <label>Nama Ormawa</label>
      <input type="text" name="nama_ormawa"  placeholder="Nama ORMAWA" class="form-control">
      <label>Nama Laporan Kegiatan</label>
      <input type="text" name="nama_laporan_kegiatan"  placeholder="Nama Laporan Kegiatan" class="form-control">
      <label>Lampiran<small> Harus berupa : PDF,DOC,atau DOCX dan ukuran maksimal 10 MB</small></label>
      <input type="file" name="lampiran"  class="form-control">
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')

@endsection
