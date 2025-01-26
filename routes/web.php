<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CakeController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/admin/home', [AdminController::class, 'index'])->name('adminhome');
Route::get('/admin/add-data', [AdminController::class, 'create'])->name('admin.add-data');
Route::post('/admin/store-data', [AdminController::class, 'store'])->name('admin.store-data');
Route::delete('/admin/delete-cake/{id}', [AdminController::class, 'destroy'])->name('admin.delete-cake');
Route::get('/admin/edit-cake/{id}', [AdminController::class, 'edit'])->name('admin.edit-cake');
Route::post('/admin/update-cake/{id}', [AdminController::class, 'update'])->name('admin.update-cake');
Route::get('/admin/cake-data', [AdminController::class, 'cakeData'])->name('admin.cake-data');
Route::get('/cakes/{id}', [CakeController::class, 'show'])->name('cakes.show');
Route::post('/cakes/{id}/like', [CakeController::class, 'like'])->name('cakes.like');
Route::post('/cakes/{id}/dislike', [CakeController::class, 'dislike'])->name('cakes.dislike');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

require __DIR__.'/auth.php';
