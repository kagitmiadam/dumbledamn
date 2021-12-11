<div class="col-md-12 title">
    <div class="card-title text-center fw-bold mb-4 pb-2 f-36 bb-white">
        <div class="d-flex d-align d-center">
            <span class="mr-2">
                {{ $location->name }}
            </span>
            <span data-toggle="tooltip" data-placement="top" title="Malzeme kaliteleri hakkında bilgi almak için tıklayın.">
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
                <td class="text-white bg-dark text-center fw-bold">Fiyatı</td>
                <td class="text-white bg-dark text-center fw-bold">Durum</td>
            </tr>
            @foreach ($materials as $material)
                <tr>
                    <td class=""
                        data-toggle="tooltip" data-placement="top" title="{{ $material->description }}">
                        {{ $material->short_name }}
                    </td>

                    <td class="text-center"
                        data-toggle="tooltip" data-placement="top" title="{{ $material->tier->description }}">
                        {{ $material->tier->name }}
                    </td>

                    @php $discounted_price = 0; $discount_description = ""; @endphp
                    @if($material->discount == 0)
                        <td class="text-center">
                            {{ $material->price }} G
                        </td>
                    @elseif($material->discount > 0)
                        @php
                            $discounted_price = $material->price * $material->discount;
                            $discount_description = "Seçili ürün(ler)de %" . $material->discount*100 . " indirim";
                        @endphp
                        <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $discount_description }}">
                            <p class="text-line-through">{{ $material->price }} G</p>
                            {{ round($material->price-$discounted_price) }} G
                        </td>
                    @endif


                    @php $material_status = ""; $material_table_id = ""; $current_material_count = ""; $new_count = ""; @endphp
                    @foreach($character_materials->where('character_id', Auth::user()->character->id)
                    ->where('material_id', $material->id) as $character_material)
                        @php
                            $material_status = 1;
                            $current_material_id = $character_material->id;
                            $current_material_count = $character_material->count;
                        @endphp
                    @endforeach
                    <td>
                    @if($material->price > Auth::user()->character->galleon)
                        <div class="f-lex d-center">
                            <p class="fw-bold text-center">
                                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Galleon yetersiz"></i>
                            </p>
                        </div>
                    @else
                        <div class="d-flex d-center">
                            <button class="ct-btn @include('components.other.class-color-background') text-white" data-toggle="modal" data-target="#shopMaterialModal{{ $material->id }}">
                                Satın Al
                            </button>
                        </div>
                    @endif
                    </td>
                </tr>
                @include('components.modals.shop-material-modal')
            @endforeach
        </table>
    </div>
    {{ $materials->links() }}
    @include('components.modals.tier-modal')
</div>