@extends('layouts.app')
@section('title','Peminjaman ruangan')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('ruangan.create')}}" class="btn btn-success btn-block">Pinjam Ruangan</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="ruangan" class="table table-bordered">
      <thead>
        <th>Nama</th>
        <th>jabatan</th>
        <th>Tujuan</th>
        <th>Tanggal dan waktu</th>
        <th>Status</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($ruangan as $p)
              <tr>
                <td>{{$p->nama}}</td>
                <td>{{$p->jabatan}}</td>
                <td>{{$p->tujuan}}</td>
                <td>{{$p->tanggal_pinjam}}
                  <br>
                  {{$p->mulai}}-{{$p->selesai}}
                </td>
                <td>

                  @if($p->status_kemahasiswaan == "Diterima")
                    <span class="badge badge-success"><i class="fas fa-check"></i> Kemahasiswaan</span><br>
                  @elseif($p->status_kemahasiswaan == "Ditolak")
                    <span class="badge badge-danger"><i class="fas fa-times"></i> Kemahasiswaan</span><br>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-spinner fa-spin"></i> Kemahasiswaan</span><br>
                  @endif

                </td>
                <td>
                  <a href="{{route('ruangan.edit',['id' => $p->id])}}" class="btn btn-warning">EDIT</a>
                  <a href="{{route('ruangan.delete',['id' => $p->id])}}" onclick="return confirm('Anda ingin menghapus ini?');" class="btn btn-danger">DELETE</a>
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
