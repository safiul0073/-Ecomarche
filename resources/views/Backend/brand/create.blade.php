@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header d-flex justify-content-between">
              <h1 class="text-primary">Brand</h1>
          </div>
          <div class="card-body">
              <table class="table table-dark table-striped">


                  <tbody>

                    <form action="{{!empty($brand) ? route('brand.update',$brand->id) : route('brand.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Brand Name</label>
                            <input type="text" name="name" value="{{!empty($brand)? $brand->name : ''}}" class="form-control" placeholder="Enter Brand Name:">
                        </div>
                        <div class="form-group">
                            <select name="status" id="" class="form-control" value="{{!empty($brand) ? $brand->name : ''}}">
                                <option value="1">Active</option>
                                <option value="0">UnActive</option>
                            </select>
                        </div>
                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>



                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>

@endsection
