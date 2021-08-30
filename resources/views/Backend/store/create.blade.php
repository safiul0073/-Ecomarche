@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Store</h1>
            {{-- <a href="{{}}" class="btn btn-outline-primary">Show</a> --}}
        </div>
        <div  class="card-body">
            <form method="POST" action="{{route('store.store')}}">

                @csrf
                <div class="form-group">
                    <label for="name">Store Name:</label>
                    <input value="" type="text" class="form-control" id="name" name="name" placeholder="Enter Store Name..">
                </div>
                <div class="form-group">
                    <label for="name">Phone:</label>
                    <input value="" type="text" class="form-control" id="name" name="phone" placeholder="Enter Phone num..">
                </div>
                <div class="form-group">
                    <label for="name">City:</label>
                    <input value="" type="text" class="form-control" id="name" name="city" placeholder="Enter City Name..">
                </div>
                <div class="form-group">
                    <label for="textarea">Description:</label>
                    <textarea name="desc" id="" cols="50" rows="3" placeholder="write store description"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Status:</label>
                    <select class="form-control" id="status" value="" name="status" id="">
                        <option value="1">Active</option>
                        <option value="0">UnActive</option>
                    </select>
                </div>

                <input type="submit" value="Save" class="btn btn-primary">
            </form>
        </div>
    </div>
  </div>
</div>



@endsection
