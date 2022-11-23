<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Company/Dashboard');
})->name('dashboard');


//admin routes
Route::name('admin.')->prefix('admin')->group(function(){
    //admin login
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'handleLogin'])->name('login');
    Route::middleware('admin_auth')->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::controller(\App\Http\Controllers\Admin\CompanyController::class)->name('company.')->prefix('company')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
        });
    });
});




//company routes

//Company login register routes
Route::get('/company/login', [\App\Http\Controllers\Company\AuthController::class, 'login'])->name('company.login');
Route::post('/company/login', [\App\Http\Controllers\Company\AuthController::class, 'handleLogin'])->name('company.login');
Route::get('/company/register', [\App\Http\Controllers\Company\AuthController::class, 'register'])->name('company.register');
Route::post('/company/register', [\App\Http\Controllers\Company\AuthController::class, 'handleRegister'])->name('company.register');



Route::middleware('company_auth')->name('company.')->prefix('company/')->group(function() {
    Route::get('/dashboard',\App\Http\Controllers\Company\DashboardController::class)->name('dashboard');

    Route::name('group.')->prefix('group')->controller(\App\Http\Controllers\Company\GroupController::class)->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{group:slug}','edit')->name('edit');
        Route::get('/{group:slug}','show')->name('show');
        Route::patch('/update/{group:slug}','update')->name('update');
        Route::delete('/delete/{group:slug}','destroy')->name('destroy');
    });
//    Subgroup
    Route::name('subgroup.')->prefix('subgroup')->controller(\App\Http\Controllers\Company\SubgroupController::class)->group(function() {
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/{subgroup:slug}','show')->name('show');
        Route::get('/edit/{subgroup:slug}','edit')->name('edit');
        Route::patch('/update/{subgroup:slug}','update')->name('update');
        Route::delete('/delete/{subgroup:slug}','destroy')->name('destroy');
    });
//    members
    Route::name('member.')->prefix('member')->controller(\App\Http\Controllers\Company\MemberController::class)->group(function() {
        Route::get('/','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/{member}','show')->name('show');
        Route::get('/edit/{member:slug}','edit')->name('edit');
        Route::patch('/update/{member}','update')->name('update');
        Route::delete('/delete/{member}','destroy')->name('destroy');
    });

    Route::name('attendance.')->prefix('attendance')->controller(\App\Http\Controllers\Company\AttendanceController::class)->group(function() {
        Route::get('/{subgroup:slug}','index')->name('index');
        Route::post('/store','store')->name('store');
        Route::get('/{attendance}','show')->name('show');
        Route::get('/edit/{attendance}','edit')->name('edit');
        Route::patch('/update/{attendance}','update')->name('update');
        Route::delete('/delete/{attendance}','destroy')->name('destroy');
    });
    Route::name('calender.')->prefix('calender')->controller(\App\Http\Controllers\CalenderController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{calender}', 'destroy')->name('destroy');
    });

});
