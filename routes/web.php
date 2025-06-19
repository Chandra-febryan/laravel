<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TiketController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);;
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        if (auth()->user()->role === 'user') {
            return view('user.dashboard');
        }
        abort(403, 'Hanya untuk pengguna biasa.');
    })->name('user.dashboard');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
Route::get('/tiket/detail/{id}', [TiketController::class, 'detail'])->name('tiket.detail');
Route::post('/tiket/bayar/{id}', [TiketController::class, 'bayar'])->name('tiket.bayar');
Route::get('/riwayat', [TiketController::class, 'riwayat'])->name('riwayat');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // Arahkan ke halaman utama (welcome)
})->name('logout');


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');
    Route::resource('jadwal', JadwalController::class);

// Akses untuk user biasa (hanya melihat jadwal)


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::get('jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
});
});