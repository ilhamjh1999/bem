@extends('layouts.app')
@section('title','Ubah Pengguna')
@section('content')
  <div class="row">

    <div class="col-md-12">
      <form action="{{route('pengguna.update')}}" method="POST" enctype="multipart/form-data">
        <label>Nama</label>
        <input type="text" value="{{$d->name}}" name="name"  placeholder="cth: Tomoe Gozen" class="form-control">
      <label>Role</label>
      @csrf
      <input type="hidden" name="id" value="{{$d->id}}">
    <select name="role" class="form-control">
      <option value="superadmin" {{$d->role=="superadmin" ? "selected":null}}>Superadmin</option>
      <option value="kemahasiswaan" {{$d->role=="kemahasiswaan" ? "selected":null}}>Kemahasiswaan</option>
      <option value="bem" {{$d->role=="bem" ? "selected":null}}>BEM</option>
      <option value="dpm" {{$d->role=="dpm" ? "selected":null}}>DPM</option>
      <option value="akademik" {{$d->role=="akademik" ? "selected":null}}>Akademik</option>
      <option value="ormawa" {{$d->role=="ormawa" ? "selected":null}}>ORMAWA</option>
    </select>
    <label>Email</label>
    <input type="email" value="{{$d->email}}" name="email"  placeholder="cth: tomoe@gmail.com" class="form-control">
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
