<?php

use App\Modules\BaseModule\Http\Controllers\BaseModuleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {

    Route::resource('base-modules', BaseModuleController::class)->names([
        'index' => 'admin.base-modules.index',
        'create' => 'admin.base-modules.create',
        'store' => 'admin.base-modules.store',
        'edit' => 'admin.base-modules.edit',
        'destroy' => 'admin.base-modules.destroy',
    ]);

    Route::prefix('base-modules')->group(function () {
        // update model
        Route::patch('/{baseModule}/update', [BaseModuleController::class, 'update'])->name('admin.base-modules.update');

        // change model status
        Route::patch('/{baseModule}/change-status', [BaseModuleController::class, 'changeStatus'])->name('admin.base-modules.change-status');

        // datatable
        Route::get('/datatable/data', [BaseModuleController::class, 'datatable'])->name('admin.base-modules.datatable');
    });

}); // end admin prefix



