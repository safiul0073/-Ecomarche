@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Role</h1>
            <a href="{{route('role.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Role</i></a>
        </div>
        <div class="card-body">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <td scope="col">id</td>
                        <td scope="col">Title</td>
                        <td scope="col">Status</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>

                <tbody>

                    {{-- {{dd($users)}} --}}
                    @foreach ($roles as $key => $role)
                    <tr>

                        <td scope="raw">{{$key+1}}</td>
                        <td scope="raw">{{$role->title}}</td>
                        <td scope="raw">{{$role->status == 1 ? "Active" : "UnActive"}}</td>

                        <td scope="raw">

                           <a class="btn btn-info waves-effect" href="{{route('role.edit', $role->id)}}"><i class="material-icons">edit</i></a>
                            <button type="button" class="btn btn-danger waves-effect" onclick="deleteRole({{ $role->id}})"><i class="material-icons">delete</i></button>
                            <form id="delete-form-{{$role->id}}" action="{{route('role.destroy',$role->id)}}" method="POST" style="display: none;" >
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
    function deleteRole(id){

        const swalWithBootstrapButtons = Swal.mixin({
customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
},
buttonsStyling: false
})

swalWithBootstrapButtons.fire({
title: 'Are you sure?',
text: "You want to this!",
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
