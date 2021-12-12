@if($item_name == "Süpürge")
    @isset(Auth::user()->character->broom_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Hız:</span>
            <span>{{ Auth::user()->character->broom->speed_power }}</span>
        </p>
        @if($item->item->speed_power > Auth::user()->character->broom->speed_power)
            <p>
                <span class="text-underline">Hız Değişimi:</span>
                <span>+{{ $item->item->speed_power - Auth::user()->character->broom->speed_power }}</span>
            </p>
            <p>
                <span>Mevcut hız +{{ $item->item->speed_power - Auth::user()->character->broom->speed_power }} artarak {{ Auth::user()->character->speed_power + ($item->item->speed_power - Auth::user()->character->broom->speed_power) }} olacaktır.</span>
            </p>
        @elseif($item->item->speed_power == Auth::user()->character->broom->speed_power)
            <p>
                <span class="text-underline">Hız Değişimi:</span>
                <span>{{ $item->item->speed_power - Auth::user()->character->broom->speed_power }}</span>
            </p>
            <p>
                <span>Mevcut hız değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Hız Değişimi:</span>
                <span>{{ $item->item->speed_power - Auth::user()->character->broom->speed_power }}</span>
            </p>
            <p>
                <span>Mevcut hız {{ $item->item->speed_power - Auth::user()->character->broom->speed_power }} azalarak {{ Auth::user()->character->speed_power + ($item->item->speed_power - Auth::user()->character->broom->speed_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Hız:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Hız Değişimi:</span>
            <span>+{{ $item->item->speed_power }}</span>
        </p>
        <p>
            <span>Mevcut hız +{{ $item->item->speed_power }} artarak {{ Auth::user()->character->speed_power + ($item->item->speed_power) }} olacaktır.</span>
        </p>
    @endisset
@endif