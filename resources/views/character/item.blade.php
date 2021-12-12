@extends('layouts.auth-homepage')

@section('title', 'Dumbledamn')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">Karakter Envanteri</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Envanterinizde bulunan bütün ekipmanları aşağıda görebilirsiniz. Kuşanmak istediğiniz ekipmanın üzerine tıklayarak açılan pencerede değer karşılaştırması yaparak kuşanabilirsiniz. Mevcut kuşanmış olduğunuz ekipmanlardan daha iyi bir ekipmana sahipseniz, yanında yukarı ok ile işaretlenmiş olarak görebilirsiniz.
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <tr class="title-field">
                                            <td class="text-center bg-dark-theme text-white fw-bold">Ekipman Adı</td>
                                            <td class="text-center bg-dark-theme text-white fw-bold">Açıklaması</td>
                                            <td class="text-center bg-dark-theme text-white fw-bold">Mevcut</td>
                                            <td class="text-center bg-dark-theme text-white fw-bold">Eylem</td>
                                        </tr>
                                        @foreach($character_items->where('count', '>', '0') as $item)
                                            <tr class="content-field">
                                                <td data-toggle="modal" data-bs-toggle="modal" data-bs-target="#itemInfo{{ $item->item->id }}" class="cursor-pointer">
                                                    <span class="dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $item->item->name }} ekipmanı hakkında bilgi almak için tıklayın.">
                                                        {{ $item->item->short_name }}
                                                        @if($item->item->tier_id)
                                                            <span class="f-12">({{ $item->item->tier->name }})</span>
                                                        @endif
                                                        @include('components.equipment-check')
                                                    </span>
                                                </td>
                                                <td>{{ $item->item->description }}</td>
                                                <td class="text-center">{{ $item->count }}</td>
                                                <td>
                                                    <div class="d-flex d-center d-align">
                                                        <form action="/item/wear" method="POST">
                                                            @csrf
                                                            <input type="text" name="item_type" id="item_type" value="{{ $item->item->type }}" hidden/>
                                                            <input type="text" name="character_id" id="character_id" value="{{ Auth::user()->character->id }}" hidden/>
                                                            @php
                                                                $item_type = $item->item->type;
                                                                $item_id = $item->item->id;
                                                                $attack_power = $item->item->attack_power;
                                                                $defence_power = $item->item->defence_power;
                                                                $speed_power = $item->item->speed_power;
                                                                $equipped_item_id = Auth::user()->character->wand_id;
                                                                $current_item_check = "";
                    
                                                                if ($item_type == "Asa") {
                                                                    if (Auth::user()->character->wand_id == null) {
                                                                        $equipped_item_id = "";
                                                                        $new_attack_power = Auth::user()->character->attack_power + $attack_power;
                                                                        $new_defence_power = Auth::user()->character->defence_power + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    } else {
                                                                        $equipped_item_id = Auth::user()->character->wand_id;
                                                                        $new_attack_power1 = Auth::user()->character->attack_power - Auth::user()->character->wand->attack_power;
                                                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                                                        $new_defence_power1 = Auth::user()->character->defence_power - Auth::user()->character->wand->defence_power;
                                                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    }
                                                                } elseif($item_type == "Evcil Hayvan") {
                                                                    if (Auth::user()->character->pet_id == null) {
                                                                        $equipped_item_id = "";
                                                                        $new_attack_power = Auth::user()->character->attack_power + $attack_power;
                                                                        $new_defence_power = Auth::user()->character->defence_power + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    } else {
                                                                        $equipped_item_id = Auth::user()->character->pet_id;
                                                                        $new_attack_power1 = Auth::user()->character->attack_power - Auth::user()->character->pet->attack_power;
                                                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                                                        $new_defence_power1 = Auth::user()->character->defence_power - Auth::user()->character->pet->defence_power;
                                                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    }
                                                                } elseif($item_type == "Pelerin") {
                                                                    if (Auth::user()->character->gown_id == null) {
                                                                        $equipped_item_id = "";
                                                                        $new_attack_power = Auth::user()->character->attack_power + $attack_power;
                                                                        $new_defence_power = Auth::user()->character->defence_power + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    } else {
                                                                        $equipped_item_id = Auth::user()->character->gown_id;
                                                                        $new_attack_power1 = Auth::user()->character->attack_power - Auth::user()->character->gown->attack_power;
                                                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                                                        $new_defence_power1 = Auth::user()->character->defence_power - Auth::user()->character->gown->defence_power;
                                                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power;
                                                                    }
                                                                } elseif($item_type == "Süpürge") {
                                                                    if (Auth::user()->character->broom_id == null) {
                                                                        $equipped_item_id = "";
                                                                        $current_item_check = false;
                                                                        $new_attack_power = Auth::user()->character->attack_power;
                                                                        $new_defence_power = Auth::user()->character->defence_power;
                                                                        $new_speed_power = Auth::user()->character->speed_power + $speed_power;
                                                                    } else {
                                                                        $equipped_item_id = Auth::user()->character->broom_id;
                                                                        $current_item_check = true;
                                                                        $new_attack_power = Auth::user()->character->attack_power;
                                                                        $new_defence_power = Auth::user()->character->defence_power;
                                                                        $new_speed_power1 = Auth::user()->character->speed_power - Auth::user()->character->broom->speed_power;
                                                                        $new_speed_power = $new_speed_power1 + $speed_power;
                                                                    }
                                                                }
                                                            @endphp
                                                            <input type="text" name="attack_power" id="attack_power" value="{{ $new_attack_power }}" hidden/>
                                                            <input type="text" name="defence_power" id="defence_power" value="{{ $new_defence_power }}" hidden/>
                                                            <input type="text" name="speed_power" id="speed_power" value="{{ $new_speed_power }}" hidden/>
                                                            <input type="text" name="id" id="id" value="{{ $item->id }}" hidden/>
                                                            <input type="text" name="item_id" id="item_id" value="{{ $item->item->id }}" hidden/>
                                                            <input type="text" name="count" id="count" value="{{ $item->count }}" hidden/>
                                                            @foreach($character_items as $character_item)
                                                                @if($character_item->item_id == $equipped_item_id)
                                                                    <input type="text" name="current_equipped_inventory_id" value="{{ $character_item->id }}" hidden/>
                                                                    <input type="text" name="current_equipped_item_id" value="{{ $character_item->item_id }}" hidden/>
                                                                    <input type="text" name="current_equipped_item_count" value="{{ $character_item->count }}" hidden/>
                                                                    @if($item->item->id == $character_item->item_id)
                                                                        <i class="fa fa-info-circle mr-1" data-toggle="tooltip" data-placement="top" title="Bu {{ $item_type }} kuşanıldı."></i>
                                                                    @elseif($item->item->id != $character_item->item_id)
                                                                        <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white rounded mr-1">
                                                                            Kuşan
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                            @if($equipped_item_id == null)
                                                                <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white rounded mr-1">
                                                                    Kuşan
                                                                </button>
                                                            @endif
                                                        </form>
                                                        <button class="dd-btn bg-{{$user->character->school_class->color}}-color text-white rounded"
                                                        data-bs-toggle="modal" data-bs-target="#itemInfo{{ $item->item->id }}">
                                                            Sat
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('components.modal.item-info-modal')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
@stop
