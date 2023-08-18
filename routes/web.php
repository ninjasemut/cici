<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;

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

Auth::routes();
Route::group(['middleware' => ['guest']], function () {
  Route::get('/', [HomeController::class, 'index'])->name('user.home');
  Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
  Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
});

Route::group(['middleware' => ['auth']], function () {
  Route::get('/admin/home', [BookingController::class, 'home'])->name('admin.home');
  Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking.index');
  Route::resource('/admin/room', RuanganController::class);
  Route::get('/admin/room/edit/{id}', [RuanganController::class, 'edit'])->name('room.edit');
  Route::put('/admin/room/update/{id}', [RuanganController::class, 'update'])->name('room.update');
  Route::get('/admin/book/{id}/edit', [BookingController::class, 'edit'])->name('admin.book.edit');
  Route::put('/admin/book/{booking}', [BookingController::class, 'update'])->name('admin.book.update');
  Route::delete('/admin/book/{booking}', [BookingController::class, 'destroy'])->name('admin.book.destroy');
  Route::group(['prefix' => 'admin'], function () {
    Route::get('/makanan', [MakananController::class, 'index'])->name('admin.makanan.index');
    Route::get('/makanan/create', [MakananController::class, 'create'])->name('admin.makanan.create');
    Route::post('/makanan', [MakananController::class, 'store'])->name('admin.makanan.store');
    Route::get('/makanan/{makanan}/edit', [MakananController::class, 'edit'])->name('admin.makanan.edit');
    Route::put('/makanan/{makanan}', [MakananController::class, 'update'])->name('admin.makanan.update');
    Route::delete('/makanan/{makanan}', [MakananController::class, 'destroy'])->name('admin.makanan.destroy');
});

  // Route::get('/admin/report', function () {
  //   return view('pages.admin.report');
  // });
});
