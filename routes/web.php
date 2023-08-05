<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\PersonalController;
use App\Models\evaluation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()->type === "personal") {

        $evaluations = Evaluation::where("id_personal", Auth::user()->id)->get();
    } else {
        $evaluations = Evaluation::all();
    }
    $evaluators = User::where("type", "evaluator")->get()->count();
    $admins = User::where("type", "admin")->get()->count();
    $personals = User::where("type", "personal")->get()->count();
    $evaluations_count = Evaluation::all()->count();
    return view('dashboard', compact('evaluations', 'evaluators', 'admins', 'personals', 'evaluations_count'));
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    if (Auth::user()->type === "personal") {

        $evaluations = Evaluation::where("id_personal", Auth::user()->id)->get();
    } else {
        $evaluations = Evaluation::all();
    }
    $evaluators = User::where("type", "evaluator")->get()->count();
    $admins = User::where("type", "admin")->get()->count();
    $personals = User::where("type", "personal")->get()->count();
    $evaluations_count = Evaluation::all()->count();
    return view('dashboard', compact('evaluations', 'evaluators', 'admins', 'personals', 'evaluations_count'));
})->middleware(['auth']);

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [PersonalController::class, 'index']);
    Route::get('/create', [PersonalController::class, 'create']);
    Route::post('/', [PersonalController::class, 'store']);
    Route::get('/{id}', [PersonalController::class, 'show']);
    Route::put('/', [PersonalController::class, 'update']);
    Route::delete('/{id}', [PersonalController::class, 'destroy']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});

Route::group(['prefix' => 'evaluator', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [EvaluatorController::class, 'index']);
    Route::get('/create', [EvaluatorController::class, 'create']);
    Route::post('/', [EvaluatorController::class, 'store']);
    Route::get('/{id}', [EvaluatorController::class, 'show']);
    Route::put('/{id}', [EvaluatorController::class, 'update']);
    Route::delete('/{id}', [EvaluatorController::class, 'destroy']);
});

Route::group(['prefix' => 'evaluation', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [PersonalController::class, 'evaluation']);
    Route::get('/{id}', [PersonalController::class, 'evaluate']);
    Route::post('/', [PersonalController::class, 'register_evaluate']);
});
require __DIR__ . '/auth.php';
