


<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://js.stripe.com/v3/"></script>

@extends('layouts.app')
@section('content')
<div class="col-md-12">
    
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h4 class="text-center pt-5">Procéder au paiement</h4>
            <form action="{{ route('checkout.store') }}" method="POST" class="my-4" id="payment-form">
                @csrf
                <div class="form-group">
                    
                    <input type="email"name="email" class="form-control" id="email" placeholder="Enter email">
                    <br>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <input type="text" id="ville" name="ville" class="form-control" placeholder="ville">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    
                    <input type="text"  name="adresseliv" id="adresseliv" class="form-control"  placeholder="Enter votre adresse">
                   
                  </div>
    
                  
                
                <div id="card-element">
                <!-- Elements will create input elements here -->
                </div>

                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>

                <button class="btn btn-success btn-block mt-3" id="submit">
                    <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant {{Cart::subtotal()}} DH
                </button>
            </form>
        </div>
    </div>
</div>


<script>
    //Suppression de la barre de navigation
 
    // Paiement Stripe
    var stripe = Stripe('pk_test_51GqCstCx2QyytDIo5wuEm7WfjBhCzLHKNeD49OuTdIaw7YI9wZ5ELAwaoTogvj3jG2V2ZeKwbuyyTfiVp8FVmDXa00rYci0eL3');
    var elements = stripe.elements();
    var style = {
        base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning', 'mt-3');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning', 'mt-3');
            displayError.textContent = '';
        }
    });
    var submitButton = document.getElementById('submit');
    submitButton.addEventListener('click', function(ev) {
    ev.preventDefault();
    submitButton.disabled = true;
    stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
            card: card
        }
        }).then(function(result) {
            if (result.error) {
            // Show error to your customer (e.g., insufficient funds)
            submitButton.disabled = false;
            console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var form = document.getElementById('payment-form');
                    var url = form.action;
                    var ville = document.getElementById('ville').value;
                    
                    
                    var email = document.getElementById('email').value;
                    var telephone = document.getElementById('telephone').value;
                    
                    var adresseliv = document.getElementById('adresseliv').value;
                   
                   

                    console.log(url);
                    var redirect = '/merci';
                    
                    fetch( url,
                        {
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'POST',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent,
                                ville: ville,
                                email:email,
                                telephone:telephone,
                                adresseliv:adresseliv
                                
                              
                            })
                        }).then((data) => {
                            
                            console.log(data);

                            window.location.href = redirect;
                    }).catch((error) => {
                        console.log(error)
                    })
                }
            }
        });
    });
</script>
@endsection