<section id="sidebar" class="br-{{$user->character->school_class->color}}">
    <ul>
        <li>
            <a href="#" class="title">
                Dumbledamn
            </a>
        </li>
        <li class="menu">
            <a href="#" class="menu-link">
                <span>
                    <img src="{{asset('img/icon/school.png')}}" alt="" class="invert">
                </span>
                <span>Okul: {{$user->character->school->name}}</span>
            </a>
        </li>
        <li class="menu">
            <a href="#" class="menu-link">
                <span>Bina: <img src="{{asset($user->character->school_class->image)}}" alt="" class="img-right"></span>
            </a>
        </li>
        <li class="menu">
            <a href="#" class="menu-link">
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
            @if($location->sub_location_status === "Aktif" && $location->location_affiliation === null)
                <li class="menu sub-menu-field">
                    {{-- <a href="{{ route('get-location', ['id' => $location->id] ) }}" class="menu-link"> --}}
                    <a href="#" class="menu-link">
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
                        @foreach($sub_locations->where('location_affiliation', $location->name) as $sub_location)
                            <ul class="sub-menu">
                                <li class="inner-menu">
                                    <a href="{{ route('get-location', ['id' => $sub_location->id] ) }}">
                                        <span>{{$sub_location->name}}</span>
                                    </a>
                                </li>
                            </ul>
                        @endforeach
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</section>