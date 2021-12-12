@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
<div id="auth-homepage" class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">{{$location->name}}</h5>
                        </div>
                        <hr>
                        Quidditch Dükkanı
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
