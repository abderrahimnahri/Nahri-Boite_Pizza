
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">


</head>
@extends('layouts.app')

@section('content')

	<!-- END nav -->
	@if (session('success'))
   
	<div class="alert alert-success">
		{{session('success')}}
	</div>
	@endif

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
	</section>

    
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Menu</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
      </div>
      @foreach ($products as $product)
      @if ($loop->first)
    	<div class="container-wrap">
    		<div class="row no-gutters d-flex">
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url({{ $product->imgPah }});"></a>
    					<div class="text p-4">
    						<h3>{{ $product->nom }}</h3>
							<p class='text-danger'>Remise : {{$product->remise}} %</p>
							
							<p class="price"><span>&nbsp {{ $product->prix }} DH</span>
							
								<form action="{{route('cart.store')}}" method="Post">
									@csrf
									<input type="hidden" name="product_id" value="{{ $product->id }}">
									

								<button type="submit" class="btn btn-success">Ajouter au Panier </button>
							</form>	 
							&nbsp &nbsp
								<a href="/product/{{$product->id}}" >details</a></p>
    					</div>
    				</div>
          </div>
		 
		  
		  @else
		  
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="#" class="img" style="background-image: url({{ $product->imgPah }});"></a>
    					<div class="text p-4">
    						<h3>{{ $product->nom }}</h3>
    						<p class='text-danger'>Remise : {{$product->remise}} %</p>
							<p class="price"><span>{{ $product->prix }} DH</span> 
							<form action="{{route('cart.store')}}" method="Post">
									@csrf
									<input type="hidden" name="product_id" value="{{ $product->id }}">
									

								<button type="submit" class="btn btn-success">Ajouter au Panier </button>
							</form>	 
								
								&nbsp &nbsp

							<a href="/product/{{$product->id}}" >details</a></p>
    					</div>
    				</div>
		  </div>
		  @endif
          @endforeach
    			
 

       
	</section>

    <section class="ftco-menu">
    	<div class="container-fluid">
    		<div class="row d-md-flex">
	    		<div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0" style="background-image: url(images/about.jpg);">
	    		</div>
	    		<div class="col-lg-8 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Pizza</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Boissons</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Salades</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
							@foreach ($pizza as $list)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url({{$list->imgPah}});"></a>
		              				<div class="text">
									  <h3><a href="#">{{$list->nom}}</a></h3>
		              					<p class="text-danger">Remise {{$list->remise}} %</p>
		              					<p class="price"><span>{{$list->prix}}DH</span></p>
		              					<form action="{{route('cart.store')}}" method="Post">
											@csrf
											<input type="hidden" name="product_id" value="{{ $list->id }}">
											
		
										<button type="submit" class="btn btn-success">Ajouter au Panier </button>
									</form>	 
		              				</div>
		              			</div>
							  </div>
							  @endforeach
		              		
		              	</div>
		              </div>
					  	
		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
							@foreach ($boissons as $list)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url({{$list->imgPah}});"></a>
		              				<div class="text">
									  <h3><a href="#">{{$list->nom}}</a></h3>
		              					<p class="text-danger">Remise {{$list->remise}} %</p>
		              					<p class="price"><span>{{$list->prix}}DH</span></p>
		              					<form action="{{route('cart.store')}}" method="Post">
											@csrf
											<input type="hidden" name="product_id" value="{{ $list->id }}">
											
		
										<button type="submit" class="btn btn-success">Ajouter au Panier </button>
		              				</div>
		              			</div>
							  </div>
							  @endforeach
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
							@foreach ($salades as $salade)
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url({{$salade->imgPah}});"></a>
		              				<div class="text">
									  <h3><a href="#">{{$salade->nom}}</a></h3>
		              					<p class="text-danger"> Remise : {{$salade->remise}} %</p>
		              					<p class="price"><span>{{$salade->prix}} DH</span></p>
		              					<form action="{{route('cart.store')}}" method="Post">
											@csrf
											<input type="hidden" name="product_id" value="{{ $salade->id }}">
											
		
										<button type="submit" class="btn btn-success">Ajouter au Panier </button>
		              				</div>
		              			</div>
							  </div>
							@endforeach
		              	
		              	</div>
		              </div>

		             
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
	</section>



	
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  @endsection  

