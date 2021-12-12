@php
    if ($item->item->type == "Asa") {
        $item_name = "Asa";
        $item_name1 = "asanız";
        $character_item_id = "wand_id";
    } elseif ($item->item->type == "Evcil Hayvan") {
        $item_name = "Evcil Hayvan";
        $item_name1 = "evcil hayvanınız";
        $character_item_id = "pet_id";
    } elseif ($item->item->type == "Pelerin") {
        $item_name = "Pelerin";
        $item_name1 = "pelerininiz";
        $character_item_id = "gown_id";
    } elseif ($item->item->type == "Süpürge") {
        $item_name = "Süpürge";
        $item_name1 = "süpürgeniz";
        $character_item_id = "broom_id";
    }
@endphp
<div class="modal fade" id="itemInfo{{ $item->item->id }}" tabindex="-1" aria-labelledby="itemInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="itemInfoLabel">
            {{ $item->item->short_name }}
            <small>
                ({{ $item_name }})
            </small>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <span class="text-underline">{{ $item_name }} Adı:</span>
                        <span>{{ $item->item->short_name }}</span>
                    </p>
                    @isset($item->item->wood_id)
                        <p>
                            <span class="text-underline">Ahşabı:</span>
                            <span>{{ $item->item->wood->name }}</span>
                        </p>
                    @endisset
                    <p>
                        <span class="text-underline">Açıklama:</span> {{ $item->item->description }}
                    </p>
                    <p>
                        <span class="text-underline">Envanter Miktarı:</span> {{ $item->count }}
                    </p>
                    <hr>
                </div>
                @if($item_name == "Asa" or $item_name == "Pelerin" or $item_name == "Evcil Hayvan")
                    <div class="col-md-6">
                        <p class="f-16 text-center text-underline fw-bold">Saldırı Gücü Bilgileri</p>
                        <p>
                            <span class="text-underline">Mevcut Saldırı Gücü:</span>
                            <span> {{ $user->character->attack_power }}</span>
                        </p>
                        <p>
                            <span class="text-underline">Seçilen {{ $item_name }} Saldırı Gücü:</span>
                            <span> {{ $item->item->attack_power }}</span>
                        </p>
                        @include('components.modal.inventory-item-modal-attack-component')
                    </div>
                    <div class="col-md-6">
                        <p class="f-16 text-center text-underline fw-bold">Savunma Gücü Bilgileri</p>
                        <p>
                            <span class="text-underline">Mevcut Savunma Gücü:</span>
                            <span> {{ $user->character->defence_power }}</span>
                        </p>
                        <p>
                            <span class="text-underline">Seçilen {{ $item_name }} Savunma Gücü:</span>
                            <span> {{ $item->item->defence_power }}</span>
                        </p>
                        @include('components.modal.inventory-item-modal-defence-component')
                    </div>
                @elseif($item_name == "Süpürge")
                    <div class="col-md-12">
                        <p class="f-16 text-center text-underline fw-bold">Hız Bilgileri</p>
                        <p>
                            <span class="text-underline">Mevcut Hız:</span>
                            <span> {{ $user->character->speed_power }}</span>
                        </p>
                        <p>
                            <span class="text-underline">Seçilen Süpürgenin Hız:</span>
                            <span> {{ $item->item->speed_power }}</span>
                        </p>
                        @include('components.modal.inventory-item-modal-speed-component')
                    </div>
                @endif
            </div>
            <hr>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="d-flex d-align">
                        <form action="/item/wear" method="POST">
                            @csrf
                            <input type="text" name="item_type" id="item_type" value="{{ $item->item->type }}" hidden/>
                            <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                            @php
                                $item_type = $item->item->type;
                                $item_id = $item->item->id;
                                $attack_power = $item->item->attack_power;
                                $defence_power = $item->item->defence_power;
                                $speed_power = $item->item->speed_power;
                                $equipped_item_id = $user->character->wand_id;

                                if ($item_type == "Asa") {
                                    if ($user->character->wand_id == null) {
                                        $equipped_item_id = "";
                                        $new_attack_power = $user->character->attack_power + $attack_power;
                                        $new_defence_power = $user->character->defence_power + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    } else {
                                        $equipped_item_id = $user->character->wand_id;
                                        $new_attack_power1 = $user->character->attack_power - $user->character->wand->attack_power;
                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                        $new_defence_power1 = $user->character->defence_power - $user->character->wand->defence_power;
                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    }
                                } elseif($item_type == "Evcil Hayvan") {
                                    if ($user->character->pet_id == null) {
                                        $equipped_item_id = "";
                                        $new_attack_power = $user->character->attack_power + $attack_power;
                                        $new_defence_power = $user->character->defence_power + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    } else {
                                        $equipped_item_id = $user->character->pet_id;
                                        $new_attack_power1 = $user->character->attack_power - $user->character->pet->attack_power;
                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                        $new_defence_power1 = $user->character->defence_power - $user->character->pet->defence_power;
                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    }
                                } elseif($item_type == "Pelerin") {
                                    if ($user->character->gown_id == null) {
                                        $equipped_item_id = "";
                                        $new_attack_power = $user->character->attack_power + $attack_power;
                                        $new_defence_power = $user->character->defence_power + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    } else {
                                        $equipped_item_id = $user->character->gown_id;
                                        $new_attack_power1 = $user->character->attack_power - $user->character->gown->attack_power;
                                        $new_attack_power = $new_attack_power1 + $attack_power;
                                        $new_defence_power1 = $user->character->defence_power - $user->character->gown->defence_power;
                                        $new_defence_power = $new_defence_power1 + $defence_power;
                                        $new_speed_power = $user->character->speed_power;
                                    }
                                } elseif($item_type == "Süpürge") {
                                    if ($user->character->broom_id == null) {
                                        $equipped_item_id = "";
                                        $new_attack_power = $user->character->attack_power;
                                        $new_defence_power = $user->character->defence_power;
                                        $new_speed_power = $user->character->speed_power + $speed_power;
                                    } else {
                                        $equipped_item_id = $user->character->broom_id;
                                        $new_attack_power = $user->character->attack_power;
                                        $new_defence_power = $user->character->defence_power;
                                        $new_speed_power1 = $user->character->speed_power - $user->character->broom->speed_power;
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
                        <form action="/item/delete" method="POST">
                            @csrf
                            <input type="text" name="item_type" id="item_type" value="{{ $item->item->type }}" hidden/>
                            <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                            <input type="text" name="id" id="id" value="{{ $item->id }}" hidden/>
                            <input type="text" name="count" id="count" value="{{ $item->count }}" hidden/>
                            <input type="text" name="galleon" value="{{ $item->item->price/2 }}" hidden/>
                            <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white rounded">
                                Sat
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>