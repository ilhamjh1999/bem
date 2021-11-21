<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
  Route::prefix('backoffice')->group(function(){
    Route::prefix('proposal')->group(function(){
        Route::get('/', [App\Http\Controllers\ProposalController::class, 'index'])->name('proposal');
        Route::get('/create', [App\Http\Controllers\ProposalController::class, 'create'])->name('proposal.create');
        Route::get('/edit/{id}', [App\Http\Controllers\ProposalController::class, 'edit'])->name('proposal.edit');
        Route::post('/update', [App\Http\Controllers\ProposalController::class, 'update'])->name('proposal.update');
        Route::post('/save', [App\Http\Controllers\ProposalController::class, 'save'])->name('proposal.save');
        Route::get('/delete/{id}', [App\Http\Controllers\ProposalController::class, 'delete'])->name('proposal.delete');
        Route::get('/download/{file}', [App\Http\Controllers\ProposalController::class, 'download'])->name('proposal.download');
        Route::get('/ditolak/{id}', [App\Http\Controllers\ProposalController::class, 'ditolak'])->name('proposal.ditolak');
        Route::get('/diterima/{id}', [App\Http\Controllers\ProposalController::class, 'diterima'])->name('proposal.diterima');
    });
    Route::prefix('ruangan')->group(function(){
        Route::get('/', [App\Http\Controllers\RuanganController::class, 'index'])->name('ruangan');
        Route::get('/create', [App\Http\Controllers\RuanganController::class, 'create'])->name('ruangan.create');
        Route::get('/edit/{id}', [App\Http\Controllers\RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::post('/update', [App\Http\Controllers\RuanganController::class, 'update'])->name('ruangan.update');
        Route::post('/save', [App\Http\Controllers\RuanganController::class, 'save'])->name('ruangan.save');
        Route::get('/delete/{id}', [App\Http\Controllers\RuanganController::class, 'delete'])->name('ruangan.delete');
        Route::get('/ditolak/{id}', [App\Http\Controllers\RuanganController::class, 'ditolak'])->name('ruangan.ditolak');
        Route::get('/diterima/{id}', [App\Http\Controllers\RuanganController::class, 'diterima'])->name('ruangan.diterima');
    });
    Route::prefix('program_kerja')->group(function(){
        Route::get('/', [App\Http\Controllers\LaporanProgramKerjaController::class, 'index'])->name('program_kerja');
        Route::get('/create', [App\Http\Controllers\LaporanProgramKerjaController::class, 'create'])->name('program_kerja.create');
        Route::get('/edit/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'edit'])->name('program_kerja.edit');
        Route::post('/update', [App\Http\Controllers\LaporanProgramKerjaController::class, 'update'])->name('program_kerja.update');
        Route::post('/save', [App\Http\Controllers\LaporanProgramKerjaController::class, 'save'])->name('program_kerja.save');
        Route::get('/delete/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'delete'])->name('program_kerja.delete');
        Route::get('/download/{file}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'download'])->name('program_kerja.download');
        Route::get('/ditolak/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'ditolak'])->name('program_kerja.ditolak');
        Route::get('/diterima/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'diterima'])->name('program_kerja.diterima');
    });
    Route::prefix('pertanggungjawaban')->group(function(){
        Route::get('/', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'index'])->name('pertanggungjawaban');
        Route::get('/create', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'create'])->name('pertanggungjawaban.create');
        Route::get('/edit/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'edit'])->name('pertanggungjawaban.edit');
        Route::post('/update', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'update'])->name('pertanggungjawaban.update');
        Route::post('/save', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'save'])->name('pertanggungjawaban.save');
        Route::get('/delete/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'delete'])->name('pertanggungjawaban.delete');
        Route::get('/download/{file}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'download'])->name('pertanggungjawaban.download');
        Route::get('/ditolak/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'ditolak'])->name('pertanggungjawaban.ditolak');
        Route::get('/diterima/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'diterima'])->name('pertanggungjawaban.diterima');

    });
    Route::prefix('ormawa')->group(function(){
        Route::get('/', [App\Http\Controllers\OrmawaController::class, 'index'])->name('ormawa');
        Route::get('/create', [App\Http\Controllers\OrmawaController::class, 'create'])->name('ormawa.create');
        Route::get('/edit/{id}', [App\Http\Controllers\OrmawaController::class, 'edit'])->name('ormawa.edit');
        Route::post('/update', [App\Http\Controllers\OrmawaController::class, 'update'])->name('ormawa.update');
        Route::post('/save', [App\Http\Controllers\OrmawaController::class, 'save'])->name('ormawa.save');
        Route::get('/delete/{id}', [App\Http\Controllers\OrmawaController::class, 'delete'])->name('ormawa.delete');
    });

    Route::prefix('pengguna')->group(function(){
        Route::get('/', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna');
        Route::get('/create', [App\Http\Controllers\PenggunaController::class, 'create'])->name('pengguna.create');
        Route::get('/edit/{id}', [App\Http\Controllers\PenggunaController::class, 'edit'])->name('pengguna.edit');
        Route::post('/update', [App\Http\Controllers\PenggunaController::class, 'update'])->name('pengguna.update');
        Route::post('/save', [App\Http\Controllers\PenggunaController::class, 'save'])->name('pengguna.save');
        Route::get('/delete/{id}', [App\Http\Controllers\PenggunaController::class, 'delete'])->name('pengguna.delete');
    });
    Route::prefix('catatansurat')->group(function(){
        Route::get('/', [App\Http\Controllers\CatatanSuratController::class, 'index'])->name('catatan_surat');
        Route::get('/create', [App\Http\Controllers\CatatanSuratController::class, 'create'])->name('catatan_surat.create');
        Route::get('/edit/{id}', [App\Http\Controllers\CatatanSuratController::class, 'edit'])->name('catatan_surat.edit');
        Route::post('/update', [App\Http\Controllers\CatatanSuratController::class, 'update'])->name('catatan_surat.update');
        Route::post('/save', [App\Http\Controllers\CatatanSuratController::class, 'save'])->name('catatan_surat.save');
        Route::get('/delete/{id}', [App\Http\Controllers\CatatanSuratController::class, 'delete'])->name('catatan_surat.delete');
        Route::get('/download/{file}', [App\Http\Controllers\CatatanSuratController::class, 'download'])->name('catatan_surat.download');
    });
  });
});
