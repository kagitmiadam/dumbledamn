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
                                                <div>
                                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Karakter Adı" required />
                                                </div>

                                                <div>
                                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="mail@mail.com" required />
                                                </div>

                                                <div>
                                                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Şifre" required autocomplete="new-password" />
                                                </div>

                                                <div class="flex items-center justify-end">
                                                    <x-button class="ml-4">
                                                        {{ __('Üye ol') }}
                                                    </x-button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="inner-content" data-inner-content-id="2">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div>
                                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="mail@mail.com" required />
                                                </div>

                                                <div>
                                                    <x-input id="password" class="block mt-1 w-full"
                                                                    type="password"
                                                                    name="password"
                                                                    placeholder="Şifre"
                                                                    required autocomplete="current-password" />
                                                </div>

                                                <div>
                                                    <label for="remember_me" class="inline-flex items-center">
                                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                    </label>
                                                </div>

                                                <div class="flex items-center justify-end">
                                                    @if (Route::has('password.request'))
                                                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                            {{ __('Şifreni mi unuttun?') }}
                                                        </a>
                                                    @endif

                                                    <x-button class="ml-3">
                                                        {{ __('Giriş yap') }}
                                                    </x-button>
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
