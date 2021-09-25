@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>product details</h1>
            </div>
                <div class="card-body">
                    <div class="col-md-4" style="width: 18rem;">
                        @foreach ($product->images as $img)
                        <img src="{{ asset($product->$img->image->url}}" class="card-img-top" alt="...">
                        @endforeach
                    </div>
                        <div class="col-md-4">
                          <p class="card-text">{{$product->summary}}</p>
                        </div>

                </div>





        </div>
    </div>
</div>

@endsection
