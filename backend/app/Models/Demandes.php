<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandes extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom_projet",
        "type",
        "description",
        "accepte",
        "terain_ajoute",
        "contrat_segne",
        "user_id"  
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function terrain(){
        return $this->hasOne(Terrain::class);
    }
}