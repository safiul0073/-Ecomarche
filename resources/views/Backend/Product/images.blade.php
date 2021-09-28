
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">id</td>
                        <td scope="col">images</td>




                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $key=>$product)
                     
                        <tr>
                            <td>{{$product->id}}</td>
                            <td >
                                <div>
                                    @foreach (explode(",",$product->image->url) as $img)
                                    <img src="{{URL::to($img)}}" style="height: 150px; width:200px;" class="card-img-top" alt="...">
                                    @endforeach
                                </div>

                            </td>
                        </tr>
                    @empty
                        <p>No users</p>
                    @endforelse




                </tbody>
            </table>
        </div>
    
