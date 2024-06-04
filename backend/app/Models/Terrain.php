<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        "adresse",
        "largeur",
        "longeur",
        "demandes_id",
        "accepte"
    ];


    public function images_terrain() {
        return $this->hasMany(ImagesTerrain::class);
    }
}