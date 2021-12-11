@if(Auth::user()->character->classes->name == $location->)
    <p class="title">
        Bağlı Yerler
    </p>
    <div class="row mt-2">
        @foreach($locations->sortBy('location_type_id') as $sub_location)
            @if($sub_location->location_type_id != 1)
                @if($sub_location->location_affiliation == $location->id)
                    <div class="col-md-4 pt-10px pb-10px">
                        <div class="link-alignment">
                            <a href="{{ route('get-location', ['id' => $sub_location->id] ) }}"
                               class="@include('components.other.class-color-button-trs') rounded">
                                {{ $sub_location->name }}
                            </a>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
@else
    YASAK
@endif