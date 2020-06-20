<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    //
    public $timestamps = false;
    public function client()
    {
        return $this->belongsTo('App\Model\Clients');
    }
}
