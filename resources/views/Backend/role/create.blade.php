@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">ROLE</h1>
            {{-- <a href="{{}}" class="btn btn-outline-primary">Show</a> --}}
        </div>
        <div  class="card-body">
            <form method="POST" action="{{ !empty($role) ? route('role.update',$role->id) : route("role.store")}}">

                @csrf
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input value="{{ !empty($role) ? $role->title : ''}}" type="text" class="form-control" id="name" name="title" placeholder="Enter Title..">
                </div>
                <div class="form-group">
                    <label for="name">Status:</label>
                    <select class="form-control" id="status" value="{{ !empty($role) ? $role->status : ''}}" name="status" id="">
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
