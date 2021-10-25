@extends('layouts.app')
@section('title','Tambah ORMAWA')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('ormawa.save')}}" method="POST" enctype="multipart/form-data">

      @csrf

      <label>Nama Ormawa</label>
      <input type="text" name="nama_ormawa"  placeholder="Nama ORMAWA" class="form-control">

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
