@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
    <div class="container location">
        <div class="row">
            @isset (Auth::user()->character->user_id)
                @if(Auth::user()->character->status == "Aktif")
                    @include('components.breadcrumbs.location-breadcrumb')
                    @includeWhen((bool)Auth::user()->character,'location.location-inner')
                @elseif(Auth::user()->character->status == "Onay Bekliyor")
                    @includeWhen((bool)Auth::user()->character,'components.not-auth-user')
                @endif
            @endisset
        </div>
    </div>
@endsection
