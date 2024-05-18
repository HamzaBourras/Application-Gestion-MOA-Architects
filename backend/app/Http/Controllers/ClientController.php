<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Models\Demandes;
use Exception;
use Illuminate\Http\Request;
    
class ClientController extends Controller
{
    /********************* Demandes **************************/
    
    /***** retourner tous les demandes du client *******/
    public function indexMesDemandes( int $user_id) {
        $demaClient = Demandes::where("user_id",$user_id)->get();

        $demandesClient = [];

        foreach($demaClient as $dema) {
            $formatDema = [
                "id" => $dema->id,
                "nom_projet" => $dema->nom_projet,
                "type" => $dema->type,
                "description" => $dema->description,
                "accepter" => $dema->accepter,
                "terain_ajoute" => $dema->tearain_ajoute,   
            ];
            
            array_push($demandesClient,$formatDema);
        }

        return response()->json([
           "data" => $demandesClient
        ]);
    }

    /***** ajouter une demande *****/
    public function storeDemande(Request $request, int $user_id) {
        try{
            Demandes::create([
                "nom_projet" => $request->nom_projet,
                "type" => $request->type,
                "description" => $request->description,
                "accepte" => null,
                "user_id" => $user_id,
                "terain_ajoute" => 0
            ]);

            return response()->json([
               "message" => "Demande ajoutée avec succès" 
            ]);
        }
        catch(Exception $e){
            return response()->json([
                "errorAction" => "Échec de l\'ajout de la demande +$e" 
            ]);
        }

        
    }
}