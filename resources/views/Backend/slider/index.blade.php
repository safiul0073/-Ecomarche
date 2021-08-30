@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Slider</h1>
            <a href="{{route('slider.create')}}" class="btn btn-outline-primary"><i class="material-icons">Add Slider</i></a>
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
                    @foreach ($sliders as $key=>$slider)
                        <tr>
                            <td> {{$key + 1}} </td>
                            <td> {{Str::limit($slider->title,30)}} </td>
                            <td> {{$slider->status == 1 ? 'active' : ''}} </td>
                            <td>
                                <a class="btn btn-info waves-effect" href="{{route('slider.edit',$slider->id)}}">edit</a>
                                <button class="btn btn-danger waves-effect" onclick="deleteSlider({{ $slider->id }})">delete</button>
                                <form id="delete-form-{{ $slider->id }}" action="{{route('slider.destroy',$slider->id)}}" method="POST" style="display: none">
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
    function deleteSlider(id){

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
