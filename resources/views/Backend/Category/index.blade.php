@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Category</h1>
            <a href="{{route('category.create')}}" class="btn btn-outline-primary">Add Category</a>
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
                            <a href="{{route('category.edit', $category->id)}}">edit</a>
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