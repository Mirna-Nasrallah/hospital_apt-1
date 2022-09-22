<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\reservationController;
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
// Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
// Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

// Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
// Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

// Route::get('/admin/dashboard',function(){
//     return view('admin');
// })->middleware('auth:admin');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/', function () {
            return view('admin.admin');
        })->name('adminDashboard');

    });
    Route::get('todayAppointments', function () {
        return view('admin.todayAdmin');
    })->name('todayAdmin');
});

Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/reservation',[reservationController::class,'create'])->name('open.reservation');
Route::post('/makeReservation',[reservationController::class,'store'])->name('make.reservation');
Route::get('/viewAppointments',[reservationController::class,'index'])->name('view.appointments');
Route::get('destroy.apt/{id}',[reservationController::class,'destroy'])->name('destroy.apt');
Route::get('edit.apt/{id}',[reservationController::class,'edit'])->name('edit.apt');
Route::post('update.apt/{id}',[reservationController::class,'update'])->name('update.apt');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
