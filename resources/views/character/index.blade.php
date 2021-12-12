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
                                    @include('components.character-equipment', ['current_equipment'=>"Ekipman Bilgileri"])
                                </div>
                                <div class="statistic-field">
                                    <p class="title">İstatistikler</p>
                                    <hr>
                                    <p>Saldırı Gücü: {{$user->character->attack_power}}</p>
                                    <p>Savunma Gücü: {{$user->character->defence_power}}</p>
                                    <p>Hız: {{$user->character->speed_power}}</p>
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
                                                        <img src="img/spell/{{ $spell->spell->id }}.png" alt="" data-bs-toggle="modal" data-bs-target="#knowingSpellInfo{{ $spell->spell->id }}" class="cursor-pointer">
                                                    </div>
                                                    @include('components.modal.knowing-spell-info')
                                                @endforeach
                                            </div>
                                            @if($full_predisposition > 0)
                                                <p>Ustalık kazanılan büyü sayısı: {{ $full_predisposition }}</p>
                                            @endif
                                            <div class="character-new-equipment">
                                                <div><a href="{{route('get-spell')}}" class="btn-{{$user->character->school_class->color}}">Tüm büyüleri görüntüle</a></div>
                                            </div>
                                        @else
                                        <span>Şuan hiç bir büyü bilmiyorsunuz. <a href="{{route('get-spell')}}" class="{{$user->character->school_class->color}}-color-link-light">Mevcut büyü listesini</a> inceleyebilir, derslere katılarak yeni büyüler öğrenmeye başlayabilirsiniz!</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="inventory-field">
                                    @php
                                        $all_character_items = $user->character->character_inventory->sortByDesc('count')->where('status', '=', 1);
                                        $item_count = $user->character->character_inventory->where('status', 1)->count();
                                    @endphp
                                    <p class="title">Envanter</p>
                                    <hr>
                                    @if($item_count > 0)
                                        <div class="row">
                                            @foreach($character_items->slice(0,4) as $character_item)
                                                <div class="col-md-3">
                                                    <div class="dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $character_item->item->name }}">
                                                        <div class="img-field">
                                                            <img src="{{asset($character_item->item->image)}}" alt="" class="icon inventory">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($item_count > 0)
                                        <div class="mb-4">
                                            <a class="{{$user->character->school_class->color}}-color-link" href="{{ route('get-inventory') }}">
                                                Tüm envanteri görüntüle
                                            </a>
                                        </div>
                                    @endif
                                    @if($item_count == 0)
                                        <div class="mb-4">
                                            Envanteriniz şuan boş. Mağazaları ziyaret ederek alışveriş yapabilirsiniz.
                                        </div>
                                    @endif
                                </div>
                                <div class="inventory-field">
                                    @php
                                        $library_count = $user->character->character_book->where('status', 1)->count();
                                    @endphp
                                    <p class="title">Kitap Envanteri</p>
                                    <hr>
                                    @if($library_count > 0)
                                        <div class="row">
                                            @foreach($character_books->slice(0,4) as $character_book)
                                                <div class="col-md-3">
                                                    <div class="dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $character_book->book->name }}">
                                                        <div class="img-field">
                                                            <img src="{{asset($character_book->book->image)}}" alt="" class="icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if($library_count > 0)
                                        <div>
                                            <a class="{{$user->character->school_class->color}}-color-link" href="{{ route('get-book-inventory') }}">
                                                Tüm kitapları görüntüle
                                            </a>
                                        </div>
                                    @endif
                                    @if($library_count == 0)
                                        <div class="mb-4">
                                            Kitap envanteriniz şuan boş. Mağazaları ziyaret ederek alışveriş yapabilirsiniz.
                                        </div>
                                    @endif
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
