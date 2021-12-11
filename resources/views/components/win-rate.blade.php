@if($classes_cup_wins->count() > 0)
<div class="row">
    @php
        $class_cup_win_1 = 0;
        $class_cup_win_2 = 0;
        $class_cup_win_3 = 0;
        $class_cup_win_4 = 0;
    @endphp
    @foreach($classes_cup_wins as $classes_cup_win)
        @php
            $class_name_1 = $classes_cup_win->class_1->name;
            $class_name_2 = $classes_cup_win->class_2->name;
            $class_name_3 = $classes_cup_win->class_3->name;
            $class_name_4 = $classes_cup_win->class_4->name;
            $class_color_1 = $classes_cup_win->class_1->color;
            $class_color_2 = $classes_cup_win->class_2->color;
            $class_color_3 = $classes_cup_win->class_3->color;
            $class_color_4 = $classes_cup_win->class_4->color;
        @endphp
    @endforeach
    @foreach($classes_cup_wins as $classes_cup_win)
        @if($classes_cup_win->point_1 > $classes_cup_win->point_2 and $classes_cup_win->point_1 > $classes_cup_win->point_3 and $classes_cup_win->point_1 > $classes_cup_win->point_4)
            @php
                $class_cup_win_1 = $class_cup_win_1 + 1;
                $class_color_1 = $classes_cup_win->class_1->color;
            @endphp
        @endif
        @if($classes_cup_win->point_2 > $classes_cup_win->point_1 and $classes_cup_win->point_2 > $classes_cup_win->point_3 and $classes_cup_win->point_2 > $classes_cup_win->point_4)
            @php
                $class_cup_win_2 = $class_cup_win_2 + 1;
                $class_color_2 = $classes_cup_win->class_2->color;
            @endphp
        @endif
        @if($classes_cup_win->point_3 > $classes_cup_win->point_1 and $classes_cup_win->point_3 > $classes_cup_win->point_2 and $classes_cup_win->point_3 > $classes_cup_win->point_4)
            @php
                $class_cup_win_3 = $class_cup_win_3 + 1;
                $class_color_3 = $classes_cup_win->class_3->color;
            @endphp
        @endif
        @if($classes_cup_win->point_4 > $classes_cup_win->point_1 and $classes_cup_win->point_4 > $classes_cup_win->point_2 and $classes_cup_win->point_4 > $classes_cup_win->point_3)
            @php
                $class_cup_win_4 = $class_cup_win_4 + 1;
                $class_color_4 = $classes_cup_win->class_4->color;
            @endphp
        @endif
    @endforeach
    @php
        $classes_infos = array (
        array (
            "name"      => $class_name_1,
            "cup_win"   => $class_cup_win_1,
            "color"     => $class_color_1,
        ),
        array (
            "name"      => $class_name_2,
            "cup_win"   => $class_cup_win_2,
            "color"     => $class_color_2,
        ),
        array (
            "name"      => $class_name_3,
            "cup_win"   => $class_cup_win_3,
            "color"     => $class_color_3,
        ),
        array (
            "name"      => $class_name_4,
            "cup_win"   => $class_cup_win_4,
            "color"     => $class_color_4,
        ),
    );
    usort($classes_infos, function($a, $b) {
        if($a['cup_win'] == $b['cup_win']) return 0;
        return $a['cup_win'] < $b['cup_win'] ? 1:-1;
    });
    @endphp
    @foreach($classes_infos as $classes_info)
        <div class="col-md-12 col-12 mb-1">
            <div class="information-alignment">
                <div class="alert ct-bg-{{ $classes_info['color'] }} ct-{{ $classes_info['color'] }}-text">
                    <div class="text-center">
                        <strong>{{ $classes_info['name'] }}</strong> şimdiye kadar <strong>{{ $classes_info['cup_win'] }}</strong> dönem kupası
                        <i class="fa fa-trophy"></i> kazanmıştır.
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    <div class="period-alert bg-{{$user->character->school_class->color}}-color">
        Henüz biten bir dönem bulunmamaktadır.
    </div>
@endif
<hr>