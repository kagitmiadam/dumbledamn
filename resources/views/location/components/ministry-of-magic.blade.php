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

@php $count = 0; @endphp
@foreach($locations->where('location_affiliation', $location->name)->sortBy('name') as $sub_location)
    @isset($sub_location)
        @php $count = 1; @endphp
    @endisset
@endforeach

@if($location->sub_location_status == "Aktif" and $count > 0)
    @if(Auth::user()->character->role_play_status == 0)
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
        </div>
    @else
        @include('role-play.components.active-role-info')
    @endif
@else
    @include('location.components.no-count')
@endif