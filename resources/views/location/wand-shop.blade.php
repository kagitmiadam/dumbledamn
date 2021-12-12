@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
<div id="auth-homepage" class="wrapper shop">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">{{$location->name}}</h5>
                        </div>
                        <hr>
                        <div class="shop-inner">
                            <div class="row">
                                @foreach ($wands as $item)
                                    <div class="col-md-2 col-6" data-bs-toggle="modal" data-bs-target="#wand{{ $item->id }}">
                                        <div class="shop-item dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$item->description}}">
                                            <img src="{{asset($item->image)}}" alt="" class="icon">
                                            <p>Saldırı Gücü: {{$item->attack_power}}</p>
                                            <p>Savunma Gücü: {{$item->defence_power}}</p>
                                            @php $discounted_price3 = 0; $discount_description = "";@endphp
                                            @if($user->character->core_preffered != null)
                                                @if($user->character->core_preffered->core_name == $item->core->core_name and $item->discount > 0)
                                                    @php
                                                        $discounted_price1 = $item->price * 0.2;
                                                        $discounted_price2 = ($item->price-$discounted_price1) * $item->discount;
                                                        $discounted_price3 = $discounted_price1 + $discounted_price2;
                                                        $discount_description = "Size özel olan " .$user->character->core_preffered->core_name . " içeren tüm asalarda %20 indirim ve +%" . $item->discount*100 . " indirim." @endphp
                                                    <td class="text-center dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$discount_description}}">
                                                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $item->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                        <p>Fiyat: {{ round($item->price-$discounted_price3) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @elseif($user->character->core_preffered->core_name == $item->core->core_name)
                                                    @php $discounted_price3 = $item->price * 20 / 100 @endphp
                                                    @php $discount_description = "Size özel olan " .$user->character->core_preffered->core_name . " içeren tüm asalarda %20 indirim." @endphp
                                                    <td class="text-center dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$discount_description}}">
                                                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $item->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                        <p>Fiyat: {{ round($item->price-$discounted_price3) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @elseif($item->discount > 0)
                                                    @php $discounted_price3 = $item->price * $item->discount @endphp
                                                    @php $discount_description = "Seçili ürün(ler)de %" . $item->discount*100 . " indirim." @endphp
                                                    <td class="text-center dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$discount_description}}">
                                                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $item->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                        <p>Fiyat: {{ round($item->price-$discounted_price3) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @elseif($item->discount == 0)
                                                    <td class="text-center">
                                                        <p>Fiyat: {{ $item->price }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @endif
                                            @else
                                                @if($item->discount == 0)
                                                    <td class="text-center">
                                                        <p>Fiyat: {{ $item->price }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @elseif($item->discount > 0)
                                                    @php $discounted_price3 = $item->price * $item->discount @endphp
                                                    @php $discount_description = "Seçili ürün(ler)de %" . $item->discount*100 . " indirim." @endphp
                                                    <td class="text-center dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$discount_description}}">
                                                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $item->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                        <p>Fiyat: {{ round($item->price-$discounted_price3) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </td>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                    @php $item_status = ""; $item_table_id = ""; $current_item_count = ""; $new_count = ""; @endphp
                                    @foreach($character_items->where('character_id', $user->character->id)
                                        ->where('item_id', $item->id) as $character_quill)
                                        @php
                                            $item_status = 1;
                                            $current_item_id = $character_quill->id;
                                            $current_item_count = $character_quill->count;
                                        @endphp
                                    @endforeach
                                    @include('components.modal.wand-shop-modal')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
