@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
<div id="auth-homepage" class="wrapper school">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">{{$location->name}}</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-content">
                                    <p>{{$user->character->school->name}} okuluna hoş geldin genç {{$user->character->gender->name}} {{$user->name}}.</p>
                                    <p>Aşağıda bulunan ders listesinden kayıt olmak istediğin 3 adet dersi seçebilirsin.</p>
                                    <p>Seçmiş olduğun derslerin sınavlarına girerek, bir üst sınıfa geçmeye hak kazanabilirsin.</p>
                                    <p>Ayrıca sınavlara girerek, {{$user->character->school_class->name}} binana puan kazandırabilirsin.</p>
                                    @foreach ($character_lessons->where('character_id', $user->id) as $key=>$character_lesson)
                                        @if($character_lesson->count() >= 3)
                                            @if($key == 0)
                                                {{$character_lesson->count()}} adet derse kayıt oldunuz. Kayıt olduğunuz dersler; 
                                            @endif
                                            {{$character_lesson->lesson->name}},
                                        @else
                                            @if($key == 0)
                                                {{$character_lesson->count()}} adet derse kayıt oldunuz. Kayıt olduğunuz dersler; 
                                            @endif
                                            {{$character_lesson->lesson->name}},
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @php $character_lesson_check = 0 @endphp
                            @foreach ($character_lessons->where('character_id', $user->id) as $key=>$character_lesson)
                                @if($character_lesson->count() >= 3)
                                    @php $character_lesson_check = 1 @endphp
                                @else
                                    @php $character_lesson_check = 0 @endphp
                                @endif
                            @endforeach
                            @if($character_lesson_check == 0)
                                @foreach ($all_lessons->where('school_grade_id', $user->character->school_grade_id) as $lesson)
                                    <div class="col-md-2 col-6">
                                        <div class="lesson-content" data-bs-toggle="modal" data-bs-target="#lessonInfo{{ $lesson->id }}">
                                            <img src="{{asset($lesson->image)}}" alt="" class="icon dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$lesson->school_grade->name}} {{$lesson->name}}">
                                        </div>
                                    </div>
                                    @include('components.modal.lesson-info')
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
