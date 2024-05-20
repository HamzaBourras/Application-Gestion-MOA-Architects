<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\AuthentificationRequest;

class AuthentificationController extends Controller
{
    /****** Inscription ******/
    function inscrire(AuthentificationRequest $request)
    {
        try {
            $user = User::create([
                "nom" => $request->nom,
                "prenom" => $request->prenom,
                "email" => $request->email,
                "telephone" => $request->telephone,
                "password" => $request->password,
                "role_id" => 2
            ]);

            return response()->json([
                "message" => "Inscription terminée avec succès"
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l\'inscription + $e"
            ]);
        }
    }


    /****** Connexion ******/
    function connecter(AuthentificationRequest $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = $request->user();
                $token = $user->createToken($request->email)->plainTextToken;
                
                $userAuth = [
                    "id" => $user->id,
                    "nom" => $user->nom,
                    "prenom" => $user->prenom,
                    "email" => $user->email,
                    "telephone" => $user->telephone,
                    "role" => $user->role->nom
                ];

                return response()->json([
                    "token" => $token,
                    "data" => $userAuth
                ]);
            } 
            
            else {
                return response()->json([
                    "errorAction" => "email ou mot de passe incorrect"
                ]);
            }
            
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la connexion + $e"
            ]);
        }
    }


    /***** Deconnexion *****/
    public function deconnecter(int $user_id) {

        PersonalAccessToken::where("tokenable_id", $user_id)->delete();
        
        return response()->json([
           "message" => "Vous avez deconnecté" 
        ]);
    }
}