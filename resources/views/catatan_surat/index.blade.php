@extends('layouts.app')
@section('title','Kelola Catatan Surat')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('catatan_surat.create')}}" class="btn btn-success btn-block">Tambah Surat</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="surat" class="table table-bordered">
      <thead>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Tujuan Surat</th>
        <th>Tujuan Pengirim</th>
        <th>Lampiran</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($catatan_surat as $p)
              <tr>
                <td>{{$p->nama}}</td>
                <td>{{$p->jabatan}}</td>
                <td>{{$p->tujuan_surat}}</td>
                <td>{{$p->tujuan_pengirim}}</td>
                <td><a class="btn btn-primary" href="{{route('catatan_surat.download',['file' => $p->lampiran])}}">Download</a></td>

                <td>
                  <a href="{{route('catatan_surat.edit',['id' => $p->id])}}" class="btn btn-warning">EDIT</a>
                  <a href="{{route('catatan_surat.delete',['id' => $p->id])}}" onclick="return confirm('Anda ingin menghapus ini?');" class="btn btn-danger">DELETE</a>
                
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
        $('#surat').DataTable();
      } );
  </script>
@endsection
