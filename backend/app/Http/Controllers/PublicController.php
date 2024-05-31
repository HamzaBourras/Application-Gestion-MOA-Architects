<?php

namespace App\Http\Controllers;

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
}