<div class="card-body">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <td scope="col">id</td>
                <td scope="col">Title</td>
                <td scope="col">Category</td>
                <td scope="col">Brand</td>
                <td scope="col">Price</td>
                <td scope="col">Discount</td>
                <td scope="col">Quantity</td>
                <td scope="col">Status</td>
                <td scope="col">Action</td>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $key=>$product)
                <tr>
                    <td> {{$key + 1}} </td>
                    <td> {{$product->title}}</td>
                    <td> {{ $product->category->name }}</td>
                    <td> {{$product->brand->name }}</td>
                    <td> {{Str::limit($product->summary,30)}} </td>
                    <td> {{$product->sku}}</td>
                    <td> {{$product->price}}</td>
                    <td> {{$product->discount}}</td>
                    <td> {{$product->quantity}}</td>
                    <td> {{$product->status == 1 ? 'active' : ''}} </td>
                    <td>
                        <div class="flex">
                            <a class="" style="color:blanchedalmond;"  href="{{route('product.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
                            <button class="" style="color:red;" onclick="deleteProduct({{ $product->id }})"><i class="far fa-trash-alt"></i></button>
                            <form id="delete-form-{{ $product->id }}" action="{{route('product.destroy',$product->id)}}" method="POST" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>No users</tr>
            @endforelse




        </tbody>
    </table>
</div>