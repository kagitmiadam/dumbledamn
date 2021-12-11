@foreach(Auth::user()->character->character_lessons as $character_lesson)
    @if($character_lesson->status == 0 and
        $character_lesson->lesson->location_id == $location->id and
        $character_lesson->lesson->name == $location->name and
        $character_lesson->lesson->class_number->id == Auth::user()->character->school_grade->id)
        <div class="col-md-12">
            <div class="alert m-0 @include('components.other.class-color-alert')">
                    <span class="fw-bold">
                        {{ $character_lesson->lesson->name }}
                        {{ $character_lesson->lesson->class_number->name }}
                    </span>
                dersini almadığınız için bu derse katılamaz, ödevlerini yapamazsınız.
            </div>
        </div>
    @endif
@endforeach