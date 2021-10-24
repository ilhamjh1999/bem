@extends('layouts.app')
@section('title','Tambah Pengajuan Ruangan')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('ruangan.save')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="nama"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Jabatan</label>
      @csrf
      <input type="text" name="jabatan" placeholder="Jabatan"  class="form-control">
      <label>Tujuan Pinjam Ruangan</label>
      <textarea required class="form-control" placeholder="Untuk Dipakai Rapat" name="tujuan"></textarea>
      <label>Nama Ormawa</label>
      <input type="text" name="nama_ormawa"  placeholder="Nama ORMAWA" class="form-control">
      <label>Nama Ruangan</label>
      <input type="text" name="nama_ruangan"  placeholder="Nama Ruangan" class="form-control">
      <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" class="form-control">
      <label>Mulai Pinjam</label>
        <input type="text" id="start" placeholder="00:00" name="mulai" class="form-control">
      <label>Selesai Pinjam</label>
        <input type="text" id="end" placeholder="00:00" name="selesai" class="form-control">
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
