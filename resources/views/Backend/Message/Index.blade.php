@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="text-primary">Message Role</h1>
            
        </div>
        <div  class="card-body">
            <div class="d-flex justify-content-between">
                <div class=" border-white">
                    <h1>100 Message</h1>

                    <form method="get" action="{{ route('checkout') }}"">
                        @csrf
                        <label >Price: </label>
                        <select class="form-control" name="price" id="">
                            <option selected value="10">$10 for Month</option>
                            <option  value="100">$100 for Year</option>
                        </select>
                        <div>
                            <label for="">Auto Payment for Mathly</label>
                            <input value="1" name="continue" type="checkbox">
                        </div>

                        <input value="100" name="messages" type="hidden">
                        <input type="submit" value="Check Out" />
                    </form>
                </div>
                <div>
                    <h1>1000 Message</h1>

                    <form method="get" action="{{ route('checkout') }}"">
                        @csrf
                        <label >Price: </label>
                        <select class="form-control" name="price" id="">
                            <option selected value="100">$100 for Month</option>
                            <option  value="800">$800 for Year</option>
                        </select>
                        <div>
                            <label for="">Auto Payment for Mathly</label>
                            <input value="1" name="continue" type="checkbox">
                        </div>
                        <input value="1000" name="messages" type="hidden">
                        {{-- <input value="100" name="price" type="hidden"> --}}
                        <input type="submit" value="Check Out" />
                    </form>
                </div>
                <div>
                    <h1>2000 Message</h1>
                    <label >Price: </label>

                    <form method="get" action="{{ route('checkout') }}"">
                        @csrf
                        <select class="form-control" name="price" id="">
                            <option selected value="10">$150 for Month</option>
                            <option  value="100">$1200 for Year</option>
                        </select>
                        <div>
                            <label for="">Auto Payment for Mathly</label>
                            <input value="1" name="continue" type="checkbox">
                        </div>
                        <input value="2000" name="messages" type="hidden">
                        {{-- <input value="150" name="price" type="hidden"> --}}
                        <input type="submit" value="Check Out" />
                    </form>
                </div>
               
            </div>
        </div>
    </div>
  </div>
</div>



@endsection
