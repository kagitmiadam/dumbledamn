@if($item->item->type == "Asa")
    @isset(Auth::user()->character->wand_id)
        @if($item->item->attack_power > Auth::user()->character->wand->attack_power and $item->item->defence_power > Auth::user()->character->wand->defence_power)
            <i class="fa fa-chevron-up"></i>
        @endif
    @else
        <i class="fa fa-chevron-up"></i>
    @endisset
@endif
@if($item->item->type == "Pelerin")
    @isset(Auth::user()->character->gown_id)
        @if($item->item->attack_power > Auth::user()->character->gown->attack_power and $item->item->defence_power > Auth::user()->character->gown->defence_power)
            <i class="fa fa-chevron-up"></i>
        @endif
    @else
        <i class="fa fa-chevron-up"></i>
    @endisset
@endif
@if($item->item->type == "Evcil Hayvan")
    @isset(Auth::user()->character->pet_id)
        @if($item->item->attack_power > Auth::user()->character->pet->attack_power and $item->item->defence_power > Auth::user()->character->pet->defence_power)
            <i class="fa fa-chevron-up"></i>
        @endif
    @else
        <i class="fa fa-chevron-up"></i>
    @endisset
@endif
@if($item->item->type == "Süpürge")
    @isset(Auth::user()->character->broom_id)
        @if($item->item->attack_power > Auth::user()->character->broom->attack_power)
            <i class="fa fa-chevron-up"></i>
        @endif
    @else
        <i class="fa fa-chevron-up"></i>
    @endisset
@endif