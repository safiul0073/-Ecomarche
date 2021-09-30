@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between justify-content-center">
            <h1 class="text-primary">Category</h1>
            <a href="{{route('category.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Category</i></a>
        </div>
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">id</td>
                        <td scope="col">name</td>
                        <td scope="col">Status</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>

                <tbody>

                    {{-- {{dd($users)}} --}}
                    @foreach ($categorys as $key => $category)
                    <tr>

                        <td scope="raw">{{$key+1}}</td>
                        <td scope="raw">{{$category->name}}</td>
                        <td scope="raw">{{$category->status == 1 ? "Active" : "UnActive"}}</td>

                        <td scope="raw">
                            {{-- <a href="{{route('deleteUser',$user->id)}}">Delete</a> --}}
                            <a class="btn btn-info waves-effect" href="{{route('category.edit', $category->id)}}"><i class="material-icons">edit</i></a>
                            <button type="button" class="btn btn-danger waves-effect" onclick="deleteCategory({{ $category->id}})"><i class="material-icons">delete</i></button>
                            <form id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST" style="display: none;" >
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
    function deleteCategory(id){

        const swalWithBootstrapButtons = Swal.mixin({
customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
},
buttonsStyling: false
})

swalWithBootstrapButtons.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
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
