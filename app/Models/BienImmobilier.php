<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BienImmobilier extends Model
{
    use HasFactory;



    public function categorie() :BelongsTo {
   return $this->belongsTo(Categorie::class);
    }


    public function proprietaire():BelongsTo {
        return $this->belongsTo(Proprietaire::class);
    }
}
