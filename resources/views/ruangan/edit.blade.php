@extends('layouts.app')
@section('title','Ubah data Pengajuan ruangan')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('ruangan.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="hidden" name="id" value="{{$ruangan->id}}"  >
        <input type="text" name="nama" value="{{$ruangan->nama}}"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="text" name="jabatan" value="{{$ruangan->jabatan}}" placeholder="Jabatan"  class="form-control">
      <label>Tujuan Pinjam Ruangan</label>
      <textarea required class="form-control" value="" placeholder="Untuk Dipakai Rapat" name="tujuan">{{$ruangan->tujuan}}</textarea>
      <label>Nama Ormawa</label>
      <input type="text" name="nama_ormawa" value="{{$ruangan->nama_ormawa}}"  placeholder="Nama ORMAWA" class="form-control">
      <label>Nama Ruangan</label>
      <input type="text" name="nama_ruangan" value="{{$ruangan->nama_ruangan}}"  placeholder="Nama Ruangan" class="form-control">
      <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" value="{{$ruangan->tanggal_pinjam}}" class="form-control">
      <label>Mulai Pinjam</label>
        <input type="text" id="start" value="{{$ruangan->mulai}}" placeholder="00:00" name="mulai" class="form-control">
      <label>Selesai Pinjam</label>
        <input type="text" id="end" value="{{$ruangan->selesai}}" placeholder="00:00" name="selesai" class="form-control">
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')
  <script>
  $('#start').timepicker({ 'timeFormat': 'H:i' });
  $('#end').timepicker({ 'timeFormat': 'H:i' });
  </script>
@endsection
