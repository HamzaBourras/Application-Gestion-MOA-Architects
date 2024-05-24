<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesTerrain extends Model
{
    use HasFactory;

    protected $fillable = [
        "chemin",
        "terrain_id"
    ];
}