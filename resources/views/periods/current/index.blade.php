@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn - Mevcut Dönem')

@section('styles')
@stop

@section('content')
@foreach($all_periods as $period)
    @if($period->school->name == Auth::user()->character->school->name and $period->status == 1)
        @section('title', Auth::user()->character->school->name . " " . $period->name)
    @else
        @section('title', Auth::user()->character->school->name . " okulunda aktif bir dönem yok")
    @endif
@endforeach
<div id="auth-homepage" class="wrapper period current-period">
    <div class="container">
        <div class="row">
            <div class="col-md-12 current-period">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            @foreach($all_periods
                                ->where('school_id', Auth::user()->character->school->id)
                                ->where('status', 1) as $period)
                                @php
                                    $school_classes = array (
                                    array (
                                        "id"        => $period->class_1->id,
                                        "name"      => $period->class_1->name,
                                        "point"     => $period->point_1,
                                        "color"     => $period->class_1->color,
                                        "image"     => $period->class_1->image,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "id"        => $period->class_2->id,
                                        "name"      => $period->class_2->name,
                                        "point"     => $period->point_2,
                                        "color"     => $period->class_2->color,
                                        "image"     => $period->class_2->image,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "id"        => $period->class_3->id,
                                        "name"      => $period->class_3->name,
                                        "point"     => $period->point_3,
                                        "color"     => $period->class_3->color,
                                        "image"     => $period->class_3->image,
                                        "status"    => $period->status,
                                    ),
                                    array (
                                        "id"        => $period->class_4->id,
                                        "name"      => $period->class_4->name,
                                        "point"     => $period->point_4,
                                        "color"     => $period->class_4->color,
                                        "image"     => $period->class_4->image,
                                        "status"    => $period->status,
                                    ),
                                );
                                usort($school_classes, function($a, $b) {
                                    if($a['point'] == $b['point']) return 0;
                                    return $a['point'] < $b['point'] ? 1:-1;
                                });
                                @endphp
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        @foreach($school_classes as $class)
                                            @if($class['status'] == 1)
                                                @if ($loop->first)
                                                    <h4>
                                                        <a href="{{ route('get-period-detail-info', ['id' => $period->id] ) }}"
                                                           class="fw-bold {{ $class['color'] }}-color-link">
                                                            {{ $period->name }}
                                                        </a>
                                                    </h4>
                                                    <p><span class="fw-bold">{{ $period->school->name }}</span>
                                                        okulundaki {{ $period->description }}</p>
                                                    <p>
                                                        Bu dönem devam etmektedir. Şuan
                                                        <span class="fw-bold ct-{{ $class['color'] }}">{{$class['point']}}</span>
                                                        puan ile
                                                        <span class="fw-bold ct-{{ $class['color'] }}">{{$class['name']}} <i
                                                                    class="fa fa-trophy"></i></span> liderliği elinde
                                                        bulundurmaktadır.
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
                                                <div class="content-front bg-{{ $class['color'] }}-color">
                                                    <div class="cf-inner">
                                                        <div class="inner">
                                                            @if ($loop->first)
                                                                <div class="trophy-inner bg-{{$class['color']}}-color">
                                                                    <img src="{{asset('img/icon/period-cup.png')}}" alt="">
                                                                </div>
                                                            @endif
                                                            <img class="img-fluid p-2" src="{{ $class['image'] }}"
                                                                 alt="{{ $class['name'] }}"/>
                                                            <p class="text-center p-2 rounded">{{ $class['name'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content-back bg-{{ $class['color'] }}-color">
                                                    <div class="cf-inner">
                                                        <div class="inner">
                                                            <h4 class="text-center p-2 rounded">{{ $class['name'] }}</h4>
                                                            <p class="text-center p-2 rounded">{{ $class['point']  }}
                                                                Puan</p>
                                                            @if ($loop->first)
                                                                <div class="trophy-inner-back {{$class['color']}}-badge-inner">
                                                                    <img src="{{asset('img/icon/period-cup.png')}}" alt="">
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
                            @endforeach
                            @include('components.non-active-period')
                            @include('components.past-period')
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
    moment.locale('tr');

    var currentDateUpdate = null, date = null, periodStartDate = null, periodEndDate = null, remainingTime = null, currentDate = null, da = null;

    var update = function () {
        date = moment(new Date());
        periodStartDate = <?php echo json_encode($period_start_date) ?>;
        periodEndDate = <?php echo json_encode($period_end_date) ?>;

        const periodStartDate1 = new Date(periodStartDate);
        const periodEndDate1 = new Date(periodEndDate);
        const currentDate1 = new Date(moment().format('YYYY-MM-Do HH:mm:ss'));
        const diffTime1 = Math.abs(currentDate1 - periodStartDate1);
        const diffTime2 = Math.abs(currentDate1 - periodEndDate1);

        var x = diffTime1; var y = diffTime2;
        var start = moment.duration(x, 'milliseconds');
        var end = moment.duration(y, 'milliseconds');
        function msToTime(s) {
            var ms = s % 1000;
            s = (s - ms) / 1000;
            var secs = s % 60;
            s = (s - secs) / 60;
            var mins = s % 60;
            var hrs = (s - mins) / 60;

            return (hrs) + ' saat ' + (mins) + ' dakika ' + (secs) + ' saniye';
        }
        startdate.html(msToTime(start));
        enddate.html(msToTime(end));
        if(start == 0) {
            location.reload();
        }
        if(end == 0) {
            location.reload();
        }
    };
    startdate = $('#start-date-period');
    enddate = $('#end-date-period');

    update();
    setInterval(update, 1000);
</script>
@stop
