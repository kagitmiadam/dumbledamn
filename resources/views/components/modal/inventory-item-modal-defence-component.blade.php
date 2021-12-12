@if($item_name == "Asa")
    @isset(Auth::user()->character->wand_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span>{{ Auth::user()->character->wand->defence_power }}</span>
        </p>
        @if($item->item->defence_power > Auth::user()->character->wand->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>+{{ $item->item->defence_power - Auth::user()->character->wand->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz +{{ $item->item->defence_power - Auth::user()->character->wand->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->wand->defence_power) }} olacaktır.</span>
            </p>
        @elseif($item->item->defence_power == Auth::user()->character->wand->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->wand->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->wand->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz {{ $item->item->defence_power - Auth::user()->character->wand->defence_power }} azalarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->wand->defence_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Savunma Gücü Değişimi:</span>
            <span>+{{ $item->item->defence_power }}</span>
        </p>
        <p>
            <span>Mevcut savunma gücünüz +{{ $item->item->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power) }} olacaktır.</span>
        </p>
    @endisset
@elseif($item_name == "Pelerin")
    @isset(Auth::user()->character->gown_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span>{{ Auth::user()->character->gown->defence_power }}</span>
        </p>
        @if($item->item->defence_power > Auth::user()->character->gown->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>+{{ $item->item->defence_power - Auth::user()->character->gown->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz +{{ $item->item->defence_power - Auth::user()->character->gown->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->gown->defence_power) }} olacaktır.</span>
            </p>
        @elseif($item->item->defence_power == Auth::user()->character->gown->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->gown->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->gown->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz {{ $item->item->defence_power - Auth::user()->character->gown->defence_power }} azalarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->gown->defence_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Savunma Gücü Değişimi:</span>
            <span>+{{ $item->item->defence_power }}</span>
        </p>
        <p>
            <span>Mevcut savunma gücünüz +{{ $item->item->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power) }} olacaktır.</span>
        </p>
    @endisset
@elseif($item_name == "Evcil Hayvan")
    @isset(Auth::user()->character->pet_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span>{{ Auth::user()->character->pet->defence_power }}</span>
        </p>
        @if($item->item->defence_power > Auth::user()->character->pet->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>+{{ $item->item->defence_power - Auth::user()->character->pet->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz +{{ $item->item->defence_power - Auth::user()->character->pet->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->pet->defence_power) }} olacaktır.</span>
            </p>
        @elseif($item->item->defence_power == Auth::user()->character->pet->defence_power)
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->pet->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Savunma Gücü Değişimi:</span>
                <span>{{ $item->item->defence_power - Auth::user()->character->pet->defence_power }}</span>
            </p>
            <p>
                <span>Mevcut savunma gücünüz {{ $item->item->defence_power - Auth::user()->character->pet->defence_power }} azalarak {{ Auth::user()->character->defence_power + ($item->item->defence_power - Auth::user()->character->pet->defence_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Savunma Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Savunma Gücü Değişimi:</span>
            <span>+{{ $item->item->defence_power }}</span>
        </p>
        <p>
            <span>Mevcut savunma gücünüz +{{ $item->item->defence_power }} artarak {{ Auth::user()->character->defence_power + ($item->item->defence_power) }} olacaktır.</span>
        </p>
    @endisset
@endif