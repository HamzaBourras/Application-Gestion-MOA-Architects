<?php

use App\Http\Controllers\AuthentificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix("auth/")->controller(AuthentificationController::class)->name("auth.")->group(function (){
   Route::post("inscrire","inscrire")->name("inscrire"); 
});