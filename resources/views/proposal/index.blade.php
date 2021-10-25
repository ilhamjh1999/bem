@extends('layouts.app')
@section('title','Pengajuan Proposal')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="{{route('proposal.create')}}" class="btn btn-success btn-block">Tambah Pengajuan Proposal</a>
    <hr>
  </div>
  <div class="col-md-12">
    <table id="proposal" class="table table-bordered">
      <thead>
        <th>Nama</th>
        <th>jabatan</th>
        <th>Nama Proposal</th>
        <th>Lampiran</th>
        <th>Status</th>
        <th></th>
        <thead>
          <tbody>
            @foreach ($proposal as $p)
              <tr>
                <td>{{$p->nama}}</td>
                <td>{{$p->jabatan}}</td>
                <td>{{$p->nama_proposal}}</td>
                <td><a class="btn btn-primary" href="{{route('proposal.download',['file' => $p->lampiran])}}">Download</a></td>
                <td>
                  @if($p->status_bem == "Diterima")
                    <span class="badge badge-success"><i class="fas fa-check"></i> BEM</span><br>
                  @elseif($p->status_bem == "Ditolak")
                    <span class="badge badge-danger"><i class="fas fa-times"></i> BEM</span><br>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-spinner fa-spin"></i> BEM</span><br>
                  @endif

                  @if($p->status_kemahasiswaan == "Diterima")
                    <span class="badge badge-success"><i class="fas fa-check"></i> Kemahasiswaan</span><br>
                  @elseif($p->status_kemahasiswaan == "Ditolak")
                    <span class="badge badge-danger"><i class="fas fa-times"></i> Kemahasiswaan</span><br>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-spinner fa-spin"></i> Kemahasiswaan</span><br>
                  @endif

                  @if($p->status_dpm == "Diterima")
                    <span class="badge badge-success"><i class="fas fa-check"></i> DPM</span><br>
                  @elseif($p->status_dpm == "Ditolak")
                    <span class="badge badge-danger"><i class="fas fa-times"></i> DPM</span><br>
                  @else
                    <span class="badge badge-secondary"><i class="fas fa-spinner fa-spin"></i> DPM</span><br>
                  @endif

                </td>
                <td>

                  <div class="btn-group" role="group" aria-label="Basic example">
                  <a title="Ubah Data" href="{{route('proposal.edit',['id' => $p->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a  title="Hapus Data" href="{{route('proposal.delete',['id' => $p->id])}}" onclick="return confirm('Anda ingin menghapus ini?');" class="btn btn-danger"><i class="fas fa-trash"></i></a><br>

                  </div>
                  @if(auth()->user()->role != 'superadmin')
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a title="Setujui" href="{{route('proposal.diterima',['id' => $p->id])}}" onclick="return confirm('Anda ingin Menyetujui Ini?');" class="btn btn-success"><i class="fas fa-check"></i></a>
                    <a title="Tolak" href="{{route('proposal.ditolak',['id' => $p->id])}}" onclick="return confirm('Anda ingin Menolak Ini?');" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>
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
