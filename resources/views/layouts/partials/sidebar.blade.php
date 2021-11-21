<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
  @if(auth()->user()->role != "superadmin" )
    <li class="nav-item">
      <a href="{{route('proposal')}}" class="nav-link">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
          Pengajuan Proposal
        </p>
      </a>
    </li>
    @if(auth()->user()->role == "kemahasiswaan" || auth()->user()->role == "akademik")
    <li class="nav-item">
      <a href="{{route('ruangan')}}" class="nav-link">
        <i class="nav-icon fas fa-building"></i>
        <p>
          Peminjaman Ruangan
        </p>
      </a>
    </li>
  @endif

    <li class="nav-item">
      <a href="{{route('program_kerja')}}" class="nav-link">
        <i class="nav-icon fas fa-book-open"></i>
        <p>
        Laporan Program Kerja
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('pertanggungjawaban')}}" class="nav-link">
        <i class="nav-icon fas fa-file-contract"></i>
        <p>
      Laporan Pertanggungjawaban
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('catatan_surat')}}" class="nav-link">
        <i class="nav-icon fas fa-envelope-open-text"></i>
        <p>
      Catatan Surat
        </p>
      </a>

    <li class="nav-item">
      <a href="{{route('ormawa')}}" class="nav-link">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
      Kelola ORMAWA
        </p>
      </a>
    </li>
  @endif
  @if(auth()->user()->role == "superadmin" )
    <li class="nav-item">
      <a href="{{route('pengguna')}}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
      Kelola Pengguna
        </p>
      </a>
    </li>
  @endif

</nav>
