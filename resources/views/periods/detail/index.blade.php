@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn - Mevcut Dönem Bilgileri')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper period all-period">
    <div class="container">
        <div class="row">
            <div class="col-md-12 current-period">
                @php
                    $current_periods = array (
                    array (
                        "name"      => $selected_period->class_1->name,
                        "point"     => $selected_period->point_1,
                        "color"     => $selected_period->class_1->color,
                        "image"     => "../" . $selected_period->class_1->image,
                        "cup_win"   => $selected_period->class_1->period_cup_win,
                        "status"    => $selected_period->status,
                    ),
                    array (
                        "name"      => $selected_period->class_2->name,
                        "point"     => $selected_period->point_2,
                        "color"     => $selected_period->class_2->color,
                        "image"     => "../" . $selected_period->class_2->image,
                        "cup_win"   => $selected_period->class_2->period_cup_win,
                        "status"    => $selected_period->status,
                    ),
                    array (
                        "name"      => $selected_period->class_3->name,
                        "point"     => $selected_period->point_3,
                        "color"     => $selected_period->class_3->color,
                        "image"     => "../" . $selected_period->class_3->image,
                        "cup_win"   => $selected_period->class_3->period_cup_win,
                        "status"    => $selected_period->status,
                    ),
                    array (
                        "name"      => $selected_period->class_4->name,
                        "point"     => $selected_period->point_4,
                        "color"     => $selected_period->class_4->color,
                        "image"     => "../" . $selected_period->class_4->image,
                        "cup_win"   => $selected_period->class_4->period_cup_win,
                        "status"    => $selected_period->status,
                    ),
                );
                usort($current_periods, function($a, $b) {
                    if($a['point'] == $b['point']) return 0;
                    return $a['point'] < $b['point'] ? 1:-1;
                });
                @endphp
            
                <div class="card">
                    <div class="card-body">
                        @if(Auth::user()->character->school->id == $selected_period->school_id)
                            <div class="title text-center">
                                <h4 class="mb-3 fw-bold">{{ $selected_period->name }} Detayları</h4>
                                <hr>
                                <p class="mb-3">
                                    <span class="fw-bold">{{ $selected_period->school->name }}</span>
                                    okulundaki <span class="fw-bold">{{ $selected_period->year }} Yılı {{ $selected_period->period }}. Dönem Kupasında</span>
                                    hangi öğrenci, hangi binaya kaç puan kazandırdığı bilgisini görebilirsiniz.
                                </p>
                                <p>
                                    Devam eden dönem kupası bilgilerini görüntülemek için
                                    <a href="{{ route('get-current-period') }}"
                                       class="{{$user->character->school_class->color}}-color">
                                        tıklayın</a>.
                                </p>
                            </div>
                            <hr>
                            <div class="row">
                                @foreach($current_periods as $current_period)
                                    <div class="col-md-3 col-6 field-1">
                                        <div class="content-inner">
                                            <div class="content-front bg-{{ $current_period['color'] }}-color">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        @if ($loop->first)
                                                            <div class="trophy-inner {{ $current_period['color'] }}-badge-inner">
                                                                <img src="{{asset("img/icon/period-cup.png")}}" alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <img class="img-fluid p-2" src="../../{{ $current_period['image'] }}"
                                                         alt="{{ $current_period['name'] }}"/>
                                                    <p class="text-center p-2 rounded">{{ $current_period['name'] }}</p>
                                                </div>
                                            </div>
                                            <div class="content-back bg-{{ $current_period['color'] }}-color">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <h4 class="text-center p-2 rounded">{{ $current_period['name'] }}</h4>
                                                        <p class="text-center p-2 rounded">{{ $current_period['point']  }}
                                                            Puan</p>
                                                        @if ($loop->first)
                                                            <div class="trophy-inner-back {{ $current_period['color'] }}-badge-inner">
                                                                <img src="{{asset("img/icon/period-cup.png")}}" alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="row mt-2">
                                @foreach($current_periods as $current_period)
                                    @if($current_period['status'] == 2)
                                        @if($loop->first)
                                            <div class="col-md-12">
                                                <p class="alert bg-{{ $current_period['color'] }}-color">
                                                    Bu dönem bitmiştir. Bu dönemi <span class="fw-bold">{{ $current_period['point'] }}</span> puan ile <span class="fw-bold">{{ $current_period['name'] }}</span>
                                                    <i class="fa fa-trophy"></i> binası kazanmıştır.
                                                </p>
                                            </div>
                                        @endif
                                    @else
                                        @if($loop->first)
                                            <div class="col-md-12">
                                                <p class="alert bg-{{ $current_period['color'] }}-color">
                                                    Bu dönem devam etmektedir. Şuan <span class="fw-bold">{{ $current_period['point'] }}</span> puan ile <span class="fw-bold">{{ $current_period['name'] }}</span>
                                                    <i class="fa fa-trophy"></i> binası liderliği elinde bulundurmaktadır.
                                                </p>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            @if($period_details->count() > 0)
                                @foreach($period_characters as $period_character)
                                    @if ($loop->first)
                                        <hr>
                                        <p class="mb-3 text-center">
                                            En'ler
                                        </p>
                                    @endif
                                @endforeach
                                <div class="row">
                                    @foreach($period_characters as $period_character)
                                        @if ($loop->first)
                                            <div class="col-md-6 col-12 mb-2 mb-lg-0">
                                                <div class="bg-{{ $period_character->character->school_class->color }}-color rounded p-1 text-center">
                                                    <p>Bu sezon en fazla puan toplayan karakter: </p>
                                                    <p>
                                                        {{-- <a href="{{ route('get-character-info', ['character_id' => $period_character->character->id]) }}" class="text-white fw-bold">{{ $period_character->character->name }}</a>, --}}
                                                        <a href="#" class="text-white fw-bold">{{ $period_character->character->name }}</a>,
                                                        {{ $period_character->total_point }} puan topladı.
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
            
                                        @if ($loop->last)
                                            <div class="col-md-6 col-12">
                                                <div class="bg-{{ $period_character->character->school_class->color }}-color rounded p-1 text-center">
                                                    <p>Bu sezon en az puan toplayan karakter: </p>
                                                    <p>
                                                        {{-- <a href="{{ route('get-character-info', ['character_id' => $period_character->character->id]) }}" class="text-white fw-bold">{{ $period_character->character->name }}</a>, --}}
                                                        <a href="#" class="text-white fw-bold">{{ $period_character->character->name }}</a>,
                                                        {{ $period_character->total_point }} puan topladı.
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
            
                                    @endforeach
                                </div>
                                @foreach($period_characters as $period_character)
                                    @if ($loop->first)
                                        <hr>
                                        <p class="mb-3 text-center">
                                            Genel Detaylar
                                        </p>
                                    @endif
                                @endforeach
                                <div class="row">
                                    @foreach($period_details as $period_detail)
                                        @if($period_detail->period_id == $selected_period->id)
                                            @if($period_detail->privacy == "Gizli")
                                                <div class="col-md-12">
                                                    <div class=" alert bg-{{ $period_detail->school_class->color }}-color">
                                                    <span>
                                                        {{ $period_detail->school_class->name }} binasından, bir öğrenci gizli görev ile binasına {{ $period_detail->point }}
                                                        puan sağladı.
                                                    </span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class=" alert bg-{{ $period_detail->school_class->color }}-color">
                                                    <span>
                                                        {{ $period_detail->school_class->name }} binasından, <a
                                                                {{-- href="{{ route('get-character-info', ['character_id' => $period_detail->character->id]) }}" --}}
                                                                href="#"
                                                                class="text-white fw-bold">{{ $period_detail->character->user->name }}</a> isimli
                                                        {{ $period_detail->character->school_grade->name }} öğrencisi binasına {{ $period_detail->point }}
                                                        puan sağladı. Sebep: {{ $period_detail->description }}
                                                    </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    {{ $period_details->links() }}
                                </div>
                            @else
                                <div class="alert @include('components.other.class-color-background') mt-2">
                                    Bu dönem kazanılan puan bilgisi yok.
                                </div>
                            @endif
                        @else
                            <div class="alert @include('components.other.class-color-background')">
                                Bu bilgiler başka bir okula aittir.
                            </div>
                            @include('periods.components.past-period')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
@stop
