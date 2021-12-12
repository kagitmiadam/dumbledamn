@extends('layouts.auth-homepage')

@section('title', 'Karakter Envanteri')

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
                        <div class="inventory-inner item-inventory">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="character-equipment-field">
                                        @include('components.character-equipment', ['current_equipment'=>"Mevcut Ekipman Bilgileri"])
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <p class="title">Envanter</p>
                                    <hr>
                                    <div class="row">
                                        @foreach($character_items->where('count', '>', '0') as $item)
                                        <div class="col-md-2 col-6 dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$item->item->name}}">
                                            <img src="{{asset($item->item->image)}}" alt="" data-bs-toggle="modal" data-bs-target="#itemInfo{{ $item->item->id }}" class="icon cursor-pointer">
                                        </div>
                                        @include('components.modal.item-info-modal')
                                        @endforeach
                                    </div>
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
