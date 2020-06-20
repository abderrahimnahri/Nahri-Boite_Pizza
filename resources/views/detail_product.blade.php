
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<!------ Include the above in your HEAD tag ---------->


@extends('layouts.app')

@section('content')
    <body >
 
     

<div class="container">
   
    <div class="container" >
        <div class="row" >
           <div class="col-xs-6 item-photo" >
           <img style="max-width:100%;" src="{{$product->imgPah }}" />
            </div>
            <div class="col-6" style="border:0px solid gray">
                <!-- Datos del vendedor y titulo del producto -->
                <h3 class="bg-warning">{{ $product->nom }}</h3>    
    
                <!-- Precios -->
                <h3 class="title-price bg-danger">Prix </h3>
                <h3 style="margin-top:0px;" class='text-danger'> {{ $product->prix }} DH</h3>
    
                <!-- Detalles especificos del producto -->
                <h3 class="title-price bg-success">Remise </h3>
                <h3 style="margin-top:0px;" class='text-success'> {{ $product->remise }} %</h3>
                
              
                <!-- Botones de compra -->
                <form action="{{route('cart.store')}}" method="Post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    

                <button type="submit" class="btn btn-success">Ajouter au Panier </button>
            </form>	                                       
            </div>                              
    
      
        </div>
    </div>  
   
    <div class="col-10">    
                
        <form action="/product/{{$product->id}}/comment" action="post">
            @csrf
        <div class="form-group">
            <input id="prodId" name="produit_id" type="hidden" value=" {{ $product->id }}">
            
            <textarea class="form-control" placeholder="Ajouter un Commentaire"name ="texte" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Ajouter') }}
        </button>
        </form>
</div>
    <div class="row">
    <div class="col-sm-12">
        <h3>Les Commentaires sur le produit</h3>
    
    @foreach ($commantaires as $commentaire)
    
    </div><!-- /col-sm-12 -->
    </div><!-- /row -->
    
    <div class="row">
    <div class="col-sm-1">
    <div class="thumbnail">
    <img class="img-responsive user-photo" style='width:70px;
    height:70px;' src="{{$commentaire->imageClient}}">
    </div><!-- /thumbnail -->
    </div><!-- /col-sm-1 -->
    
    <div class="col-sm-5">
    <div class="panel panel-default">
    <div class="panel-heading text-primary">
    <strong>{{$commentaire->client_nom}}&ensp; {{$commentaire->prenom}}</strong> 
    </div>
    <div class="panel-body card-header">
    {{$commentaire->texte}}
    @if ($userId ==$commentaire->client_ID)

    <div > <a href="/product/{{$product->id}}/deletecomment/{{$commentaire->comment_ID}}"> <div class='text-danger'>Delete</div> </a></div>
    @endif
    </div><!-- /panel-body -->
    </div><!-- /panel panel-default -->
    <br>
    </div><!-- /col-sm-5 -->
   
    <div class="col-sm-1">
        
    @endforeach
</form>
                        </p>
                       
                    </div>
                </div>		
            </div>
        </div>
    </div>
</div>
@endsection


