@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Message Payment Using Stripe</h1>
            
        </div>
        <div  class="card-body">
            <div class="container">
                
                <div class="row">
                   <div class="col-md-6 col-md-offset-3">
                      <div class="panel panel-default credit-card-box">
                         <div class="panel-heading display-table" >
                            <div class="" >
                                
                               <h3 class="panel-title display-td" >Message: {{Session::get('message')}} </h3>
                               <h3 class="panel-title display-td" >Price: ${{Session::get('price')}} </h3>
                               <h3 class="panel-title display-td" >Monthly Payment Auto: {{Session::get('continue') != null ? "Yes" : "No"}}</h3> </h3>

                            </div>
                         </div>
                         <div class="panel-body">
                           @if ($errors->any())
                           <div class="alert alert-danger">
                               <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                                    </ul>
                                 </div>
                           @endif
                            <form
                               role="form"
                               action="{{ route('stripe.post') }}"
                               method="POST"
                               id="payment-form">
                               @csrf
                               <div class='form-row row'>
                                  <div class='col-xs-12 form-group required'>
                                     <label class='control-label'>Name on Card</label> 
                                     <input
                                       name="card_name"
                                        class='form-control' size='4' type='text'>
   
                                  </div>
                               </div>
                               <div class='form-row row'>
                                  <div class='col-xs-12 form-group card required'>
                                     <label class='control-label'>Card Number</label> 
                                     <input
                                          name="card_number"
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text'>


                                  </div>
                               </div>
                               <div class='form-row row'>
                                  <div class='col-xs-12 col-md-4 form-group cvc required'>
                                     <label class='control-label'>CVC</label> 
                                     <input
                                        name="card_cvc"
                                        autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text'>
     
                                  </div>
                                  <div class='col-xs-12 col-md-4 form-group expiration required'>
                                     <label class='control-label'>Expiration Month</label> 
                                     <input
                                        name="expire_day"
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>
                                  </div>
                                  <div class='col-xs-12 col-md-4 form-group expiration required'>
                                     <label class='control-label'>Expiration Year</label>
                                      <input
                                        name="expire_year"
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>

                                  </div>
                                 </div>

                               <input type="hidden" class="message-value" name="message" value="{{Session::get('message')}}"/>
                               <input type="hidden" class="message-price" name="price" value="{{Session::get('price')}}" />
                               <input type="hidden" class="message-continue" name="continue" value="{{Session::get('continue')}}" />
                               <div class="row">
                                  <div class="col-xs-12">
                                     <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                  </div>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
        </div>
    </div>
  </div>
</div>
@endsection


