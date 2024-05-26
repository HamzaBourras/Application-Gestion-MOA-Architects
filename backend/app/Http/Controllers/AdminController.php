<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use App\Models\Contrat;
use App\Models\Terrain;
use App\Models\Demandes;
use Illuminate\Http\Request;
use App\Http\Requests\ContratRequest;
use App\Http\Requests\DemandeRequest;
use App\Http\Requests\ProjetRequest;
use App\Models\Projet;
use App\Models\User;

class AdminController extends Controller
{
    /*************** Demandes *****************/

    /***** recvoir tous les demandes *****/
    public function indexDemandes()
    {
        $demandes = Demandes::with("user","terrain.images_terrain","contrat")->get();

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
                "contrat_ajoute" => $demande->contrat_ajoute,
                "ajoute_aux_projets" => $demande->ajoute_aux_projets,
                "userNom" => $demande->user->nom,
                "userPrenom" => $demande->user->prenom,
                "date" => $formattedDate,
                "terrain" => $demande->terrain,
                "contrat" => $demande->contrat
                
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


     /***** ajouter une contrat *****/
    public function storeContrat(ContratRequest $request, int $demande_id)
    {
        try {
            Contrat::create([
                "date" => $request->date,
                "demandes_id" => $demande_id,
                "segne" => 0,
                "vu" => 0
            ]);

            Demandes::where(["id" => $demande_id])->update([
                "contrat_ajoute" => 1
            ]);

            return response()->json([
                "message" => "Contrat ajouté avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l'ajoout du contrat' +$e"
            ]);
        }
    }


    /***** changer le statut du contrat c-à-d marquer qui est segné *****/
    public function changeContratStatut(ContratRequest $request, int $contrat_id)
    {
        try {
            Contrat::where("id", $contrat_id)->update([
                "segne" => $request->statut
            ]);

            return response()->json([
                "message" => "le contrat est segné avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la signature du contrat +$e"
            ]);
        }
    }


    /***** changer le statut du contrat c-à-d marquer qui est segné *****/
    public function storeProjet(ProjetRequest $request, int $demande_id)
    {
        try {
            
            Projet::create([
                "demandes_id" => $demande_id,
                "prix" => $request->prix,
                "date_termination" => $request->date_termination
            ]);

            Demandes::where(["id" => $demande_id])->update([
                "ajoute_aux_projets" => 1
            ]);

            return response()->json([
                "message" => "la demande est ajouté aux projets avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l'ajout de la demande aux projets +$e"
            ]);
        }
    }



    /***** recvoir tous les contrats *****/
    public function indexContrats()
    {
        $contrats = Contrat::get();

        $tousContrats = [];
        foreach ($contrats as $contrat) {

            $formatContrat = [
                "id" => $contrat->id,
                "date" => $contrat->date,
                "segne" => $contrat->segne,
                "vu" => $contrat->vu,
                "demande_id" => $contrat->demandes_id

            ];

            array_push($tousContrats, $formatContrat);
        }

        return response()->json([
            "data" => $tousContrats
        ]);
    }


    /***** recvoir tous les clients *****/
    public function indexClients(){
        $clients = User::where("role_id",2)->get();

        return response()->json([
            "data" => $clients
        ]);
        
    }
    


    
}