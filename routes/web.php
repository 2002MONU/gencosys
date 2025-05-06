<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardPageController;
use App\Http\Controllers\Admin\LoginPageController;
use App\Http\Controllers\Website\RegisterController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [RegisterController::class, 'step1'])->name('register.step1');
Route::post('/step1', [RegisterController::class, 'storeStep1'])->name('register.storeStep1');
Route::get('/step2', [RegisterController::class, 'step2'])->name('register.step2');
Route::post('/step2', [RegisterController::class, 'storeStep2'])->name('register.storeStep2');
Route::get('/confirmation', [RegisterController::class, 'confirmation'])->name('register.confirmation');
Route::post('/submit', [RegisterController::class, 'submit'])->name('register.submit');
Route::get('/success/{id?}', [RegisterController::class, 'success'])->name('register.success');


Route::group(['prefix' => 'admin'], function (){
    Route::get('login', [LoginPageController::class, 'login'])->name('admin.login');
    Route::post('login-post', [LoginPageController::class, 'loginPost'])->name('admin.post-login');
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/dashboard', [DashboardPageController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [LoginPageController::class, 'logout'])->name('admin.logout');
        Route::get('change-passoword', [ChangePasswordController::class, 'changePassword'])->name('admin.change-password');
        Route::post('change-passoword-post', [ChangePasswordController::class, 'changePasswordPost'])->name('admin.change-password-post');
        Route::get('admin-logs', [LoginPageController::class, 'adminLogs'])->name('admin.logs-details');
      // courses
        Route::resource('courses',CourseController::class); 
        Route::get('registerStudent', [DashboardPageController::class, 'registerStudent'])->name('registerStudent');
        Route::get('/students/export', [DashboardPageController::class, 'export'])->name('students.export');
    });
});
