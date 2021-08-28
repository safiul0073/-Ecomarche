@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-primary">Category</h1>
            <a href="{{}}" class="btn btn-outline-primary">Add Category</a>
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
                    {{-- @foreach ($users as $user)
                    <tr>
                
                        <td scope="raw">{{$user->id}}</td>
                        <td scope="raw">{{$user->username}}</td>
                        <td scope="raw">{{$user->email}}</td>
                        <td scope="raw">{{$user->role_users->user_id}}</td>
                        <td scope="raw">
                            <a href="{{route('deleteUser',$user->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach --}}
                    
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>


   
@endsection