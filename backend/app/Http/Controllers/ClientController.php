<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Http\Requests\TerrainRequest;
use App\Models\Demandes;
use App\Models\ImagesTerrain;
use App\Models\Terrain;
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
                "accepte" => $dema->accepte,
                "terain_ajoute" => $dema->terain_ajoute, 
                "contrat_segne" => $dema->contrat_segne
            ];
            
            array_push($demandesClient,$formatDema);
        }

        return response()->json([
           "data" => $demandesClient
        ]);
    }

    /***** ajouter une demande *****/
    public function storeDemande(DemandeRequest $request, int $user_id) {
        try{
            Demandes::create([
                "nom_projet" => $request->nom_projet,
                "type" => $request->type,
                "description" => $request->description,
                "accepte" => null,
                "user_id" => $user_id,
                "terain_ajoute" => 0,
                "contrat_segne" => 0
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

    /***** modifier une demande *****/
    public function editDemande(DemandeRequest $request, int $user_id, int $demande_id) {
        try {
            Demandes::where(["id"=>$demande_id, "user_id" => $user_id])->update([
                "nom_projet" => $request->nom_projet,
                "type" => $request->type,
                "description" => $request->description,
            ]);

            return response()->json([
                "message" => "Demande modifié avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la modification de la demande +$e"
            ]);
        }
    }

    /***** supprimer une demande *****/
    public function destroyDemande(int $user_id, int $demande_id)
    {
        
        try {
            Demandes::where(["id" => $demande_id, "user_id" => $user_id])->delete();

            return response()->json([
                "message" => "Demande supprimé avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la suppression de la demande +$e"
            ]);
        }
    }


    /***** ajouter le terrain à une demande *****/
    public function storeTerrain(TerrainRequest $request, int $demande_id){
        try {

            $terrainCree = Terrain::create([
                "adresse" => $request->adresse,
                "largeur"=> $request->largeur,
                "longeur"=> $request->longeur,
                "demandes_id" => $demande_id 
            ]);

            $imagesRecu = $request->file("images");
            // ajout des images du terrain
            foreach ($imagesRecu as $imageR) {
                $chemin = $imageR->store('images_terrain', 'public');
                
                ImagesTerrain::create([
                    "terrain_id" => $terrainCree->id,
                    "chemin" => $chemin
                ]);
            }

            //changer le champ terain_ajoute dans la table demandes
            Demandes::where(["id" => $demande_id])->update(["terain_ajoute" => 1]); 

            return response()->json([
                "message" => "Terrain ajoutée avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l\'ajout du terrain +$e"
            ]);
        }
    }



    
}