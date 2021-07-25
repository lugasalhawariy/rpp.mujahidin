<?php

use App\Models\User;
use App\Http\Livewire\Test\Index;
// use App\Http\Livewire\Test\Create;
use App\Http\Livewire\Rpp\EditRpp;
use App\Http\Livewire\Rpp\IndexRpp;
use App\Http\Livewire\Rpp\CreateRpp;
use App\Http\Livewire\Role\IndexRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RppController;
use App\Http\Livewire\Mapel\IndexMapel;
use App\Http\Livewire\Profile\IndexProfile;
use App\Http\Livewire\Sekolah\IndexSekolah;
use App\Http\Livewire\Sekolah\CreateSekolah;
use App\Http\Controllers\AssignRolePermission;


// Route::get('/laravel', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function () {
    return view('pages.home');
});
require __DIR__.'/auth.php';

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', Index::class);
    
    Route::group(['middleware' => ['can:lihat data sekolah']], function () {
        Route::get('/sekolah', IndexSekolah::class)->name('index.sekolah');
        // Route::get('/tambah-sekolah', CreateSekolah::class)->name('create.sekolah');
    });

    Route::group(['middleware' => ['can:lihat data mapel']], function () {
        Route::get('/mapel', IndexMapel::class)->name('index.mapel');
        // Route::get('/create-rpp', CreateRpp::class)->name('create.rpp')->middleware('auth');
    });

    Route::prefix('rpp')->group(function () {

        Route::group(['middleware' => ['permission:lihat data rpp']], function () {
            Route::get('/', IndexRpp::class)->name('index.rpp');
        });

        Route::group(['middleware' => ['permission:tambah data rpp']], function () {
            Route::get('create', [RppController::class, 'create'])->name('create.rpp');
            Route::post('store', [RppController::class, 'store'])->name('store.rpp');
        });
        
        Route::group(['middleware' => ['permission:detail data rpp']], function () {
            Route::get('show/{id}', [RppController::class, 'show'])->name('show.rpp');
        });

        Route::group(['middleware' => ['permission:ubah data rpp']], function () {
            Route::get('edit/{id}', [RppController::class, 'edit'])->name('edit.rpp');
            Route::put('update/{id}', [RppController::class, 'update'])->name('update.rpp');
        });
        
        Route::group(['middleware' => ['permission:cetak data rpp']], function () {
            Route::get('pdf/{id}', [RppController::class, 'cetak'])->name('pdf.rpp');
        });
    });
    

    Route::prefix('profile')->group(function (){
        Route::get('/', IndexProfile::class)->name('index.profile');
    });

    // route superadmin (jika user login menggunakan email superadmin@gmail.com, maka)
    Route::get('superadmin', function(){
        $user = User::findOrFail(auth()->user()->id);
        if($user->email == 'superadmin@gmail.com'){
            $user->assignRole('superadmin');
            return redirect()->route('index.role');
        }else{
            abort(403);
        }
    })->name('setsuperadmin');

    Route::group(['middleware' => ['role_or_permission:superadmin|kelola user']], function () {
        Route::prefix('role-permission')->group(function(){
            Route::prefix('role')->group(function () {
                Route::get('/', IndexRole::class)->name('index.role');
                Route::get('edit/{id}', [AssignRolePermission::class, 'editRole'])->name('edit.role');
                Route::put('update/{id}', [AssignRolePermission::class, 'assignRole'])->name('update.role');
            });
            
            Route::middleware(['role:superadmin'])->group(function () {
                Route::prefix('permission')->group(function () {
                    Route::get('create-permission/{name}', [AssignRolePermission::class, 'createPermission'])->name('create.permission');
                    Route::get('edit/{id}', [AssignRolePermission::class, 'editPermission'])->name('edit.permission');
                    Route::put('update/{id}', [AssignRolePermission::class, 'assignPermission'])->name('update.permission');
                });
            });
                
        });
    });
});