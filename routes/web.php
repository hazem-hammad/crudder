<?php

use App\Http\Controllers\Admin\AdminController as AdminsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Platform\PlatformController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Setting\SettingController;
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

Route::view('/', 'test-tailwind');

Route::prefix('/admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

// roles routes
    Route::resource('/roles', RoleController::class)->names([
        'index' => 'roles.index',
        'create' => 'roles.create',
        'store' => 'roles.store',
        'show' => 'roles.show',
        'update' => 'roles.update',
    ])->except('destroy', 'edit');

    Route::prefix('roles')->group(function () {
        Route::get('/json/datatable', [RoleController::class, 'datatable'])->name('roles.datatable');
        Route::delete('/{role}/destroy', [RoleController::class, 'delete'])->name('roles.delete');
    });

// admins routes
    Route::resource('/admins', AdminsController::class)->names([
        'index' => 'admin.admins.index',
        'create' => 'admin.admins.create',
        'store' => 'admin.admins.store',
        'show' => 'admin.admins.show',
        'update' => 'admin.admins.update',
        'destroy' => 'admin.admins.delete'
    ])->parameters(['admins' => 'admin'])->except('destroy', 'edit');

    Route::prefix('admins')->group(function () {

        Route::get('/json/datatable', [AdminsController::class, 'datatable'])->name('admin.admins.datatable');

        Route::patch('/{admin}/change-status', [AdminsController::class, 'changeStatus'])->name('admin.admins.change-status');

        Route::delete('/{admin}/destroy', [AdminsController::class, 'delete'])->name('admin.admins.delete');
    });

    // admins routes
    Route::resource('/roles', RoleController::class)->names([
        'index' => 'admin.roles.index',
        'store' => 'admin.roles.store',
        'show' => 'admin.roles.show',
        'update' => 'admin.roles.update',
        'destroy' => 'admin.roles.delete'
    ])->parameters(['roles' => 'admin'])->except('edit', 'destroy');

    Route::prefix('roles')->group(function () {

        Route::patch('/{admin}/change-status', [RoleController::class, 'changeStatus'])->name('admin.roles.change-status');

    });

    // start setting routes
    Route::prefix('settings')->group(function () {
        // update settings
        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::patch('/update', [SettingController::class, 'update'])->name('admin.settings.update');
    }); // end setting routes

});
