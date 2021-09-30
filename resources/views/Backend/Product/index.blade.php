@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Product List</h1>
            <div>
                <a href="{{ url('product?tab=1') }}" class="btn btn-outline-primary"><i class="material-icons">List</i></a>
                <a href="{{ url('product?tab=2') }}" class="btn btn-outline-primary"><i class="material-icons">Images</i></a>
            </div>

            <a href="{{route('product.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Product</i></a>
        </div>
        
        @if (!empty($tab))
            @if ($tab == 2)
                @include('Backend.Product.images')
            @else
                @include('Backend.Product.list')
            @endif
             
        @else 
             @include('Backend.Product.list')
        @endif
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
