@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Product List</h1>
            <a href="{{route('product.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Product</i></a>
        </div>
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">id</td>
                        <td scope="col">Title</td>
                        <td scope="col">Category</td>
                        <td scope="col">Brand</td>
                        <td scope="col">Summary</td>
                        <td scope="col">SKU</td>
                        <td scope="col">Price</td>
                        <td scope="col">Discount</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Content</td>
                        <td scope="col">Status</td>
                        <td scope="col">Action</td>



                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $key=>$product)
                        <tr>
                            <td> {{$key + 1}} </td>
                            <td> {{$product->title}}</td>
                            <td> {{ $product->category_id }}</td>
                            <td> {{$product->brand_id}}</td>
                            <td> {{Str::limit($product->summary,30)}} </td>
                            <td> {{$product->sku}}</td>
                            <td> {{$product->price}}</td>
                            <td> {{$product->discount}}</td>
                            <td> {{$product->quantity}}</td>
                            <td> {{Str::limit($product->content,30)}} </td>
                            <td> {{$product->status == 1 ? 'active' : ''}} </td>
                            <td>
                                <a class="btn btn-info waves-effect"  href="{{route('product.show',$product->id)}}"><i class="far fa-eye"></i>show</a>
                                <a class="btn btn-info waves-effect" href="{{route('product.edit',$product->id)}}">edit</a>
                                <button class="btn btn-danger waves-effect" onclick="deleteProduct({{ $product->id }})">delete</button>
                                <form id="delete-form-{{ $product->id }}" action="{{route('product.destroy',$product->id)}}" method="POST" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach




                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>



@endsection


@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function deleteProduct(id){

        const swalWithBootstrapButtons = Swal.mixin({
customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
},
buttonsStyling: false
})

swalWithBootstrapButtons.fire({
title: 'Are you sure?',
text: "You waana delete this!",
icon: 'warning',
showCancelButton: true,
confirmButtonText: 'Yes, delete it!',
cancelButtonText: 'No, cancel!',
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
    event.preventDefault();
    document.getElementById('delete-form-'+id).submit();
} else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
) {
    swalWithBootstrapButtons.fire(
    'Cancelled',
    'Your imaginary file is safe :)',
    'error'
    )
}
})

    }
</script>

@endpush
