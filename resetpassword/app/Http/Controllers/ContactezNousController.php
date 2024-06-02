<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Mail\ContactezNousMail;
use Illuminate\Support\Facades\Mail;

class ContactezNousController extends Controller
{
    

    public function contactezNous(Request $request){

       try{
            Mail::to("hamzabour2004@gmail.com")->send(new ContactezNousMail($request->prenom, $request->nom, $request->telephone, $request->email, $request->message));

            return response()->json([
                "message" => "votre message a été envoyé"
            ]);
       } catch (Exception $e) {
            return response()->json([
                "errorAction" => "Échec de l'envoi de message + $e"
            ]);
        }
    }
}