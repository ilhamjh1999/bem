@extends('layouts.app')
@section('title','Kelola Pengguna')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('pengguna.create')}}" class="btn btn-success btn-block">Tambah Pengguna</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="pengguna" class="table table-bordered">
      <thead>
        <th>Nama</th>
        <th>Role</th>
        <th>email</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($pengguna as $p)
              <tr>
                <td>{{$p->name}}</td>
                <td>{{$p->role}}</td>
                <td>{{$p->email}}</td>

                <td>

                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a title="Ubah Data" href="{{route('pengguna.edit',['id' => $p->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>


                  </div>

                </td>
              </tr>
            @endforeach
          </tbody>
    </table>
  </div>
</div>
@endsection
@section('javascript')
  <script>
      $(document).ready( function () {
        $('#pengguna').DataTable();
      } );
  </script>
@endsection
