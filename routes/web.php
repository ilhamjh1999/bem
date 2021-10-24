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
    return view('welcome');
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
    });
    Route::prefix('ruangan')->group(function(){
        Route::get('/', [App\Http\Controllers\RuanganController::class, 'index'])->name('ruangan');
        Route::get('/create', [App\Http\Controllers\RuanganController::class, 'create'])->name('ruangan.create');
        Route::get('/edit/{id}', [App\Http\Controllers\RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::post('/update', [App\Http\Controllers\RuanganController::class, 'update'])->name('ruangan.update');
        Route::post('/save', [App\Http\Controllers\RuanganController::class, 'save'])->name('ruangan.save');
        Route::get('/delete/{id}', [App\Http\Controllers\RuanganController::class, 'delete'])->name('ruangan.delete');
    });
    Route::prefix('program_kerja')->group(function(){
        Route::get('/', [App\Http\Controllers\LaporanProgramKerjaController::class, 'index'])->name('program_kerja');
        Route::get('/create', [App\Http\Controllers\LaporanProgramKerjaController::class, 'create'])->name('program_kerja.create');
        Route::get('/edit/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'edit'])->name('program_kerja.edit');
        Route::post('/update', [App\Http\Controllers\LaporanProgramKerjaController::class, 'update'])->name('program_kerja.update');
        Route::post('/save', [App\Http\Controllers\LaporanProgramKerjaController::class, 'save'])->name('program_kerja.save');
        Route::get('/delete/{id}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'delete'])->name('program_kerja.delete');
        Route::get('/download/{file}', [App\Http\Controllers\LaporanProgramKerjaController::class, 'download'])->name('program_kerja.download');
    });
    Route::prefix('pertanggungjawaban')->group(function(){
        Route::get('/', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'index'])->name('pertanggungjawaban');
        Route::get('/create', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'create'])->name('pertanggungjawaban.create');
        Route::get('/edit/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'edit'])->name('pertanggungjawaban.edit');
        Route::post('/update', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'update'])->name('pertanggungjawaban.update');
        Route::post('/save', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'save'])->name('pertanggungjawaban.save');
        Route::get('/delete/{id}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'delete'])->name('pertanggungjawaban.delete');
        Route::get('/download/{file}', [App\Http\Controllers\LaporanPertanggungjawabanController::class, 'download'])->name('pertanggungjawaban.download');
    });
  });
});
