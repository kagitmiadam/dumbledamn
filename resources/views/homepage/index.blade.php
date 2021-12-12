@extends('layouts.homepage')

@section('title', 'Dumbledamn')

@section('styles')
@stop

@section('content')
<div id="homepage">
    <div class="background-image-field">
        <div class="bg-1">
            <img src="{{asset('img/homepage/bg-1.png')}}" alt="">
        </div>
        <div class="bg-2">
            <img src="{{asset('img/homepage/bg-2.png')}}" alt="">
        </div>
        <div class="bg-3">
            <img src="{{asset('img/homepage/bg-3.png')}}" alt="">
        </div>
    </div>
    <div class="letter-field">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 field-1">
                    <div class="title">Dumbledamn</div>
                    <div class="letter">
                        <div class="img-field">
                            <img src="{{asset('img/homepage/letter.png')}}" alt="">
                            <div class="text-field">
                                <div class="form-field">
                                    <div class="content-select">
                                        <h1 class="active" data-content-id="1">Kayıt Ol</h1>
                                        <h1 data-content-id="2">Giriş Yap</h1>
                                    </div>

                                    <div class="inner-content-field">
                                        <div class="inner-content active" data-inner-content-id="1">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="d-flex justify-content-center">
                                                    <div style="margin-right: 20px">
                                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Karakter Adı" required />
                                                    </div>
    
                                                    <div>
                                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="mail@mail.com" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Şifre" required autocomplete="new-password" />
                                                    </div>
    
                                                    <div class="flex items-center justify-end">
                                                        <x-button class="ml-4">
                                                            {{ __('Üye ol') }}
                                                        </x-button>
                                                    </div>
                                                </div>
                                            </form>
                                            @foreach($errors->all() as $error)
                                            <div>
                                                <span class="error-message">{{$error}}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="inner-content" data-inner-content-id="2">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="d-flex justify-content-center">
                                                    <div style="margin-right: 20px">
                                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="mail@mail.com" required />
                                                    </div>
    
                                                    <div>
                                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Şifre" required autocomplete="current-password" />
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center">
                                                    <div class="flex items-center justify-end">
                                                        <x-button class="ml-3">
                                                            {{ __('Giriş yap') }}
                                                        </x-button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            var contentID, innerContentID;
            var innerContent = $('.inner-content-field .inner-content');
            $('.content-select h1').on('click', function(){
                $('.content-select h1').removeClass('active');
                $('.inner-content-field .inner-content').removeClass('active');
                $(this).addClass('active');
                contentID = $(this).attr('data-content-id');

                $.each( innerContent, function( key, value ) {
                    innerContentID = $(this).attr('data-inner-content-id');
                    if (contentID == innerContentID) {
                        $(this).addClass('active')
                    }
                });
            });
        });
    </script>
@stop
