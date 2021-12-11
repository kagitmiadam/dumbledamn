<div class="card-title location-information">
    <div class="img-field">
        <img src="../{{ $location->image }}" class="" alt="">
        <div class="hide-mobile">
            <div class="text-field">
                <p>
                    @if($location->name == "Gryffindor" or $location->name == "Slytherin" or $location->name == "Hufflepuff" or $location->name == "Ravenclaw")
                        {{ $location->name . $houses_suffix }}
                    @else
                        {{ $location->name }}
                    @endif
                </p>
                @include('location.components.npc-check')
                <p class="f-12">
                    {{ $location->location_type->name }}
                </p>
            </div>
        </div>
    </div>

    <div class="hide-web">
        <div class="web-text-field mt-2 text-center">
            <p class="fw-bold">
                @if($location->name == "Gryffindor" or $location->name == "Slytherin" or $location->name == "Hufflepuff" or $location->name == "Ravenclaw")
                    {{ $location->name . $houses_suffix }}
                @else
                    {{ $location->name }}
                @endif
            </p>
            @include('location.components.npc-check')
        </div>
        <hr>
    </div>
    
    <div class="bg-overlay hide-mobile"></div>
</div>

<div class="outer-text-field">
    <p>{{ $location->description }}</p>
</div>