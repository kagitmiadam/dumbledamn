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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    @foreach ($character_lessons as $character_lesson)
                                        @if($character_lesson->lesson->location_id == $location->id)
                                            <p>{{$location->name}} dersinin {{$character_lesson->lesson->school_grade->name}} dersliğine hoş geldin, {{$user->name}}.</p>
                                            <a href="{{route('get-classroom-quiz', ['id' => $location->id])}}" class="{{$user->character->school_class->color}}-color-link-light">Dönem sınavına girmek için tıklayın.</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
