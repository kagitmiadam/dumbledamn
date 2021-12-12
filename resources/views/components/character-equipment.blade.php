<p class="title">{{$current_equipment}}</p>
<hr>
<div class="character-equipment">
    <div class="equipment-box" class="icon cursor-pointer">
        <p class="title">Asa</p>
        @if ($user->character->wand_id != "")
        <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->wand->name}}">
            <img src="{{$user->character->wand->image}}" alt="">
        </div>
        @else
        <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut asanız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
        </div>
        @endif
    </div>
    <div class="equipment-box" class="icon cursor-pointer">
        <p class="title">Pelerin</p>
        @if ($user->character->gown_id != "")
        <div class="item gown dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->gown->name}}">
            <img src="{{$user->character->gown->image}}" alt="">
        </div>
        @else
        <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut pelerininiz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
        </div>
        @endif
    </div>
    <div class="equipment-box" class="icon cursor-pointer">
        <p class="title">Evcil Hayvan</p>
        @if ($user->character->pet_id != "")
        <div class="item pet dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->pet->name}}">
            <img src="{{$user->character->pet->image}}" alt="">
        </div>
        @else
        <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut evcil hayvanınız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
        </div>
        @endif
    </div>
    <div class="equipment-box" class="icon cursor-pointer">
        <p class="title">Süpürge</p>
        @if ($user->character->broom_id != "")
        <div class="item broom dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->broom->name}}">
            <img src="{{$user->character->broom->image}}" alt="">
        </div>
        @else
        <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut süpürgeniz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
        </div>
        @endif
    </div>
</div>