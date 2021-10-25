@extends('layouts.app')
@section('title','Ubah data ORMAWA')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('ormawa.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="hidden" name="id" value="{{$ormawa->id}}"  >

      @csrf

      <label>Nama Ormawa</label>
      <input type="text" name="nama_ormawa" value="{{$ormawa->nama_ormawa}}"  placeholder="Nama ORMAWA" class="form-control">

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
