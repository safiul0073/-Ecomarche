@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Store</h1>
            <a href="{{route('store.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Store</i></a>
        </div>
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">id</td>
                        <td scope="col">Name</td>
                        <td scope="col">Phone</td>
                        <td scope="col">City</td>
                        <td scope="col">Description</td>
                        <td scope="col">Status</td>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($stores as $key=>$store)
                        <tr>
                            <td> {{$key + 1}} </td>
                            <td> {{$store->name}}</td>
                            <td> {{$store->phone}}</td>
                            <td> {{$store->city}}</td>
                            <td> {{Str::limit($store->desc,30)}} </td>
                            <td> {{$store->status == 1 ? 'active' : ''}} </td>
                            <td>
                                <a class="btn btn-info waves-effect" href="{{route('store.edit',$store->id)}}">edit</a>
                                <button class="btn btn-danger waves-effect" onclick="deleteStore({{ $store->id }})">delete</button>
                                <form id="delete-form-{{ $store->id }}" action="{{route('store.destroy',$store->id)}}" method="POST" style="display: none">
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
    function deleteStore(id){

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
