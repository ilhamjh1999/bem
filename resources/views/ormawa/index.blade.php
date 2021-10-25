@extends('layouts.app')
@section('title','Kelola ORMAWA')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('ormawa.create')}}" class="btn btn-success btn-block">Tambah ORMAWA</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="ruangan" class="table table-bordered">
      <thead>
        <th>Nama ORMAWA</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($ormawa as $p)
              <tr>
                <td>{{$p->nama_ormawa}}</td>


                <td>

                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a title="Ubah Data" href="{{route('ormawa.edit',['id' => $p->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a  title="Hapus Data" href="{{route('ormawa.delete',['id' => $p->id])}}" onclick="return confirm('Anda ingin menghapus ini?');" class="btn btn-danger"><i class="fas fa-trash"></i></a><br>

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
        $('#ruangan').DataTable();
      } );
  </script>
@endsection
