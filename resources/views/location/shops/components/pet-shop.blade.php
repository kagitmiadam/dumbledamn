<div class="col-md-12 title">
    <div class="card-title text-center fw-bold mb-4 pb-2 f-36 bb-white">
        <div class="d-flex d-align d-center">
            <span class="mr-2">
                {{ $location->name }}
            </span>
            <span data-toggle="tooltip" data-placement="top" title="Evcil Hayvan kaliteleri hakkında bilgi almak için tıklayın.">
                <i class="fas fa-question-circle c-pointer" data-toggle="modal" data-target="#tierModal"></i>
            </span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td class="text-white bg-dark text-center fw-bold">Adı</td>
                <td class="text-white bg-dark text-center fw-bold">Kalite</td>
                <td class="text-white bg-dark text-center fw-bold">Saldırı</td>
                <td class="text-white bg-dark text-center fw-bold">Savunma</td>
                <td class="text-white bg-dark text-center fw-bold">Fiyatı</td>
                <td class="text-white bg-dark text-center fw-bold">Durum</td>
            </tr>
            @foreach ($pets as $item)
                <tr>
                    <td class=""
                        data-toggle="tooltip" data-placement="top" title="{{ $item->description }}">
                        {{ $item->short_name }}
                    </td>

                    <td class="text-center"
                        data-toggle="tooltip" data-placement="top" title="{{ $item->tier->description }}">
                        {{ $item->tier->name }}
                    </td>

                    <td class="text-center">
                        +{{ $item->attack_power }}
                    </td>

                    <td class="text-center">
                        +{{ $item->defence_power }}
                    </td>

                    @php $discounted_price3 = 0; $discount_description = ""; @endphp
                    @if($item->discount == 0)
                        <td class="text-center">
                            {{ $item->price }} G
                        </td>
                    @elseif($item->discount > 0)
                        @php
                            $discounted_price3 = $item->price * $item->discount;
                            $discount_description = "Seçili ürün(ler)de %" . $item->discount*100 . " indirim";
                        @endphp
                        <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $discount_description }}">
                            <p class="text-line-through">{{ $item->price }} G</p>
                            {{ round($item->price-$discounted_price3) }} G
                        </td>
                    @endif

                    @php $item_status = ""; $item_table_id = ""; $current_item_count = ""; $new_count = ""; @endphp
                    @foreach($character_items->where('character_id', Auth::user()->character->id)
                        ->where('item_id', $item->id) as $character_quill)
                        @php
                            $item_status = 1;
                            $current_item_id = $character_quill->id;
                            $current_item_count = $character_quill->count;
                        @endphp
                    @endforeach
                    <td>
                        @if($item->price > Auth::user()->character->galleon)
                            <p class="fw-bold text-center">
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Galleon yetersiz"></i>
                            </p>
                        @else
                            <div class="d-flex d-center">
                                <button class="ct-btn @include('components.other.class-color-background') text-white" data-toggle="modal" data-target="#shopItem{{ $item->id }}">
                                    Satın al
                                </button>
                            </div>
                        @endif
                    </td>
                </tr>
                @include('components.modals.shop-item-modal')
            @endforeach
        </table>
    </div>
    {{ $pets->links() }}
    @include('components.modals.tier-modal')
</div>