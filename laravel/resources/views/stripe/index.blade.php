<!DOCTYPE html>
<html>
<head>
    <title>Credits kopen</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe-token" content="{{ env('STRIPE_KEY') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stripe-demo.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
    .panel-title {
    display: inline;
    font-weight: bold;
    }
    .display-table {
        display: table;
    }
    .display-tr {
        display: table-row;
    }
    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }
    
    .StripeElement {
        box-sizing: border-box;
    
        height: 40px;
    
        padding: 10px 12px;
    
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
    
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Credits kopen!</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
 
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
 
                        <form action="{{ route('stripe.post') }}" method="post" id="payment-form">
                            <div class="form-group">
                                <label class="control-label" for="inpCredits">Hoeveel credits wil je kopen?</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-gem"></i></span>
                                    <input type="number" class="form-control" name="credits" id="inpCredits">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="inpCost">Kostprijs</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-euro-sign"></i></span>
                                    <input type="text" class="form-control" name="cost" disabled id="inpCost">
                                </div>
                            </div>
 
                            @csrf
                            <div class="form-group">
                                <label for="card-element">
                                    Credit/Debit Kaartnummer
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
 
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
 
                            <button class="btn btn-primary">
                                Kopen die handel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let convertUrl = 'internal-api-url-comes-here';
    </script>
    <script src="{{ asset('js/stripe-demo.js') }}"></script>
    <script>
    let inpCredits = document.getElementById('inpCredits');
let inpCost = document.getElementById('inpCost');
let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let stripeToken = document.querySelector('meta[name="stripe-token"]').getAttribute('content');
 
// Create a Stripe client.
var stripe = Stripe(stripeToken);
 
// Create an instance of Elements.
var elements = stripe.elements();
 
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
 
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
 
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
 
// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});
 
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
 
    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});
 
// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
 
    // Submit the form
    form.submit();
}</script>
</body>
</html>