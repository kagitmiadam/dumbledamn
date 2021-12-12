@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn - Gelecek Postası')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper gelecek-postasi">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">Gelecek Postası</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <p>Üç Büyücü Turnuvası - Açık Kaynak Hackathon yarışması</p>
                                    <p><a href="https://github.com/aozen" class="{{$user->character->school_class->color}}-color-link">Ali Özen</a></p>
                                    <p><a href="https://github.com/kagitmiadam" class="{{$user->character->school_class->color}}-color-link">Cantürk Özdemir</a></p>
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
@stop
