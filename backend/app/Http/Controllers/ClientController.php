<?php

namespace App\Http\Controllers;

use App\Models\Demandes;
use Illuminate\Http\Request;

class ClientController extends Controller
{
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
}