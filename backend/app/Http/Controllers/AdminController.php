<?php

namespace App\Http\Controllers;

use App\Models\Demandes;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*************** Demandes *****************/

    /***** recvoir tous les demandes *****/
    public function indexDemandes () {
        $demandes = Demandes::with("user")->get();
        
        $tousDemandes = [];

        foreach($demandes as $demande) {
            $formatDemande = [
                "id" => $demande->id,
                "nom_projet" => $demande->nom_projet,
                "type" => $demande->type,
                "description" => $demande->description,
                "accepte" => $demande->accepte,
                "terain_ajoute" => $demande->terain_ajoute,
                "userNom" => $demande->user->nom,
                "userPrenom" => $demande->user->prenom,
            ];

            array_push($tousDemandes,$formatDemande);
        }

        return response()->json([
           "data" => $tousDemandes 
        ]);
    }




    
}