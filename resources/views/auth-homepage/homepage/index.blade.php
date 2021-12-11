@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper">
    Anasayfa
    <div class="logout-field">
        <p>
            Hoş geldin, <span>{{$user->name}}</span>
        </p>
        <p>
            Okul: {{$user->character->school->name}}
            Sınıf: {{$user->character->school_class->name}}
        </p>
    </div>
</div>
@stop
@section('scripts')
@stop
