<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\PersonalController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);

Route::group(['prefix' => 'personal'], function () {

    Route::get('/', [PersonalController::class, 'index']);
    Route::get('/create', [PersonalController::class, 'create']);
    Route::post('/', [PersonalController::class, 'store']);
    Route::get('/{id}', [PersonalController::class, 'show']);
    Route::put('/{id}', [PersonalController::class, 'update']);
    Route::delete('/{id}', [PersonalController::class, 'destroy']);
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});

Route::group(['prefix' => 'evaluator'], function () {

    Route::get('/', [EvaluatorController::class, 'index']);
    Route::get('/create', [EvaluatorController::class, 'create']);
    Route::post('/', [EvaluatorController::class, 'store']);
    Route::get('/{id}', [EvaluatorController::class, 'show']);
    Route::put('/{id}', [EvaluatorController::class, 'update']);
    Route::delete('/{id}', [EvaluatorController::class, 'destroy']);
});

Route::group(['prefix' => 'evaluation'], function () {

    Route::get('/', [PersonalController::class, 'evaluation']);
    Route::get('/{id}', [PersonalController::class, 'evaluate']);
    Route::post('/', [PersonalController::class, 'register_evaluate']);
});
require __DIR__ . '/auth.php';
