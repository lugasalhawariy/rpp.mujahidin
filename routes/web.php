<?php

use App\Http\Livewire\Test\Index;
use App\Http\Livewire\Rpp\EditRpp;
// use App\Http\Livewire\Test\Create;
use App\Http\Livewire\Rpp\IndexRpp;
use App\Http\Livewire\Rpp\CreateRpp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RppController;
use App\Http\Livewire\Mapel\IndexMapel;
use App\Http\Livewire\Profile\IndexProfile;
use App\Http\Livewire\Sekolah\IndexSekolah;
use App\Http\Livewire\Sekolah\CreateSekolah;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', Index::class);

Route::get('/sekolah', IndexSekolah::class)->name('index.sekolah')->middleware('auth');
// Route::get('/tambah-sekolah', CreateSekolah::class)->name('create.sekolah');

Route::get('/mapel', IndexMapel::class)->name('index.mapel')->middleware('auth');
// Route::get('/create-rpp', CreateRpp::class)->name('create.rpp')->middleware('auth');


Route::middleware('auth')->group(function () {

    Route::prefix('rpp')->group(function () {
        Route::get('/', IndexRpp::class)->name('index.rpp');
        Route::get('create', [RppController::class, 'create'])->name('create.rpp');
        Route::post('store', [RppController::class, 'store'])->name('store.rpp');
        Route::get('show/{id}', [RppController::class, 'show'])->name('show.rpp');
        Route::get('edit/{id}', [RppController::class, 'edit'])->name('edit.rpp');
        Route::put('update/{id}', [RppController::class, 'update'])->name('update.rpp');
        Route::get('pdf/{id}', [RppController::class, 'cetak'])->name('pdf.rpp');
    });
    

    Route::prefix('profile')->group(function (){
        Route::get('/', IndexProfile::class)->name('index.profile');
    });
});