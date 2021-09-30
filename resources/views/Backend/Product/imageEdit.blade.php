
        <div class="card-body">

                                <div>
                                    @if(!empty($product))

                                    @foreach (explode(",",$product->image->url) as $img)
                                    <div>
                                        <form action="{{route("edit-image")}}">
                                            <input type="hidden" name="url" value="{{$img}}">
                                            <input type="hidden" name="id" value="{{$product->image->id}}">
                                            <button type="submit" href="">delete</button>
                                        </form>
                                        
                                        <img src="{{URL::to($img)}}" style="height: 150px; width:200px;" class="card-img-top" alt="...">
                                    </div>
                                        
                                    @endforeach

                                    @endif

                                </div>

        </div>
