<?php

use App\Mail\ContactezNousMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\resetPasswordController;
use App\Http\Controllers\AuthentificationController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// mon route pour changer le mot de passe
Route::post("/resetPasswordMy", [resetPasswordController::class, 'reset'])->name("resetPasswordMy");



Route::get('/test-envoi-email', function () {
    return view("contactezNous.contactezNous");
});