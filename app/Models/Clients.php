<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Clients extends Authenticatable
{
    use Notifiable;
    use CrudTrait;

  
   
    protected $table = 'clients';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom','email', 'login','motdepasse','adresse','imageClient'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $hidden = [
       'motdepasse', 'remember_token',
   ];


   public function getAuthPassword()
   {
     return $this->motdepasse;
   }

   public function produit(){
    return $this->belongsToMany('App\Models\Produits');
          }
          
   public function comments(){
    return $this->hasMany(Commentaires::class);
  }

  public function commandes(){
    return $this->hasMany('App\commande');
  }

}
