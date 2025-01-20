<?php

use App\Http\Controllers\ModuleController;
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

Route::get('/', function () {
  return redirect()->route('modules.index');
})->name('home');

// Route::resource('modules', ModuleController::class)
//      ->name('index', 'modules.index')
//      ->name('create', 'modules.create')
//      ->name('store', 'modules.store')
//      ->name('edit', 'modules.edit')
//      ->name('update', 'modules.update')
//      ->name('destroy', 'modules.destroy');

Route::prefix('modules')->group(function () {
  Route::get('/factory', [ModuleController::class, 'factory'])
      ->name('modules.factory');

  Route::get('/delete', [ModuleController::class, 'delete'])
      ->name('modules.delete');

  Route::get('/', [ModuleController::class, 'index'])
       ->name('modules.index');

  Route::get('/create', [ModuleController::class, 'create'])
       ->name('modules.create');

  Route::post('/', [ModuleController::class, 'store'])
       ->name('modules.store');

  Route::prefix('/{module}')->group(function () {
    // Route::get('/', [ModuleController::class, 'show'])
    //      ->name('modules.show');

    Route::get('/edit', [ModuleController::class, 'edit'])
         ->name('modules.edit');

    Route::post('/', [ModuleController::class, 'update'])
         ->name('modules.update');

    Route::get('/', [ModuleController::class, 'destroy'])
         ->name('modules.destroy');
  });


});
