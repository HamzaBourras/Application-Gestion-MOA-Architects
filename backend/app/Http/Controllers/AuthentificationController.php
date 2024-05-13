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
        
        $user = User::create($request->validate());

        return response()->json([
            "user" => $user,
            "message" => "inscription terminée avec success"
        ]);
    }


    
}