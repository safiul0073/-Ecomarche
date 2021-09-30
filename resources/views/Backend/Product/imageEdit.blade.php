
        <div class="card-body">

                                <div>
                                    @if(!empty($product))

                                    @foreach (explode(",",$product->image->url) as $img)
                                    <img src="{{URL::to($img)}}" style="height: 150px; width:200px;" class="card-img-top" alt="...">
                                    @endforeach

                                    @endif

                                </div>

        </div>
