@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header" id="header">
                        <h1 class="card-title cap">oders</h1>
                    </div>
                    <div class="card-body">
                       <h1 class="text-center">545</h1>
                    </div>
                  </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h1 class="card-title cap">oders</h1>
                    </div>
                    <div class="card-body">
                       <h1 class="text-center">545</h1>
                    </div>
                  </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <h1 class="card-title cap">oders</h1>
                    </div>
                    <div class="card-body">
                       <h1 class="text-center">545</h1>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <style type="text/css">
    
        #header {
            text-align: center;
        }
    </style>
@endpush
