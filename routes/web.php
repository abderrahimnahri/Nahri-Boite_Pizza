<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'ProduitController@allproducts')->name('home');
    Route::get('product/{id}', 'ProduitController@show');
    Route::get('product/{id}/comment', 'ProduitController@createcomment');
    Route::get('/panier','CartController@index')->name('cart.index');
    Route::post('/panier/ajouter','CartController@store')->name('cart.store');
    
    Route::get('/videPanier', function(){
    Cart::destroy();
    return redirect("/panier");
    });
    
    Route::delete('/penier/{id}', 'CartController@destroy')->name('cart.destroy');
    Route::get('product/{idproduit}/deletecomment/{idcomment}', 'ProduitController@deletecomment');
    Route::get('/menu', 'ProduitController@allproducts');
    //checkout route
    Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
    Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
    Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankYou');

});


