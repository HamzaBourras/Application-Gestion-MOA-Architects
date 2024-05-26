<?php

use App\Http\Controllers\AdminController;
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
    Route::post("inscrire", "inscrire");
    Route::post("connecter", "connecter");
    Route::post("deconnecter/{user_id}", "deconnecter")->middleware("auth:sanctum");
});



/***************** Admin *******************/
Route::prefix("admin")->controller(AdminController::class)->middleware("auth:sanctum")->group(function () {
    Route::prefix("demandes")->group(function () {
        Route::get("index", "indexDemandes");
        Route::put("edit/{demande_id}", "changeDemandeStatut");
        Route::put("editTerrain/{terrain_id}", "changeTerrainStatut");
    });
    
    Route::prefix("contrats")->group(function () {
        Route::get("index","indexContrats");
        Route::post("store/{demande_id}", "storeContrat");
        Route::put("edit/{contrat_id}", "changeContratStatut");
    });
    
    Route::prefix("projets")->group(function () {
        Route::post("store/{demande_id}", "storeProjet");
    });

    Route::prefix("clients")->group(function () {
        Route::get("index", "indexClients");
    });
    
});


/***************** Client ******************/
Route::prefix("client")->controller(ClientController::class)->middleware("auth:sanctum")->group(function () {
    Route::prefix("mesDemandes")->group(function () {
        Route::get("index/{user_id}", "indexMesDemandes");
        Route::post("store/{user_id}", "storeDemande");
        Route::put("edit/{user_id}/{demande_id}", "editDemande");
        Route::delete("destroy/{user_id}/{demande_id}", "destroyDemande");
        Route::post("storeTerrain/{demande_id}", "storeTerrain");
        Route::put("editContrat/{contrat_id}", "editContrat");
    });
});