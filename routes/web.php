<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleAuth\LoginGoogleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;

// Route untuk pengguna biasa
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
Route::get('/peta', [HomeController::class, 'peta'])->name('peta');

// Route login untuk admin
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route login google user biasa
Route::get('/auth/google', [LoginGoogleController::class, 'googlepage'])->name('google.login');
Route::get('/auth/google/callback', [LoginGoogleController::class, 'googlecallback']);
Route::post('/logout-google', [LoginGoogleController::class, 'logout'])->name('logout-google');

// Route admin
Route::prefix('admin')->middleware(['auth:admin', AdminMiddleware::class, 'web'])->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/wisata', [AdminController::class, 'wisata'])->name('admin.wisata');
    Route::get('/agenda', [AdminController::class, 'agenda'])->name('admin.agenda');

    // Route untuk menampilkan form tambah admin
    Route::get('/create', [AdminController::class, 'createAdmin'])->name('admin.create');

    // Route untuk menyimpan admin baru
    Route::post('/store', [AdminController::class, 'storeAdmin'])->name('admin.store');

    Route::get('/{admin}/edit', [AdminController::class, 'editAdmin'])->name('admin.edit');

    // Route untuk menyimpan perubahan pada admin yang diedit
    Route::put('/{admin}', [AdminController::class, 'updateAdmin'])->name('admin.update');

    // Route untuk menghapus admin
    Route::delete('/{admin}', [AdminController::class, 'destroyAdmin'])->name('admin.destroy');

    // Route untuk manajemen reservasi
    Route::get('/reservasi', [AdminController::class, 'reservasiIndex'])->name('admin.reservasi.index');
    Route::get('/reservasi/create', [AdminController::class, 'reservasiCreate'])->name('admin.reservasi.create');
    Route::post('/reservasi', [AdminController::class, 'reservasiStore'])->name('admin.reservasi.store');
    Route::get('/reservasi/{id}', [AdminController::class, 'reservasiShow'])->name('admin.reservasi.show');
    Route::get('/reservasi/{id}/edit', [AdminController::class, 'reservasiEdit'])->name('admin.reservasi.edit');
    Route::put('/reservasi/{id}', [AdminController::class, 'reservasiUpdate'])->name('admin.reservasi.update');
    Route::delete('/reservasi/{id}', [AdminController::class, 'reservasiDestroy'])->name('admin.reservasi.destroy');
    Route::post('/updateStatus', [AdminController::class, 'updateStatus']);

    //Wisata Galery
    Route::post("/wisata/galery", [AdminController::class, 'unggahWisata']);
    Route::get("/wisata/galery/get", [AdminController::class, 'getDataById']);
    Route::post("/edit/wisata/{id}", [AdminController::class, 'editWisataById']);
    Route::delete("/delete/wisata/{id}", [AdminController::class, 'deleteWisataById'])->name('admin.delete.wisata');
    
    //Untuk Data Didalam FullCalendar
    Route::get("/agenda/get", [AdminController::class, 'getAgendaEvents'])->name('admin.get.agenda');

    //Pemohon
    Route::get("/pemohon", [AdminController::class, 'pemohonView']);
});

//Route Supper Admin
Route::prefix('admin')->middleware(['auth:admin', SuperAdminMiddleware::class])->group(function(){
    Route::get('/setadmin', [AdminController::class, 'setadmin'])->name('admin.setadmin');

    //Post Galery
    Route::get('/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get("/get/data", [AdminController::class, 'agendaSelesai']);
    Route::delete("/delete/agenda/{id}", [AdminController::class, 'deleteAgendaById'])->name('admin.delete.post');
    Route::post("/agenda/post", [AdminController::class, 'addGaleryAgenda'])->name('admin.post.agenda');
    
});

// Route reservasi
Route::get('/reservasi', function () {
    if (Auth::check()) {
        return redirect()->route('reservasi.form');
    }
    return view('reservasi');
})->name('reservasi');

Route::middleware('auth')->group(function () {
    Route::get('/reservasi/form', [ReservasiController::class, 'create'])->name('reservasi.form');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::get('/reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
});

// Route sukses
Route::get('/sukses', function () {
    return view('sukses');
})->name('keterangan.sukses');

Route::get('/sukses/{id}', [ReservasiController::class, 'showSuccess'])->name('keterangan.sukses.detail');
Route::get("/agenda/get", [AdminController::class, 'getAgendaEvents']);

// Route untuk role dan permission
Route::group(['prefix' => 'all', 'middleware' => ['auth']], function () {
    Route::get('/permission', [RoleController::class, 'Allpermission'])->name('all.permission');
    Route::get('/add/type', [RoleController::class, 'AddType'])->name('add.type');
    Route::post('/store/type', [RoleController::class, 'StoreType'])->name('store.type');
    Route::get('/edit/type/{id}', [RoleController::class, 'EditType'])->name('edit.type');
    Route::post('/update/type', [RoleController::class, 'UpdateType'])->name('update.type');
    Route::get('/delete/type/{id}', [RoleController::class, 'DeleteType'])->name('delete.type');
});

