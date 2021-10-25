@extends('layouts.app')
@section('title','Kelola Laporan Pertanggungjawaban')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('pertanggungjawaban.create')}}" class="btn btn-success btn-block">Tambah laporan Pertanggungjawaban</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="proposal" class="table table-bordered">
      <thead>
        <th>Nama</th>
        <th>Jabatan - ORMAWA</th>
        <th>Nama Laporan</th>
        <th>Lampiran</th>
        <th>Status</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($pertanggungjawaban as $p)
              <tr>
                <td>{{$p->nama}}</td>
                <td>{{$p->jabatan}} - {{$p->nama_ormawa}}</td>
                <td>{{$p->nama_laporan_pertanggungjawaban}}</td>
                <td><a class="btn btn-primary" href="{{route('pertanggungjawaban.download',['file' => $p->lampiran])}}">Download</a></td>
                <td>
                  @if($p->status_bem == "Diterima")
                    <span class="badge badge-success"><i class="fas fa-check"></i> BEM</span><br>
                  @elseif($p->status_bem == "Ditolak")
                    <span class="badge badge-danger"><i class="fas fa-times"></i> BEM</span><br>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-spinner fa-spin"></i> BEM</span><br>
                  @endif


                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a title="Ubah Data" href="{{route('pertanggungjawaban.edit',['id' => $p->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a  title="Hapus Data" href="{{route('pertanggungjawaban.delete',['id' => $p->id])}}" onclick="return confirm('Anda ingin menghapus ini?');" class="btn btn-danger"><i class="fas fa-trash"></i></a><br>

                  </div>
                    @if(auth()->user()->role == 'bem')
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a title="Setujui" href="{{route('pertanggungjawaban.diterima',['id' => $p->id])}}" onclick="return confirm('Anda ingin Menyetujui Ini?');" class="btn btn-success"><i class="fas fa-check"></i></a>
                    <a title="Tolak" href="{{route('pertanggungjawaban.ditolak',['id' => $p->id])}}" onclick="return confirm('Anda ingin Menolak Ini?');" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>
                  </div>
                @endif
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
        $('#proposal').DataTable();
      } );
  </script>
@endsection
