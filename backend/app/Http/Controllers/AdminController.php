<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use App\Models\Demandes;
use Illuminate\Http\Request;
use App\Http\Requests\DemandeRequest;

class AdminController extends Controller
{
    /*************** Demandes *****************/

    /***** recvoir tous les demandes *****/
    public function indexDemandes()
    {
        $demandes = Demandes::with("user")->get();

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
                "userNom" => $demande->user->nom,
                "userPrenom" => $demande->user->prenom,
                "date" => $formattedDate
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
                "data" => $request->all(),
                "message" => "Statut de la demande est modifié avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la modification du statut de la demande +$e"
            ]);
        }
    }
}