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
use App\Http\Livewire\Silabus\IndexSilabus;
use App\Http\Livewire\Sekolah\CreateSekolah;
use App\Http\Controllers\AssignRolePermission;
use App\Http\Livewire\Notification\IndexNotification;


// Route::get('/laravel', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function () {
    return view('pages.home');
});

require __DIR__.'/auth.php';


// Bisa dimasuki jika sudah login dan terverifikasi.
Route::middleware('auth', 'verified')->group(function () {
    Route::group(['middleware' => ['can:notification']], function () {
        Route::get('/notification', IndexNotification::class)->name('index.notif');
    });

    Route::get('/silabus', IndexSilabus::class)->name('index.silabus');

    Route::get('/dashboard', Index::class)->name('dashboard');
    
    // bisa diakses jika ada izin lihat sekolah (spatie)
    Route::group(['middleware' => ['can:lihat-sekolah']], function () {
        Route::get('/sekolah', IndexSekolah::class)->name('index.sekolah');
    });

    // bisa diakses jika ada izin lihat mapel (spatie)
    Route::group(['middleware' => ['can:lihat-mapel']], function () {
        Route::get('/mapel', IndexMapel::class)->name('index.mapel');
    });

    // Route table RPP
    Route::prefix('rpp')->group(function () {

        // bisa dimasuki jika ada izin lihat rpp
        Route::group(['middleware' => ['permission:lihat-rpp']], function () {
            Route::get('/', IndexRpp::class)->name('index.rpp');
        });

        // bisa diakses jika role user memiliki izin tambah rpp
        Route::group(['middleware' => ['permission:tambah-rpp']], function () {
            Route::get('create', [RppController::class, 'create'])->name('create.rpp');
            Route::post('store', [RppController::class, 'store'])->name('store.rpp');
        });
        
        // bisa diakses jika role user memiliki izin melihat detail rpp
        Route::group(['middleware' => ['permission:detail-rpp']], function () {
            Route::get('show/{id}', [RppController::class, 'show'])->name('show.rpp');
        });

        // bisa diakses jika role user memiliki izin untuk mengubah rpp
        Route::group(['middleware' => ['permission:ubah-rpp']], function () {
            Route::get('edit/{id}', [RppController::class, 'edit'])->name('edit.rpp');
            Route::put('update/{id}', [RppController::class, 'update'])->name('update.rpp');
        });
        
        // bisa diakses jika role user memiliki izin untuk cetak rpp
        Route::group(['middleware' => ['permission:cetak-rpp']], function () {
            Route::get('pdf/{id}', [RppController::class, 'cetak'])->name('pdf.rpp');
        });
    });

    // route superadmin (jika user login menggunakan email sekolahmuhammadiyahgk@gmail.com, maka...
    // User dapat mengakses route dibawah ini.
    Route::get('superadmin', function(){
        $user = User::findOrFail(auth()->user()->id);
        if($user->email == 'sekolahmuhammadiyahgk@gmail.com'){
            $user->assignRole('superadmin');
            return redirect()->route('index.role');
        }else{
            abort(403);
        }
    })->name('setsuperadmin');

    // Jika user memiliki role superadmin/rolenya memiliki izin kelola user, maka... 
    // User dapat mengelola role permission pada route.
    Route::group(['middleware' => ['role_or_permission:superadmin|kelola-user']], function () {
        Route::prefix('role-permission')->group(function(){
            Route::prefix('role')->group(function () {
                Route::get('/', IndexRole::class)->name('index.role');
                Route::get('edit/{id}', [AssignRolePermission::class, 'editRole'])->name('edit.role');
                Route::put('update/{id}', [AssignRolePermission::class, 'assignRole'])->name('update.role');
            });
            
            Route::middleware(['role:superadmin'])->group(function () {
                Route::prefix('permission')->group(function () {
                    Route::get('create-permission/{name}', [AssignRolePermission::class, 'createPermissionGroup'])->name('create.permission');
                    Route::get('create-permission-single/{name}', [AssignRolePermission::class, 'createPermissionSingle'])->name('create.permission');
                    Route::get('edit/{id}', [AssignRolePermission::class, 'editPermission'])->name('edit.permission');
                    Route::put('update/{id}', [AssignRolePermission::class, 'assignPermission'])->name('update.permission');
                });
            });
        });
    });
});