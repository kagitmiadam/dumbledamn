@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn - Tüm Dönem Bilgileri')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper period all-period">
    <div class="container">
        <div class="row">
            <div class="col-md-12 current-period">
                @foreach($all_periods->where('school_id', $user->character->school->id) as $all_period)
                    @php
                        $school_classes = array (
                                array (
                                    "name"      => $all_period->class_1->name,
                                    "point"     => $all_period->sum('point_1'),
                                    "color"     => $all_period->class_1->color,
                                    "image"     => $all_period->class_1->image,
                                ),
                                array (
                                    "name"      => $all_period->class_2->name,
                                    "point"     => $all_period->sum('point_2'),
                                    "color"     => $all_period->class_2->color,
                                    "image"     => $all_period->class_2->image,
                                ),
                                array (
                                    "name"      => $all_period->class_3->name,
                                    "point"     => $all_period->sum('point_3'),
                                    "color"     => $all_period->class_3->color,
                                    "image"     => $all_period->class_3->image,
                                ),
                                array (
                                    "name"      => $all_period->class_4->name,
                                    "point"     => $all_period->sum('point_4'),
                                    "color"     => $all_period->class_4->color,
                                    "image"     => $all_period->class_4->image,
                                ),
                            );

                        usort($school_classes, function($a, $b) {
                            if($a['point'] == $b['point']) return 0;
                            return $a['point'] < $b['point'] ? 1:-1;
                        });
                    @endphp
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center fw-bold">
                                {{ Auth::user()->character->school->name }} Okulu Tüm Dönem Kupası Bilgileri
                            </h5>
                            <hr>
                            <p class="text-center mb-2">
                                <span class="fw-bold">{{ Auth::user()->character->school->name }}</span> okulunun tüm zamanlara ait dönem kupalarında kazanılan puan bilgileri.
                                @foreach($school_classes as $school_class)
                                    @if($loop->first and $school_class['point'] > 0)
                                        Tüm zamanlara göre <span class="fw-bold {{ $school_class['color'] }}-color-light">{{ $school_class['point'] }}</span> puan ile <span class="fw-bold {{ $school_class['color'] }}-color-light">{{ $school_class['name'] }}</span> binası liderliği elinde bulundurmaktadır.
                                    @endif
                                @endforeach
                            </p>
                            <p class="text-center">
                                Devam eden dönem kupası bilgilerini görüntülemek için
                                <a href="{{ route('get-current-period') }}"
                                class="#">
                                    tıklayın
                                </a>.
                            </p>
                        </div>
                        <hr>
                        <div class="card-text">
                            <div class="row">
                                @foreach($school_classes as $school_class)
                                    <div class="col-md-3 col-6 field-1">
                                        <div class="content-inner">
                                            <div class="content-front bg-{{ $school_class['color'] }}-color">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <img class="img-fluid p-2" src="../{{ $school_class['image'] }}"
                                                            alt="{{ $school_class['name'] }}"/>
                                                        <p class="text-center p-2 rounded">{{ $school_class['name'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-back bg-{{ $school_class['color'] }}-color">
                                                <div class="cf-inner">
                                                    <div class="inner">
                                                        <h4 class="text-center p-2 rounded">{{ $school_class['name'] }}</h4>
                                                        <p class="text-center p-2 rounded">{{ $school_class['point']  }}
                                                            Puan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                            <div class="card-title text-center fw-bold">
                                <h5>Dönem Kupası Kazanma Bilgileri</h5>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    @include('components.win-rate')
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
