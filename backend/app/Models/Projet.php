<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
      "demandes_id",
      "prix",
      "date_termination",
      "termine"  
    ];

    public function demandes(){
      return $this->belongsTo(Demandes::class);
    }

  public function images_projet()
  {
    return $this->hasMany(ImagesProjet::class);
  }
}