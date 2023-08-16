<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvaluatorController;
use App\Http\Controllers\PersonalController;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    $evaluators = User::where("type", "evaluator")->where("status", "active")->get()->count();
    $admins = User::where("type", "admin")->where("status", "active")->get()->count();
    $personals = User::where("type", "personal")->where("status", "active")->get()->count();
    $evaluations_count = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')
            ->where('evaluations.taux', '>', 'subquery.taux_max');
    })
        ->distinct('evaluations.id_personal')
        ->count('evaluations.id_personal');
    $baisses = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')->where('evaluations.taux', '<', 'subquery.taux_max');
    })->distinct('evaluations.id_personal')->count('evaluations.id_personal');

    $constant = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')->where('evaluations.taux', '=', 'subquery.taux_max');
    })->distinct('evaluations.id_personal')->count('evaluations.id_personal');
    return view('dashboard', compact('evaluations', 'evaluators', 'admins', 'personals', 'evaluations_count', 'baisses', 'constant'));
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    if (Auth::user()->type === "personal") {

        $evaluations = Evaluation::where("id_personal", Auth::user()->id)->get();
    } else {
        $evaluations = Evaluation::all();
    }
    $evaluators = User::where("type", "evaluator")->where("status", "active")->get()->count();
    $admins = User::where("type", "admin")->where("status", "active")->get()->count();
    $personals = User::where("type", "personal")->where("status", "active")->get()->count();
    $evaluations_count = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')->where('evaluations.taux', '>', 'subquery.taux_max');
    })->distinct('evaluations.id_personal')->count('evaluations.id_personal');

    $baisses = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')->where('evaluations.taux', '<', 'subquery.taux_max');
    })->distinct('evaluations.id_personal')->count('evaluations.id_personal');

    $constant = Evaluation::join(DB::raw('(SELECT id_personal, MAX(taux) AS taux_max FROM evaluations GROUP BY id_personal) subquery'), function ($join) {
        $join->on('evaluations.id_personal', '=', 'subquery.id_personal')->where('evaluations.taux', '=', 'subquery.taux_max');
    })->distinct('evaluations.id_personal')->count('evaluations.id_personal');
    return view('dashboard', compact('evaluations', 'evaluators', 'admins', 'personals', 'evaluations_count', 'baisses', 'constant'));
})->middleware(['auth']);

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [PersonalController::class, 'index']);
    Route::get('/create', [PersonalController::class, 'create']);
    Route::post('/', [PersonalController::class, 'store']);
    Route::post('/update', [PersonalController::class, 'update_personal']);
    Route::get('/{id}', [PersonalController::class, 'show']);
    Route::put('/', [PersonalController::class, 'update']);
    Route::delete('/{id}', [PersonalController::class, 'destroy']);
    Route::get('/delete/{id}', [PersonalController::class, 'delete']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'user.type']], function () {

    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::post('/update_store', [AdminController::class, 'update']);
    Route::get('/update/{id}', [AdminController::class, 'update_form']);
    Route::get('/delete/{id}', [AdminController::class, 'destroy']);
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
    Route::get('/show/{id}', [PersonalController::class, 'show_evaluations']);
    Route::post('/', [PersonalController::class, 'register_evaluate']);
});
require __DIR__ . '/auth.php';
