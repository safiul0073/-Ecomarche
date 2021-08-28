@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Category</h1>
            {{-- <a href="{{}}" class="btn btn-outline-primary">Show</a> --}}
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name..">
                </div>
            </form>
        </div>
    </div>
  </div>
</div>


   
@endsection