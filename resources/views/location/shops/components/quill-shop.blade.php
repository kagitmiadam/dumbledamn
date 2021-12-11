<div class="col-md-12 title">
    <div class="card-title text-center fw-bold mb-4 pb-2 f-36 bb-white">
        <div class="d-flex d-align d-center">
            <span class="mr-2">
                {{ $location->name }}
            </span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td class="text-white bg-dark text-center fw-bold">Adı</td>
                <td class="text-white bg-dark text-center fw-bold">Fiyatı</td>
                <td class="text-white bg-dark text-center fw-bold">Durum</td>
            </tr>
            @foreach ($quills as $material)
                <tr>
                    <td data-toggle="tooltip" data-placement="top" title="{{ $material->description }}">
                        {{ $material->name }}
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
                        ->where('material_id', $material->id) as $character_quill)
                        @php
                            $material_status = 1;
                            $current_material_id = $character_quill->id;
                            $current_material_count = $character_quill->count;
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
    {{ $quills->links() }}
</div>