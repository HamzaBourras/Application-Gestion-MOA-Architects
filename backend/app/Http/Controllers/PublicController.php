<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /************ Retourne tous les commentaires *************/
    public function indexCommentaires(){
        $commentaires = Commentaire::with("user")->get();

        $tousCommentaires = [];

        foreach($commentaires as $commentaire) {
            $formatCommen = [
                "id" => $commentaire->id,
                "text" => $commentaire->text,
                "userNom" => $commentaire->user->nom,
                "userPrenom" => $commentaire->user->prenom,
                "userEmail" => $commentaire->user->email,
                "userImage" => $commentaire->user->image    
            ];
            array_push($tousCommentaires,$formatCommen);
        }

        return response()->json([
           "data" => $tousCommentaires
        ]);
    }


    /*************** retourne tous les projets d'une type d'experience avec les images ****************/
    public function indexProjets($type_experience){
        $type_experience = substr($type_experience, 0, -1); // Élimine la dernière lettre de $type_experience
        $type_experience = strtolower($type_experience); // Convertit en minuscule

        $projets = Projet::with("demandes", "images_projet")->where('termine',1)->whereHas("demandes", function ($query) use ($type_experience) {
            $query->where("type", $type_experience);
        })->get();

        $tousProjets = [];

        foreach($projets as $projet) {
            $formatProjet = [
                "id" => $projet->id,
                "titre" => $projet->demandes->nom_projet,
                "images" => []
            ];

            foreach ($projet->images_projet as $image) {
               array_push($formatProjet["images"], $image->chemin);
            }

            array_push($tousProjets, $formatProjet);
        }
        
        return response()->json([
            "data" => $tousProjets
        ]);
    }
}