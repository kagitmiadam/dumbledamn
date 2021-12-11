@extends('layouts.default')

@section('title', $location->name)

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/site-pages/shops.css')}}">
@endsection

@section('content')
    <div class="container shop">
        <div class="row">
            @include('components.auth-check')
            @isset (Auth::user()->character->user_id)
                @include('components.breadcrumbs.shop-breadcrumb')
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(Auth::user()->character->role_play_status == 0)
                                @if(Auth::user()->character->status == "Aktif")
                                    @if ($location->location_type->name == "Asa Dükkanı")
                                        @include('location.shops.components.wand-shop')
                                    @elseif ($location->location_type->name == "Banka")
                                        @include('location.shops.components.bank-shop')
                                    @elseif ($location->location_type->name == "Cüppe Dükkanı")
                                        @include('location.shops.components.gown-shop')
                                    @elseif ($location->location_type->name == "Quidditch Dükkanı")
                                        @include('location.shops.components.quidditch-shop')
                                    @elseif ($location->location_type->name == "Evcil Hayvan Dükkanı")
                                        @include('location.shops.components.pet-shop')
                                    @elseif ($location->location_type->name == "Malzeme Dükkanı")
                                        @include('location.shops.components.material-shop')
                                    @elseif ($location->location_type->name == "Tüy Kalem Dükkanı")
                                        @include('location.shops.components.quill-shop')
                                    @elseif ($location->location_type->name == "İksir Dükkanı")
                                        @include('location.shops.components.potion-shop')
                                    @elseif ($location->location_type->name == "Han")
                                        @include('location.shops.components.inn-shop')
                                    @elseif ($location->location_type->name == "Kitap Dükkanı")
                                        @include('location.shops.components.book-shop')
                                    @elseif ($location->location_type->name == "Tren İstasyonu")
                                        @include('location.shops.components.train-station-shop')
                                    @else
                                        <h1>Yeni eklenecek</h1>
                                    @endif
                                @elseif(Auth::user()->character->status == "Onay Bekliyor")
                                    <div class="col-md-12">
                                        @includeWhen((bool)Auth::user()->character,'components.not-auth-user')
                                    </div>
                                @endif
                            @else
                                @include('location.components.role-play-status')
                            @endif
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection
