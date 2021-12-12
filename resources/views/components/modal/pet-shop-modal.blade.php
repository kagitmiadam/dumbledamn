@php
    if ($item->type == "Asa") {
        $item_name = "Asa";
        $item_name1 = "asanız";
        $character_item_id = "pet_id";
    } elseif ($item->type == "Evcil Hayvan") {
        $item_name = "Evcil Hayvan";
        $item_name1 = "evcil hayvanınız";
        $character_item_id = "pet_id";
    } elseif ($item->type == "Pelerin") {
        $item_name = "Pelerin";
        $item_name1 = "pelerininiz";
        $character_item_id = "gown_id";
    } elseif ($item->type == "Süpürge") {
        $item_name = "Süpürge";
        $item_name1 = "süpürgeniz";
        $character_item_id = "broom_id";
    }
@endphp
<div class="modal fade" id="pet{{ $item->id }}" tabindex="-1" aria-labelledby="petLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="petLabel">
            {{ $item->name }}
            <img src="{{asset($item->image)}}" alt="" class="icon">
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <span class="text-underline">{{ $item_name }} Adı:</span>
                        <span>{{ $item->short_name }}</span>
                    </p>
                    @isset($item->wood_id)
                        <p>
                            <span class="text-underline">Ahşap:</span>
                            <span>{{ $item->wood->name }}</span>
                        </p>
                    @endisset
                    @isset($item->core_id)
                        <p>
                            <span class="text-underline">Öz:</span>
                            <span>{{ $item->core->core_name }}</span>
                        </p>
                    @endisset
                    <p>
                        <span class="text-underline">Açıklama:</span>
                        <span>{{ $item->description }}</span>
                    </p>
                    <hr>
                </div>
                <div class="col-md-6">
                    <p class="f-16 text-center text-underline fw-bold">Saldırı Gücü Bilgileri</p>
                    <p>
                        <span class="text-underline">Mevcut Saldırı Gücü:</span>
                        <span> {{ $user->character->attack_power }}</span>
                    </p>
                    <p>
                        <span class="text-underline">Seçilen {{ $item_name }} Saldırı Gücü:</span>
                        <span> {{ $item->attack_power }}</span>
                    </p>
                    @include('components.modal.shop-item-modal-attack-component')
                    <hr>
                </div>
                <div class="col-md-6">
                    <p class="f-16 text-center text-underline fw-bold">Savunma Gücü Bilgileri</p>
                    <p>
                        <span class="text-underline">Mevcut Savunma Gücü:</span>
                        <span> {{ $user->character->defence_power }}</span>
                    </p>
                    <p>
                        <span class="text-underline">Seçilen {{ $item_name }} Savunma Gücü:</span>
                        <span> {{ $item->defence_power }}</span>
                    </p>
                    @include('components.modal.shop-item-modal-defence-component')
                    <hr>
                </div>
                <div class="col-md-12">
                    <p class="mt-1">
                        Alacak olduğunuz {{ $item->short_name }} {{ $item_name1 }} envanterinize gidecektir. Kuşanmak için <a href="{{ route('get-item') }}" class="{{$user->character->school_class->color}}-color-link">envanter</a> sayfanızı ziyaret etmeniz gerekmektedir.
                    </p>
                </div>
            </div>
            <hr>
            @if($item_status == 1)
                <form action="/shop/item/update" method="POST" class="form-row">
                    @csrf
                    <input type="text" name="id" id="id" value="{{ $current_item_id }}" hidden/>
                    <input type="text" name="item_id" id="item_id" value="{{ $item->id }}" hidden/>
                    <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                    <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                    <input type="text" name="count" id="count" value="1" hidden/>
                    @php
                        $new_galleon = $user->character->galleon - ($item->price);
                    @endphp
                    <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                    <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white">
                        Satın al
                    </button>
                </form>
            @else
                <form action="/shop/item/submit" method="POST" class="form-row">
                    @csrf
                    <input type="text" name="item_id" id="item_id" value="{{ $item->id }}" hidden/>
                    <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                    <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                    <input type="text"  name="count" id="count" value="1" hidden/>
                    @php
                        $new_galleon = $user->character->galleon - ($item->price);
                    @endphp
                    <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                    <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white">
                        Satın al
                    </button>
                </form>
            @endif
        </div>
      </div>
    </div>
  </div>