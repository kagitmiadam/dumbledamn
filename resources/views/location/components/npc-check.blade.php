<p class="f-12 mt-1">
    @if ($location->location_type->name == "Okul")
        @foreach($npc_characters as $npc_character)
            @if($npc_character->school->name == $location->name)
                @if($npc_character->title_1->name == "Okul Müdürü")
                    <span class="text-underline">{{ $npc_character->title_1->name }}:</span> {{ $npc_character->name }}
                @elseif($npc_character->title_2->name == "Okul Müdürü")
                    <span class="text-underline">{{ $npc_character->title_2->name }}:</span> {{ $npc_character->name }}
                @endif
            @endif
        @endforeach
    @elseif ($location->location_type->name == "Bina")
        @foreach($npc_characters as $npc_character)
            @if($npc_character->classes->name == $location->name)
                @if($npc_character->title_1->name == "Bina Başkanı")
                    <span class="text-underline">{{ $npc_character->title_1->name }}:</span> {{ $npc_character->name }}
                @elseif($npc_character->title_2->name == "Bina Başkanı")
                    <span class="text-underline">{{ $npc_character->title_2->name }}:</span> {{ $npc_character->name }}
                @endif
            @endif
        @endforeach
    @elseif ($location->location_type->name == "Ortak Salon")

    @elseif ($location->location_type->name == "Büyücü Yatakhanesi")

    @elseif ($location->location_type->name == "Cadı Yatakhanesi")

    @elseif ($location->location_type->name == "Derslik")
        @foreach($npc_characters as $npc_character)
            @if($npc_character->classroom->name == $location->name)
                @if($npc_character->title_1->name == "Profesör")
                    <span class="text-underline">{{ $npc_character->title_1->name }}:</span> {{ $npc_character->name }}
                @elseif($npc_character->title_2->name == "Profesör")
                    <span class="text-underline">{{ $npc_character->title_2->name }}:</span> {{ $npc_character->name }}
                @endif
            @endif
        @endforeach
    @elseif ($location->location_type->name == "Asa Dükkanı" or
            $location->location_type->name == "Cüppe Dükkanı" or
            $location->location_type->name == "Quidditch Dükkanı" or
            $location->location_type->name == "Evcil Hayvan Dükkanı" or
            $location->location_type->name == "Malzeme Dükkanı" or
            $location->location_type->name == "İksir Dükkanı" or
            $location->location_type->name == "Han" or
            $location->location_type->name == "Kitap Dükkanı" or
            $location->location_type->name == "Tren İstasyonu")
        @foreach($npc_characters as $npc_character)
            @if($npc_character->location_id == $location->id)
                <span class="text-underline">{{ $npc_character->title_1->name }}:</span> {{ $npc_character->name }}
            @endif
        @endforeach
    @elseif ($location->location_type->name == "Yerleşke")

    @else

    @endif
</p>