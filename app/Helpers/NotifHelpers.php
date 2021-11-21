<?php
namespace App\Helpers;

use App\Models\Pertanggungjawaban;
use App\Models\ProgramKerja;
use App\Models\Proposal;
use App\Models\Ruangan;
use App\Models\CatatanSurat;

class NotifHelpers {
  public static function countNotif()
  {
    $calc = self::countProposal() + self::countLapPertanggungjawaban() + self::countLapKegiatan() + self::countRuangan();

    return $calc;
  }

  public static function countLapKegiatan()
  {
    if(auth()->user()->role == 'bem')
    {
        $count = ProgramKerja::where('status_bem', 'menunggu')->count();
    } elseif(auth()->user()->role == 'kemahasiswaan')
    {
        $count = ProgramKerja::where('status_kemahasiswaan', 'menunggu')->count();
    } elseif(auth()->user()->role == 'dpm')
    {
        $count = ProgramKerja::where('status_dpm', 'menunggu')->count();
    } else{
        $count = 0;
    }

    return $count;
  }

  public static function countLapPertanggungjawaban()
  {
    if(auth()->user()->role == 'bem')
    {
      $count = Pertanggungjawaban::where('status_bem', 'menunggu')->count();
    } else{
      $count = 0;
    }
      return $count;

  }

  public static function countProposal()
  {
    if(auth()->user()->role == 'bem')
    {
        $count = Proposal::where('status_bem', 'menunggu')->count();
    } elseif(auth()->user()->role == 'kemahasiswaan')
    {
        $count = Proposal::where('status_kemahasiswaan', 'menunggu')->count();
    } elseif(auth()->user()->role == 'dpm')
    {
        $count = Proposal::where('status_dpm', 'menunggu')->count();
    } else{
        $count = 0;
    }

    return $count;
  }

  public static function countRuangan()
  {
    if(auth()->user()->role == 'kemahasiswaan')
    {
        $count = Proposal::where('status_kemahasiswaan', 'menunggu')->count();
    } elseif(auth()->user()->role == 'akademik')
    {
        $count = Proposal::where('status_akademik', 'menunggu')->count();
    } else{
        $count = 0;
    }

    return $count;
  }

  public static function showLapKegiatan()
  {
    if(auth()->user()->role == 'bem')
    {
        $results = ProgramKerja::where('status_bem', 'menunggu')->get();
    } elseif(auth()->user()->role == 'kemahasiswaan')
    {
        $results = ProgramKerja::where('status_kemahasiswaan', 'menunggu')->get();
    } elseif(auth()->user()->role == 'dpm')
    {
        $results = ProgramKerja::where('status_dpm', 'menunggu')->get();
    } else{
        $results = [];
    }

    return $results;
  }

  public static function showLapPertanggungjawaban()
  {
    if(auth()->user()->role == 'bem')
    {
      $results = Pertanggungjawaban::where('status_bem', 'menunggu')->get();
    } else{
      $results = [];
    }
    return $results;
  }

  public static function showProposal()
  {
    if(auth()->user()->role == 'bem')
    {
        $results = Proposal::where('status_bem', 'menunggu')->get();
    } elseif(auth()->user()->role == 'kemahasiswaan')
    {
        $results = Proposal::where('status_kemahasiswaan', 'menunggu')->get();
    } elseif(auth()->user()->role == 'dpm')
    {
        $results = Proposal::where('status_dpm', 'menunggu')->get();
    } else{
        $results = [];
    }

    return $results;
  }

  public static function showRuangan()
  {
    if(auth()->user()->role == 'kemahasiswaan')
    {
        $results = Proposal::where('status_kemahasiswaan', 'menunggu')->get();
    } elseif(auth()->user()->role == 'akademik')
    {
        $results = Proposal::where('status_akademik', 'menunggu')->get();
    } else{
        $results = [];
    }

    return $results;
  }

  public static function showSuratKeluar()
  {

  }

}
