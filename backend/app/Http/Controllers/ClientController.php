<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaireRequest;
use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\Projet;
use App\Models\Contrat;
use App\Models\Terrain;
use App\Models\Demandes;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Models\ImagesTerrain;
use App\Http\Requests\ContratRequest;
use App\Http\Requests\DemandeRequest;
use App\Http\Requests\TerrainRequest;
use App\Http\Requests\RendezVousRequest;
use App\Models\Commentaire;

class ClientController extends Controller
{
    /********************* Demandes **************************/
    
    /***** retourner tous les demandes du client *******/
    public function indexMesDemandes( int $user_id) {
        $demaClient = Demandes::with("user", "terrain.images_terrain","contrat")->where("user_id",$user_id)->get();

        $demandesClient = [];

        foreach($demaClient as $dema) {
            $formatDema = [
                "id" => $dema->id,
                "nom_projet" => $dema->nom_projet,
                "type" => $dema->type,
                "description" => $dema->description,
                "accepte" => $dema->accepte,
                "terain_ajoute" => $dema->terain_ajoute, 
                "contrat_ajoute" => $dema->contrat_ajoute,
                "ajoute_aux_projets" => $dema->ajoute_aux_projets,
                "terrain" => $dema->terrain,
                "contrat" => $dema->contrat
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
                "contrat_ajoute" => 0,
                "ajoute_aux_projets" => 0
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

    /***** marquer une contrat vu *****/
    public function editContrat(ContratRequest $request, int $contrat_id)
    {
        try {

            Contrat::where(["id"=> $contrat_id])->update([
               "vu" => $request->vu     
            ]);

            return response()->json([
                "message" => "Le contrat est marqué vu avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de marquer le contrat vu +$e"
            ]);
        }
    }

    
    /************************************************** */
    /***** Recevoir tous mes endez-vous *****/
    public function indexRendezVous(int $user_id){
        $currentDate = Carbon::now(); 

        
        $rendezVous = RendezVous::where('user_id', $user_id)
        ->where('date', '>', $currentDate)
        ->get();
        
        $mesRendezVous = [];

        foreach ($rendezVous as $rendez) {
            $formatRendez = [
                "id" => $rendez->id,
                "date" => $rendez->date, 
            ];

            array_push($mesRendezVous,$formatRendez);
        }

        return response()->json([
            "data" => $mesRendezVous
        ]);
    }

    /***** Ajouter un rendez-vous *****/
    public function storeRendezVous(RendezVousRequest $request, int $user_id)
    {
        try {

            $rendezVous = RendezVous::all();
            $clientRendezVousTime = new DateTime($request->date);
            //vérifier si cette heure est disponible
            foreach ($rendezVous as $rendez) {
                $rendezVousTime = new DateTime($rendez->date);
                
                if($clientRendezVousTime->format('Y-m-d') == $rendezVousTime->format('Y-m-d') && $rendezVousTime->modify('+1 hour') >= $clientRendezVousTime){
                    return response()->json([
                        "errorAction" => "cette heure n'est pas disponible"
                    ]);
                }
            }
            
            RendezVous::create([
                "user_id" => $user_id,
                "date" => $request->date
            ]);
            

            return response()->json([
                "message" => "Le rendez-vous a été créé avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de création de rendez-vous +$e"
            ]);
        }
    }

    /***** Modifier la date  d'un rendez-vous *****/
    public function editRendezVous(RendezVousRequest $request, int $rendez_vous_id)
    {
        try {

            $rendezVous = RendezVous::all();
            $clientRendezVousTime = new DateTime($request->date);
            //vérifier si cette heure est disponible
            foreach ($rendezVous as $rendez) {
                $rendezVousTime = new DateTime($rendez->date);

                if ($clientRendezVousTime->format('Y-m-d') == $rendezVousTime->format('Y-m-d') &&
                 $rendezVousTime->modify('+1 hour') >= $clientRendezVousTime &&
                  $rendez->id != $rendez_vous_id) {
                    return response()->json([
                        "errorAction" => "cette heure n'est pas disponible"
                    ]);
                }
            }

            RendezVous::where("id",$rendez_vous_id)->update([
                "date" => $request->date
            ]);


            return response()->json([
                "message" => "La date de rendez-vous a été modifié avec succès"
            ]);

        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la modification du rendez-vous +$e"
            ]);
        }
    }

    /***** Supprimer un rendez-vous *****/
    public function destroyRendezVous( int $rendez_vous_id){
        try{
            RendezVous::where("id", $rendez_vous_id)->delete();

            return response()->json([
                "message" => "Rendez-vous a été supprimé avec succès"
            ]);

        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de la suppression du rendez-vous +$e"
            ]);
        }
    }


    /***** recevoir tous mes projets *****/
    public function indexMesProjets(int $user_id)
    {
        $projets = Projet::with("demandes.contrat", "demandes.terrain.images_terrain")->get();

        $tousProjets = [];

        foreach ($projets as $projet) {
            if($projet->demandes->user_id == $user_id ){
                $formatProjet = [
                    "id" => $projet->id,
                    "prix" => $projet->prix,
                    "date_termination" => $projet->date_termination,
                    "nom_projet" => $projet->demandes->nom_projet,
                    "type" => $projet->demandes->type,
                    "description" => $projet->demandes->description,
                    "termine" => $projet->termine,
                    "numero_demande" => $projet->demandes->id,
                    "numero_contrat" => $projet->demandes->contrat->id,
                    "terrain" => [
                        "adresse" => $projet->demandes->terrain->adresse,
                        "largeur" => $projet->demandes->terrain->largeur,
                        "longeur" => $projet->demandes->terrain->longeur,
                        "images_terrain" => []
                    ],
                ];

                //insertion des images du terrain
                foreach ($projet->demandes->terrain->images_terrain as $image_terrain) {
                    array_push($formatProjet["terrain"]["images_terrain"], $image_terrain->chemin);
                }

                //ajout du projet dans le tableau
                array_push($tousProjets, $formatProjet);
            }
        }

        return response()->json([
            "data" => $tousProjets
        ]);
    }


    /***** ajouter un commentaire *****/
    public function storeCommentaire(CommentaireRequest $request, int $user_id){
        try{
            Commentaire::create([
               "user_id" => $user_id,
               "text" => $request->text
                
            ]);

            return response()->json([
                "message" => "Le commentaire a été ajouter avec succès"  
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l'ajout du commentaire +$e"
            ]);
        }
    }
        
    
}