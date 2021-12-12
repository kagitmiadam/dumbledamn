@if($item_name == "Asa")
    @isset($user->character->wand_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span>{{ $user->character->wand->attack_power }}</span>
        </p>
        @if($item->attack_power > $user->character->wand->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>+{{ $item->attack_power - $user->character->wand->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz +{{ $item->attack_power - $user->character->wand->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power - $user->character->wand->attack_power) }} olacaktır.</span>
            </p>
        @elseif($item->attack_power == $user->character->wand->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->wand->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->wand->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz {{ $item->attack_power - $user->character->wand->attack_power }} azalarak {{ $user->character->attack_power + ($item->attack_power - $user->character->wand->attack_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Saldırı Gücü Değişimi:</span>
            <span>+{{ $item->attack_power }}</span>
        </p>
        <p>
            <span>Mevcut saldırı gücünüz +{{ $item->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power) }} olacaktır.</span>
        </p>
    @endisset
@elseif($item_name == "Pelerin")
    @isset($user->character->gown_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span>{{ $user->character->gown->attack_power }}</span>
        </p>
        @if($item->attack_power > $user->character->gown->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>+{{ $item->attack_power - $user->character->gown->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz +{{ $item->attack_power - $user->character->gown->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power - $user->character->gown->attack_power) }} olacaktır.</span>
            </p>
        @elseif($item->attack_power == $user->character->gown->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->gown->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->gown->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz {{ $item->attack_power - $user->character->gown->attack_power }} azalarak {{ $user->character->attack_power + ($item->attack_power - $user->character->gown->attack_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Saldırı Gücü Değişimi:</span>
            <span>+{{ $item->attack_power }}</span>
        </p>
        <p>
            <span>Mevcut saldırı gücünüz +{{ $item->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power) }} olacaktır.</span>
        </p>
    @endisset
@elseif($item_name == "Evcil Hayvan")
    @isset($user->character->pet_id)
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span>{{ $user->character->pet->attack_power }}</span>
        </p>
        @if($item->attack_power > $user->character->pet->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>+{{ $item->attack_power - $user->character->pet->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz +{{ $item->attack_power - $user->character->pet->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power - $user->character->pet->attack_power) }} olacaktır.</span>
            </p>
        @elseif($item->attack_power == $user->character->pet->attack_power)
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->pet->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz değişmeyecektir.</span>
            </p>
        @else
            <p>
                <span class="text-underline">Saldırı Gücü Değişimi:</span>
                <span>{{ $item->attack_power - $user->character->pet->attack_power }}</span>
            </p>
            <p>
                <span>Mevcut saldırı gücünüz {{ $item->attack_power - $user->character->pet->attack_power }} azalarak {{ $user->character->attack_power + ($item->attack_power - $user->character->pet->attack_power) }} olacaktır.</span>
            </p>
        @endif
    @else
        <p>
            <span class="text-underline">Mevcut {{ $item_name }} Saldırı Gücü:</span>
            <span data-toggle="tooltip" data-placement="top" title="Mevcut {{ $item_name1 }} bulunmuyor."><i class="fa fa-info-circle"></i></span>
        </p>
        <p>
            <span class="text-underline">Saldırı Gücü Değişimi:</span>
            <span>+{{ $item->attack_power }}</span>
        </p>
        <p>
            <span>Mevcut saldırı gücünüz +{{ $item->attack_power }} artarak {{ $user->character->attack_power + ($item->attack_power) }} olacaktır.</span>
        </p>
    @endisset
@endif