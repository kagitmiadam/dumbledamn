<div class="row d-flex d-around">
    @foreach(Auth::user()->character->character_lessons as $character_lesson)
        @if($character_lesson->status == 1 and
            $character_lesson->lesson->location_id == $location->id and
            $character_lesson->lesson->name == $location->name and
            $character_lesson->lesson->class_number->id == Auth::user()->character->school_grade->id)
            @include('location.components.location-type-link')
        @endif
    @endforeach
    @include('location.components.role-play-link')
    @include('location.components.role-play-status')
    @include('location.components.classroom-check')
</div>