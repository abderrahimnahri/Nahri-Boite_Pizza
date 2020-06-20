<?php

namespace App\Http\Controllers;
use App\Models\Produits;
 use App\Models\Commantaires;


use Illuminate\Http\Request;

use Auth;
use DB;
class ProduitController extends Controller
{
    public function allproducts(){

        $products=Produits::All();

        $pizza = DB::table('categories')
                ->join('produits','category_id','=','categories.id')
                ->where('categories.nomCat','Pizza')
                ->select('produits.id','produits.nom','produits.prix','produits.imgPah','produits.remise')
                ->get();
         $boissons = DB::table('categories')
                ->join('produits','category_id','=','categories.id')
                ->where('categories.nomCat','boissons')
                ->select('produits.id','produits.nom','produits.prix','produits.imgPah','produits.remise')
                ->get();
          $salades = DB::table('categories')
                ->join('produits','category_id','=','categories.id')
                ->where('categories.nomCat','salades')
                ->select('produits.id','produits.nom','produits.prix','produits.imgPah','produits.remise')
                ->get();

        return view('menu', compact('products','pizza','boissons','salades'));
        }

    public function show($id_produt){
        $commantaires= DB::table('commantaires')
        ->join('produits','produits.id','=','commantaires.produit_id')
    ->join('clients','clients.id','=','commantaires.client_id')
    ->select('commantaires.id as comment_ID','clients.id as client_ID','commantaires.texte','clients.nom as client_nom','clients.prenom','clients.imageClient','produits.nom',
    'produits.prix','produits.remise','produits.imgPah')
    ->where('produits.id', '=', $id_produt)
    ->get();

      $userId = Auth::id();
      $product=Produits::find($id_produt);
      return view('detail_product', compact('userId', 'product','commantaires'));
     
    }
    public function createcomment($id_product,Request $request){
     $commentaire= new Commantaires();
     $commentaire->client_id=Auth::id();
     $commentaire->produit_id=$request->input("produit_id");
     $commentaire->texte=$request->input("texte");
     $commentaire->save();
     return redirect()->to('product/'.$id_product);
     
    }
    public function deletecomment($id_product,$id_comment,Request $request){
       $comment = Commantaires::find($id_comment);
       
       $comment->delete();
       return redirect()->to('product/'.$id_product);
       }
   
}
