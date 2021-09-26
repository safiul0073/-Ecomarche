@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>product details</h1>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4" style="width: 18rem;">
                            @php
                                $image = DB::table('images')->where('imageable_id', $product->id)->first();
                                $images = explode(',',$image->url);
                            @endphp
                            @foreach ($images as $img)
                            <img src="{{URL::to($img)}}" style="height: 150px; width:200px;" class="card-img-top" alt="...">
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-text">Summary: {{$product->summary}}</h4><br>
                            <h4 class="card-text">Content: {{$product->content}}</h4><br>
                            <h4 class="card-text">SKU: {{$product->sku}}</h4><br>


                          </div>
                    </div>
                        <div class="col-md-4">
                          <p class="card-text">{{$product->summary}}</p>
                        </div>

                </div>





        </div>
    </div>
</div>

@endsection
