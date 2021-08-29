@extends('layouts.app')

@push('css')

@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header d-flex justify-content-between">
              <h1 class="text-primary">Brand</h1>
              <a href="{{route('brand.create')}}" class="btn btn-primary waves-effect">Add Brand</a>
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
                    @foreach ($brands as $key=>$brand)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{ $brand->name}}</td>
                        <td>{{ $brand->status ==1 ? 'active' : ''}}</td>
                        <td>
                            <a class="btn btn-info waves-effect" href="{{route('brand.edit',$brand->id)}}"><i class="material-icons">edit</i></a>
                            <button type="button" class="btn btn-danger waves-effect" onclick="deleteBrand({{ $brand->id }})" ><i class="material-icons">delete</i></button>
                            <form  id="delete-form-{{ $brand->id }}" action="{{route('brand.destroy',$brand->id)}}" method="POST" style="display: none">
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
    function deleteBrand(id){

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
