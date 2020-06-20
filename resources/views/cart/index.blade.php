
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
    <title>Document</title>
</head>
@extends('layouts.app')

@section('content')
<section style="background-image: url(images/bg_3.jpg);">  
<div class="">
        <!-- For demo purpose -->
        <div class="container text-white py-5 text-center">
          <h1 class="display-4 text-white bg-dark">Votre Panier</h1>
          <p class="lead mb-0"> </p>
          <p class="lead"> <a href="https://bootstrapious.com/snippets" class="text-white font-italic">
                  <u></u></a>
          </p>
        </div>
        <!-- End -->
      
        <div class="pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
      
                <!-- Shopping cart table -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="border-0 bg-light">
                          <div class="p-2 px-3 text-uppercase">Product</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Remove</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      
                     @foreach (Cart::content() as $product)
                     <tr>
                      
                      <?php 
                      
                      $image =  App\Models\Produits::find($product->id)->imgPah ;
                     
                      ?>
                        <th scope="row" class="border-0">
                          <div class="p-2">
                          <img src="{{$image}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle">
                              <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">
                                  </a></h5><span class="text-muted font-weight-normal font-italic d-block">{{$product->name}}</span>
                            </div>
                          </div>
                        </th>
                        <td class="border-0 align-middle"><strong>{{$product->price}} DH</strong></td>
                        <td class="border-0 align-middle"><strong>{{$product->qty}}</strong></td>
                        <td>
                    <form action="{{Route('cart.destroy',$product->rowId)}}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-dark"> <i class="fa fa-trash"></i>  </button>

                        </form>
                    </td>
                    <td>
                      </tr> 
                     @endforeach
                     <tr><td><strong class="text-muted">Le total</td> <td>{{Cart::subtotal()}}  DH</td> <td><td></td></td></strong><tr>
                    </td><td>  

                      <a href="/videPanier"> Vider votre Panier  </a>
                    </td>
                    </tbody>
                  </table>
                <a href="{{route('checkout.index')}}">
                  <button type="button" class="btn btn-success">Passer a la Caisse</button></a>
                </div>
                <!-- End -->
              </div>
            </div>
      
        
      
          </div>
      
      </div>
    </section>
      @endsection

<style>
body {
    background: black;
   
    background: linear-gradient(to right, #050300, #ef629f);
    
  }
</style>
