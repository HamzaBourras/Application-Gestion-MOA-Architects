<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesProjet extends Model
{
    use HasFactory;

    protected $fillable = [
        "projet_id",
        "chemin"  
    ];

}