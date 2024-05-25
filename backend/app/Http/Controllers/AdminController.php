<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use App\Models\Demandes;
use Illuminate\Http\Request;
use App\Http\Requests\DemandeRequest;
use App\Models\Terrain;

class AdminController extends Controller
{
    /*************** Demandes *****************/

    /***** recvoir tous les demandes *****/
    public function indexDemandes()
    {
        $demandes = Demandes::with("user","terrain.images_terrain")->get();

        $tousDemandes = [];
        foreach ($demandes as $demande) {
            
            $date = new DateTime($demande->created_at);
            $formattedDate = $date->format('d-m-Y H:i:s');

            $formatDemande = [
                "id" => $demande->id,
                "nom_projet" => $demande->nom_projet,
                "type" => $demande->type,
                "description" => $demande->description,
                "accepte" => $demande->accepte,
                "terain_ajoute" => $demande->terain_ajoute,
                "contrat_segne" => $demande->contrat_segne,
                "userNom" => $demande->user->nom,
                "userPrenom" => $demande->user->prenom,
                "date" => $formattedDate,
                "terrain" => $demande->terrain
                
            ];

            array_push($tousDemandes, $formatDemande);
        }

        return response()->json([
            "data" => $tousDemandes
        ]);
    }

    /***** changer le statut de la demande accepter/refuser *****/
    public function changeDemandeStatut(DemandeRequest $request, int $demande_id) {
        try {
            Demandes::where("id", $demande_id)->update([
                "accepte" => $request->statut
            ]);

            return response()->json([
                "message" => "Statut de la demande est modifié avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la modification du statut de la demande +$e"
            ]);
        }
    }


    /***** changer le statut du terrain accepter/refuser *****/
    public function changeTerrainStatut(DemandeRequest $request, int $terrain_id)
    {
        try {
            Terrain::where("id", $terrain_id)->update([
                "accepte" => $request->statut
            ]);

            return response()->json([
                "message" => "Statut du terrain est modifié avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la modification du statut du terrain +$e"
            ]);
        }
    }
}