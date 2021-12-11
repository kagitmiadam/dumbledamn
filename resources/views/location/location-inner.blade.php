<div class="col-md-12">
    <div class="card sub-location">
        <div class="card-body">
            @php $houses_suffix = " Bölgeleri" @endphp
            {{-- Açıklama Kısmı --}}
            @include('location.components.description')
            <hr>
            @if ($location->location_type->name == "Bölge")
                @include('location.components.sub-locations')
            @elseif ($location->location_type->name == "Okul")
                @include('location.components.sub-locations')
            @elseif ($location->location_type->name == "Bina")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.location-type.house')
                    @include('location.components.house')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Ortak Salon")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.location-type.house')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Büyücü Yatakhanesi")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.dormitory')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Cadı Yatakhanesi")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.dormitory')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Derslik")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.classroom')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Asa Dükkanı" or
                    $location->location_type->name == "Cüppe Dükkanı" or
                    $location->location_type->name == "Quidditch Dükkanı" or
                    $location->location_type->name == "Evcil Hayvan Dükkanı" or
                    $location->location_type->name == "Malzeme Dükkanı" or
                    $location->location_type->name == "Tüy Kalem Dükkanı" or
                    $location->location_type->name == "İksir Dükkanı" or
                    $location->location_type->name == "Han" or
                    $location->location_type->name == "Kitap Dükkanı" or
                    $location->location_type->name == "Tren İstasyonu")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.shop')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Yerleşke")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.campus')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Macera")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.adventures')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @elseif ($location->location_type->name == "Sihir Bakanlığı")
                @if(Auth::user()->character->role_play_status == 0)
                    @include('location.components.ministry-of-magic')
                @else
                    @include('role-play.components.active-role-info')
                @endif
            @else
                @include('location.components.no-count')
            @endif
        </div>
    </div>
</div>