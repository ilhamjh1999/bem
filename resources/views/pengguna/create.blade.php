@extends('layouts.app')
@section('title','Tambah Pengguna')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('pengguna.save')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" name="name"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Role</label>
      @csrf
    <select name="role" class="form-control">
      <option value="superadmin">Superadmin</option>
      <option value="kemahasiswaan">Kemahasiswaan</option>
      <option value="bem">BEM</option>
      <option value="dpm">DPM</option>
      <option value="akademik">Akademik</option>
      <option value="ormawa">ORMAWA</option>
    </select>
    <label>Email</label>
    <input type="email" name="email"  placeholder="cth: tomoe@gmail.com" class="form-control">
    <label>Password</label>
    <input type="password" name="password"  placeholder="min: 8 karakter" class="form-control">
    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation"  placeholder="min: 8 karakter" class="form-control">
    <hr>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
    </div>
  </div>
@endsection
@section('javascript')

@endsection
