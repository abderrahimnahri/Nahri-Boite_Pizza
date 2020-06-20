<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use App\commande;
use App\LigneCommande;
use Auth;
USE Session;

class CheckoutController extends Controller
{
    public function index(){
        Stripe::setApiKey('sk_test_51GqCstCx2QyytDIovBo5OI6725lT7RhfucrcfQAnOid7JhaVHr8t0plh3vowMV4LHsciJ8NvotC75Y1Y2xvKRxmy00FRIC6CXc');

        $intent = PaymentIntent::create([
            'amount' => round(Cart::subtotal())*100,
            'currency' => 'usd',
        ]);
       
        
        $clientSecret = Arr::get($intent, 'client_secret');

        return view('checkout.index', [
            'clientSecret' => $clientSecret
        ]);


    }
    public function store(Request $request)
    {
         $data = $request->json()->all();
         $order = new commande();
         $order->client_id=Auth::id();
         $order->ville=$data['ville'];
         $order->email=$data['email'];
         $order->telephone=$data['telephone'];
         $order->adresseliv=$data['adresseliv'];
         $order->save();
         
         foreach (Cart::content() as $product) {
             $lignecommande=new LigneCommande;
             $lignecomm=new LigneCommande();
             $lignecomm->commande_id=$order->id;
             $lignecomm->produit_id = $product->id;
            $lignecomm->name= $product->name;
            $lignecomm->qty = $product->qty;
            $lignecomm->prix = $product->price* $lignecomm->qty;
            
            $lignecomm->save();
           
        }
        Cart::destroy();
     

    //     $order->payment_created_at=" 2020-06-15 00:46:39";
        
        // $order->save();
        // dd($order);

        
       
        
        
        // $order = new commande();
        // $order->id=15 ;
        // $order->payment_intent_id = 19;
        //$order->amount = $data['paymentIntent']['amount'];

        // $order->payment_created_at = (new DateTime())
        //     ->setTimestamp($data['paymentIntent']['created'])
        //     ->format('Y-m-d H:i:s');
// 
//         $products = [];
//         $i = 0;
        
// $var="";
//         foreach (Cart::content() as $product) {
//             $var = 'Produit '.$i.'name'.$product->name.'prix :'.$product->price;
//                         $products[$i]['title'] = $product->name;
//             $products[$i]['price'] = $product->price;
//             $products[$i]['qty'] = $product->qty;
//             $i++;
//         }
//         $collection->implode('product', ', ');
//         dd($products);
       
       // $order->products =$products[]->implode('product', ', ');
    //    dd($order);
        
        // $order->user_id = 15;
        // $order->save();
        

        // if ($data['paymentIntent']['status'] === 'succeeded') {
        //     Cart::destroy();
        //     Session::flash('success', 'Votre commande a été traitée avec succès.');
        //     return response()->json(['success' => 'Payment Intent Succeeded']);
        // } else {
        //     return response()->json(['error' => 'Payment Intent Not Succeeded']);
        // }
    }
    public function thankyou(Request $request)
    {
        return view("checkout.thankyou");
    }
    

}
