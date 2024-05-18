<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("auth/")->controller(AuthentificationController::class)->name("auth.")->group(function () {
    Route::post("inscrire", "inscrire")->name("inscrire");
    Route::post("connecter", "connecter")->name("connecter");
});


Route::prefix("client")->controller(ClientController::class)->name("client.")->group(function (){
    Route::get("index/{user_id}","indexMesDemandes")->name("indexMesDemandes");
    Route::post("store/{user_id}", "storeDemande")->name("storeDemande");
});