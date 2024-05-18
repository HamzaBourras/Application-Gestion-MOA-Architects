<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthentificationRequest;

class AuthentificationController extends Controller
{
    /****** Inscription ******/
    function inscrire(AuthentificationRequest $request)
    {
        try {
            User::create([
                "nom" => $request->nom,
                "prenom" => $request->prenom,
                "email" => $request->email,
                "telephone" => $request->telephone,
                "motpasse" => $request->motpasse,
                "role_id" => 2
            ]);

            return response()->json([
                "message" => "Inscription terminée avec succès"
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l\'inscription"
            ]);
        }
    }


    /****** Inscription ******/
    function connecter(AuthentificationRequest $request)
    {

        // à changer 
        $user = User::with("role")->where("email", $request->email)->first();

        if ($user->motpasse == $request->motpasse) {
            $userAuth = [
                "id" => $user->id,
                "nom" => $user->nom,
                "prenom" => $user->prenom,
                "email" => $user->email,
                "telephone" => $user->telephone,
                "role" => $user->role->nom
            ];

            return response()->json([
                "data" => $userAuth
            ]);
        } else {
            return response()->json([
                "message" => "email ou mot de passe incorrect"
            ]);
        }
    }
}