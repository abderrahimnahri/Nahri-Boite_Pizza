<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produits;
use App\Models\commande;

class LigneCommande extends Model
{
    //
    public function commande(){
        return $this->belongsTo(commande::class);
        
    }

    public function produit(){
        return $this->belongsTo(Produits::class);
        
    }
}
