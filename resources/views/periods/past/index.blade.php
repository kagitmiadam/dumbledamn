@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn - Geçmiş Dönem Bilgileri')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper period past-period">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">Geçmiş Dönem Bilgileri</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <p class="mb-2">
                                <span class="fw-bold">{{ $user->character->school->name }}</span>
                                okulundaki geçmiş dönem kupalarını hangi binanın kaç puan ile kazandığına buradan bakabilirsiniz.
                            </p>
                            <p>
                                Devam eden dönem kupası bilgilerini görüntülemek için
                                <a href="{{ route('get-current-period') }}"
                                   class="{{$user->character->school_class->color}}-color-link">
                                    tıklayın
                                </a>.
                            </p>
                            <p>
                                Tüm dönemlere göre puan sıralamasını görüntülemek için
                                <a href="{{ route('get-period-all-info') }}"
                                   class="{{$user->character->school_class->color}}-color-link">
                                    tıklayın
                                </a>.
                            </p>
                        </div>
                        <hr>
                        @include('components.win-rate')
                        @foreach($all_past_periods as $period)
                            @if($period->school->name == Auth::user()->character->school->name and
                                $period->status == 2)
                                @php
                                    $school_classes = array (
                                    array (
                                        "name"      => $period->class_1->name,
                                        "point"     => $period->point_1,
                                        "color"     => $period->class_1->color,
                                        "image"     => "../" . $period->class_1->image,
                                        "cup_win"   => $period->class_1->period_cup_win,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "name"      => $period->class_2->name,
                                        "point"     => $period->point_2,
                                        "color"     => $period->class_2->color,
                                        "image"     => "../" . $period->class_2->image,
                                        "cup_win"   => $period->class_2->period_cup_win,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "name"      => $period->class_3->name,
                                        "point"     => $period->point_3,
                                        "color"     => $period->class_3->color,
                                        "image"     => "../" . $period->class_3->image,
                                        "cup_win"   => $period->class_3->period_cup_win,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "name"      => $period->class_4->name,
                                        "point"     => $period->point_4,
                                        "color"     => $period->class_4->color,
                                        "image"     => "../" . $period->class_4->image,
                                        "cup_win"   => $period->class_4->period_cup_win,
                                        "status"    => $period->status,
                                    ),
                                );
                                usort($school_classes, function($a, $b) {
                                    if($a['point'] == $b['point']) return 0;
                                    return $a['point'] < $b['point'] ? 1:-1;
                                });
                                @endphp
                                <div class="mb-3">
                                    <div class="row mb-3">
                                        <div class="col-md-12 text-center">
                                            @foreach($school_classes as $class)
                                                @if($class['status'] == 2)
                                                    @if ($loop->first)
                                                        <h4>
                                                            <a href="{{ route('get-period-detail-info', ['id' => $period->id] ) }}"
                                                            class="fw-bold ct-a-{{ $class['color'] }}-reverse"
                                                            data-toggle="tooltip" data-placement="top" title="Dönem bilgisi hakkında detaylı bilgi almak için tıklayın.">
                                                                {{ $period->name }}
                                                            </a>
                                                        </h4>
                                                        <p>
                                                            <span class="fw-bold">{{ $period->school->name }}</span>
                                                            okulundaki {{ $period->description }}</p>
                                                        <p>
                                                            Bu dönem bitmiştir. <span
                                                                    class="fw-bold ct-{{ $class['color'] }}">{{$class['point']}}</span>
                                                            puan ile
                                                            <span class="fw-bold ct-{{ $class['color'] }}">{{$class['name']}} <i
                                                                        class="fa fa-trophy"></i></span> dönem kupasını kazanmıştır.
                                                        </p>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        @foreach($school_classes as $class)
                                            <div class="col-md-3 col-6 field-1">
                                                <div class="content-inner">
                                                    <div class="content-front ct-bg-{{ $class['color'] }}">
                                                        <div class="cf-inner">
                                                            <div class="inner">
                                                                @if ($loop->first)
                                                                    <div class="trophy-inner {{$class['color']}}-badge-inner">
                                                                        <i class="fa fa-trophy"></i>
                                                                    </div>
                                                                @endif
                                                                <img class="img-fluid p-2" src="{{ $class['image'] }}"
                                                                    alt="{{ $class['name'] }}"/>
                                                                <p class="text-center p-2 rounded">{{ $class['name'] }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content-back ct-bg-{{ $class['color'] }}">
                                                        <div class="cf-inner">
                                                            <div class="inner">
                                                                <h4 class="text-center p-2 rounded">{{ $class['name'] }}</h4>
                                                                <p class="text-center p-2 rounded">{{ $class['point']  }}
                                                                    Puan</p>
                                                                @if ($loop->first)
                                                                    <div class="trophy-inner-back {{$class['color']}}-badge-inner">
                                                                        <i class="fa fa-trophy"></i>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                        {{ $all_past_periods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
@stop
