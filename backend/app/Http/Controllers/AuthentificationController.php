<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AuthentificationRequest;

class AuthentificationController extends Controller
{
    /****** Inscription ******/
    function inscrire(AuthentificationRequest $request)
    {
        User::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "email" => $request->email,
            "telephone" => $request->telephone,
            "motpasse" => $request->motpasse,
            "role_id" => 2
        ]);

        return response()->json([
            "message" => "inscription terminée avec success"
        ]);
    }


    
}