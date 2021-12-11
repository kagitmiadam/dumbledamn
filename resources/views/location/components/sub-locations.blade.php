<div>
    @if($cltc == 1 or $cltc == 3)
        @if($location->role_play_status == "Aktif")
            <div class="row d-flex d-around">
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.role-play-link')
                    @include('location.components.role-play-status')
                @else
                    @include('location.components.location-type-link')
                @endif
            </div>
            <hr>
        @endif
    @elseif($cltc == 2)
        @include('role-play.components.title-check')
    @endif

    @php $count = 0; @endphp
    @foreach($locations->where('location_affiliation', $location->name)->sortBy('name') as $sub_location)
        @isset($sub_location)
            @php $count = 1; @endphp
        @endisset
    @endforeach

    @if($location->sub_location_status == "Aktif" and $count > 0)
        @if(Auth::user()->character->role_play_status == 0)
            <div>
                <p class="title">
                    Bağlı Yerler
                </p>
                <div class="row mt-2">
                    @foreach($locations->where('location_affiliation', $location->name)->sortBy('name') as $sub_location)
                        @if($sub_location->location_type->name != "Bina" and $sub_location->location_type->name != "Derslik")
                            <div class="col-md-4 pt-10px pb-10px">
                                <div class="link-alignment">
                                    <a href="{{ route('get-location', ['id' => $sub_location->id] ) }}" class="@include('components.other.class-color-button-trs') rounded">
                                        {{ $sub_location->name }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{-- Binalar--}}
                    @foreach($locations->sortBy('name') as $sub_location)
                        @if($sub_location->location_type->name == "Bina")
                            @if($sub_location->location_affiliation == $location->name)
                                @php $house_status = 1; @endphp
                            @else
                                @php $house_status = 0; @endphp
                            @endif
                        @endif
                    @endforeach
                    @if($house_status == 1)
                        <div class="col-md-12 mb-2">
                            <hr>
                            <p class="title">Binalar</p>
                        </div>
                    @endif
                    @foreach($locations->where('location_affiliation', $location->name)->sortBy('name') as $sub_location)
                        @if($sub_location->location_type->name == "Bina" and Auth::user()->character->classes->name == $sub_location->name)
                            <div class="col-md-4 pt-10px pb-10px">
                                <div class="link-alignment">
                                    <a href="{{ route('get-location', ['id' => $sub_location->id] ) }}" class="@include('components.other.class-color-button-trs') rounded">
                                        {{ $sub_location->name . $houses_suffix }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- Derslikler--}}
                    @php $classroom_status = ""; @endphp
                    @foreach($locations->sortBy('name') as $sub_location)
                        @if($sub_location->location_type->name == "Derslik")
                            @if($sub_location->location_affiliation == $location->name)
                                @foreach(Auth::user()->character->character_lessons
                                    ->where('character_id', Auth::user()->character->id)
                                    ->where('status', 1) as $character_lesson)
                                    @if(Auth::user()->character->school_grade->id == $character_lesson->lesson->school_grade_id)
                                        @php $classroom_status = 1; @endphp
                                    @else
                                        @php $classroom_status = 0; @endphp
                                    @endif
                                @endforeach
                            @else
                                @php $classroom_status = 0; @endphp
                            @endif
                        @endif
                    @endforeach
                    @if($classroom_status == 1)
                        <div class="col-md-12 mb-2">
                            <hr>
                            <p class="title">Derslikler</p>
                        </div>
                    @endif
                    @foreach(Auth::user()->character->character_lessons
                        ->where('character_id', Auth::user()->character->id)
                        ->where('status', 1) as $character_lesson)
                        @if(Auth::user()->character->school_grade->id == $character_lesson->lesson->school_grade_id and $classroom_status == 1)
                            <div class="col-md-4 pt-10px pb-10px">
                                <div class="link-alignment">
                                    <a href="{{ route('get-location', ['id' => $character_lesson->lesson->location_id] ) }}" class="@include('components.other.class-color-button-trs') rounded">
                                        {{ $character_lesson->lesson->name }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            @include('role-play.components.active-role-info')
        @endif
    @endif
</div>