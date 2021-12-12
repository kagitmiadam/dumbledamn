<section id="sidebar" class="br-{{$user->character->school_class->color}}">
    <ul>
        <li>
            <a href="{{route('get-auth-homepage')}}" class="title">
                Dumbledamn
            </a>
        </li>
        <li class="menu">
            <a href="{{route('get-school', ['id' => 1])}}" class="menu-link">
                <span>
                    <img src="{{asset('img/icon/school.png')}}" alt="" class="invert">
                </span>
                <span>Okul: {{$user->character->school->name}}</span>
            </a>
        </li>
        <li class="menu">
            <a href="{{route('get-school', ['id' => 1])}}" class="menu-link">
                <span>Bina: <img src="{{asset($user->character->school_class->image)}}" alt="" class="img-right"></span>
            </a>
        </li>
        <li class="menu">
            <a href="{{route('get-school', ['id' => 1])}}" class="menu-link">
                <span>Sınıf: {{$user->character->school_grade->name}}</span>
            </a>
        </li>
        <li class="menu">
            <a href="{{route('get-character')}}" class="menu-link">
                <span>
                    <img src="{{asset('img/icon/cloak.png')}}" alt="" class="invert">
                </span>
                <span>Karakter Bilgileri</span>
            </a>
        </li>
        <!-- Mekanlar -->
        @foreach($locations as $location)
            @if($location->location_affiliation === null)
                <li class="menu sub-menu-field">
                    <a href="@if ($location->sub_location_status == 'Pasif') {{ route('get-location', ['id' => $location->id] ) }} @else # @endif" class="menu-link">
                        @if($location->image != "")
                        <span>
                            <img src="{{asset($location->icon)}}" alt="" class="invert">
                        </span>
                        @endif
                        <span>
                            {{ $location->name }}
                        </span>
                        @if($location->sub_location_status === "Aktif")
                        <span>
                            <img src="{{asset('img/icon/chevron-arrow-down.png')}}" class="down" alt="" class="invert">
                        </span>
                        @endif
                    </a>
                    @if($location->sub_location_status === "Aktif")
                        <ul class="sub-menu">
                            @foreach($sub_locations->where('location_affiliation', $location->name) as $sub_location)
                                @if($sub_location->location_type->name == 'Derslik')
                                    @if ($character_lessons->count() > 0)
                                        @foreach ($character_lessons as $character_lesson)
                                            @if ($sub_location->id == $character_lesson->lesson->location_id)
                                            <li class="inner-menu">
                                                <a href="
                                                @if ($sub_location->location_type->name == 'Derslik') {{ route('get-classroom', ['id' => $sub_location->id] ) }} @endif
                                                ">
                                                    <span>{{$sub_location->name}}</span>
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach
                                    @else
                                        @if($loop->first)
                                            <li class="inner-menu">
                                                <a href="{{route('get-school', ['id' => 1])}}">
                                                    <span>Ders Seçimi</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @else
                                    <li class="inner-menu">
                                        <a href="
                                        @if ($sub_location->location_type->name == 'Asa Dükkanı') {{ route('get-wand-shop', ['id' => $sub_location->id] ) }}
                                        @elseif ($sub_location->location_type->name == 'Cüppe Dükkanı') {{ route('get-gown-shop', ['id' => $sub_location->id] ) }}
                                        @elseif ($sub_location->location_type->name == 'Quidditch Dükkanı') {{ route('get-broom-shop', ['id' => $sub_location->id] ) }}
                                        @elseif ($sub_location->location_type->name == 'Evcil Hayvan Dükkanı') {{ route('get-pet-shop', ['id' => $sub_location->id] ) }}
                                        @elseif ($sub_location->location_type->name == 'Kitap Dükkanı') {{ route('get-book-shop', ['id' => $sub_location->id] ) }}
                                        @else {{ route('get-location', ['id' => $sub_location->id] ) }} @endif
                                        ">
                                            <span>{{$sub_location->name}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</section>