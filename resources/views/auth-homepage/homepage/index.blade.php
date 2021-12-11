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
                            <h5 class="text-center">Karakter Bilgileri</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="equipment-field">
                                    <p class="title">Ekipman Bilgileri</p>
                                    <hr>
                                    <div class="character-equipment">
                                        <div class="equipment-box">
                                            <p class="title">Asa</p>
                                            @if ($user->character->wand_id != "")
                                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->wand->name}}">
                                                <img src="{{$user->character->wand->image}}" alt="">
                                            </div>
                                            @else
                                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut asanız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="equipment-box">
                                            <p class="title">Pelerin</p>
                                            @if ($user->character->gown_id != "")
                                            <div class="item gown dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->gown->name}}">
                                                <img src="{{$user->character->gown->image}}" alt="">
                                            </div>
                                            @else
                                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut pelerininiz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="equipment-box">
                                            <p class="title">Evcil Hayvan</p>
                                            @if ($user->character->pet_id != "")
                                            <div class="item pet dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->pet->name}}">
                                                <img src="{{$user->character->pet->image}}" alt="">
                                            </div>
                                            @else
                                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut evcil hayvanınız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="equipment-box">
                                            <p class="title">Süpürge</p>
                                            @if ($user->character->broom_id != "")
                                            <div class="item broom dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->broom->name}}">
                                                <img src="{{$user->character->broom->image}}" alt="">
                                            </div>
                                            @else
                                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut süpürgeniz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="character-new-equipment">
                                        <div><a href="#" class="btn-{{$user->character->school_class->color}}">Yeni ekipman satın al</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="spell-field">
                                    @php
                                        $top_ten_spells = $user->character->character_spell->sortByDesc('predisposition')->where('status', '=', 1);
                                        $knowing_spell_count = $user->character->character_spell->where('status', '=', 1)->count();
                                        $full_predisposition = $user->character->character_spell->where('predisposition', '=', 100)->count();
                                    @endphp
                                    <p class="title">Büyüler</p>
                                    <hr>
                                    <div class="character-spell">
                                        @if($knowing_spell_count != 0)
                                            <div class="spell-box">
                                                @foreach($top_ten_spells->slice(0,10) as $spell)
                                                    <div class="spell-info dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $spell->spell->name }} | Ustalık: %{{ $spell->predisposition }}">
                                                        <img src="img/spell/{{ $spell->spell->id }}.png" alt="" data-bs-toggle="modal" data-bs-target="#knowingSpellInfo{{ $spell->spell->id }}" class="c-pointer">
                                                    </div>
                                                    @include('components.modal.knowing-spell-info')
                                                @endforeach
                                            </div>
                                            @if($full_predisposition > 0)
                                                <p>Ustalık kazanılan büyü sayısı: {{ $full_predisposition }}</p>
                                            @endif
                                            {{-- {{ route('get-spell') }} --}}
                                            <a class="{{$user->character->school_class->color}}-color" href="#">
                                                Tüm büyüleri görüntüle
                                            </a>
                                        @else
                                        {{-- {{ route('get-spell') }} --}}
                                        <span>Şuan hiç bir büyü bilmiyorsunuz. <a href="" class="{{$user->character->school_class->color}}-color">Mevcut büyü listesini</a> inceleyebilir, derslere katılarak yeni büyüler öğrenmeye başlayabilirsiniz!</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="inventroy-field">
                                    <p class="title">Envanter</p>
                                    <hr>
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
