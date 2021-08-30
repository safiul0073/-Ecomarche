@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Slider</h1>
            {{-- <a href="{{}}" class="btn btn-outline-primary">Show</a> --}}
        </div>
        <div  class="card-body">
            <form method="POST" action="{{ !empty($slider) ? route('slider.update',$slider->id) : route('slider.store')}}">

                @csrf
                <div class="form-group">
                    <label for="name">Title:</label>
                    <input value="{{!empty($slider) ? $slider->title : ''}}" type="text" class="form-control" id="name" name="title" placeholder="Enter slider title..">
                </div>
                <div class="form-group">
                    <label for="name">Status:</label>
                    <select class="form-control" id="status" value="{{!empty($slider) ? $slider->status : ''}}" name="status" id="">
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
