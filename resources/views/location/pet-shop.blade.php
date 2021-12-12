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
                                @foreach ($pets as $item)
                                    <div class="col-md-2 col-6 pet-shop" data-bs-toggle="modal" data-bs-target="#pet{{ $item->id }}">
                                        <div class="shop-item dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$item->description}}">
                                            <img src="{{asset($item->image)}}" alt="" class="icon">
                                            <p>Saldırı Gücü: {{$item->attack_power}}</p>
                                            <p>Savunma Gücü: {{$item->defence_power}}</p>
                                            <p>Fiyat: {{ round($item->price) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
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
                                    @include('components.modal.pet-shop-modal')
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
