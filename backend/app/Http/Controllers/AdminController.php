<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Projet;
use App\Models\Contrat;
use App\Models\Terrain;
use App\Models\Demandes;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Http\Requests\ProjetRequest;
use App\Http\Requests\ContratRequest;
use App\Http\Requests\DemandeRequest;
use App\Http\Requests\ImagesProjetRequest;
use App\Models\ImagesProjet;

class AdminController extends Controller
{
    /*************** Demandes *****************/

    /***** recvoir tous les demandes *****/
    public function indexDemandes()
    {
        $demandes = Demandes::with("user", "terrain.images_terrain", "contrat")->get();

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
    public function changeDemandeStatut(DemandeRequest $request, int $demande_id)
    {
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
                "date_termination" => $request->date_termination,
                "termine" => 0
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
    public function indexClients()
    {
        $clients = User::where("role_id", 2)->get();

        return response()->json([
            "data" => $clients
        ]);
    }


    /***** Recevoir tous les endez-vous *****/
    public function indexRendezVous()
    {
        $currentDate = Carbon::now();


        $rendezVous = RendezVous::with("user")->where('date', '>', $currentDate)->orderBy('id', 'desc')->get();

        $tousRendezVous = [];

        foreach ($rendezVous as $rendez) {
            $formatRendez = [
                "id" => $rendez->id,
                "date" => $rendez->date,
                "user" => $rendez->user->nom . " " . $rendez->user->prenom

            ];

            array_push($tousRendezVous, $formatRendez);
        }

        return response()->json([
            "data" => $tousRendezVous
        ]);
    }


    /***** recevoir tous les projets *****/
    public function indexProjets()
    {
        $projets = Projet::with("demandes.contrat", "demandes.terrain.images_terrain")->get();

        $tousProjets = [];

        foreach ($projets as $projet) {
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

        return response()->json([
            "data" => $tousProjets
        ]);
    }


    /********************** Images */
    /**** Recevoir tous les images du projet ****/
    public function indexImages(int $projet_id)
    {
        $images = ImagesProjet::where("projet_id", $projet_id)->orderBy('id','desc')->get();

        return response()->json([
            "data" => $images
        ]);
    }

    /**** Ajouter les images au projet ****/
    public function storeImages(ImagesProjetRequest $request, int $projet_id)
    {
        try {
            $imagesRecu = $request->file("images");
            // ajout des images du terrain
            foreach ($imagesRecu as $imageR) {
                $chemin = $imageR->store('images_projet', 'public');

                ImagesProjet::create([
                    "projet_id" => $projet_id,
                    "chemin" => $chemin
                ]);
            }

            return response()->json([
                "message" => "les images ont été ajouté avec succès"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l'ajout des images +$e"
            ]);
        }
    }


    /****** marquer le projet terminé *******/
    public function marquerProjetTermine(int $projet_id){
        try{
            
            Projet::where('id',$projet_id)->update([
                "termine" => 1
            ]);

            return response()->json([
                "message" => "Projet a été marqué terminé avec succès"
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de marquer le projet Terminé +$e"
            ]);
        }
    }
}