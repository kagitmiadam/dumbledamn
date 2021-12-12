@extends('layouts.auth-homepage')

@section('title', 'Büyüler')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper spell">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">Karakter Büyüleri</h5>
                            <hr>
                            <p class="mb-20px text-justify">
                                Bulunan bütün büyüleri aşağıda görebilirsiniz. Bildiğiniz büyüler yeşil ile görünmektedir. Daha öğrenmediğiniz büyüler ise hafif gri renk ile gösterilmiştir. Bilinmeyen büyülerin nasıl öğrenildiğini hakkında bilgi almak için üzerine tıklamanız yeterlidir.
                            </p>
                        </div>
                        <hr>
                        <div class="row">
                            @if($character_spells->count() > 0)
                                @php $disabled = "disabled"; @endphp
                                @foreach ($all_spells as $spell)
                                    @foreach($character_spells as $character_spell)
                                        @if($character_spell->spell_id == $spell->id)
                                            @foreach($character_spells as $character_spell)
                                                @if($character_spell->spell_id == $spell->id)
                                                    @php
                                                        $enable               = "enabled";
                                                        $level                = $character_spell->level->level;
                                                        $current_experience   = $character_spell->experience_points;
                                                        $need_experience      = $character_spell->level->requirement_experience;
                                                        $spell_learn          = $character_spell->learn_date;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            <div class="col-md-2 col-6">
                                                <div class="spell-content dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $spell->name }}">
                                                    <img src="img/spell/{{ $spell->id }}.png" alt="" data-bs-toggle="modal" data-bs-target="#knowSpellInfo{{ $spell->id }}" class="cursor-pointer">
                                                </div>
                                            </div>
                                            @include('components.modal.know-spell-info')
                                        @endif
                                    @endforeach
                                    <div class="col-md-2 col-6 @foreach($character_spells as $character_spell) @if($character_spell->spell_id == $spell->id) d-none @endif @endforeach">
                                        <div class="spell-content dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $spell->name }}">
                                            <img src="img/spell/{{ $spell->id }}.png" alt="" data-bs-toggle="modal" data-bs-target="#allSpellInfo{{ $spell->id }}" class="cursor-pointer deactive">
                                        </div>
                                    </div>
                                    @include('components.modal.all-spell-info')
                                @endforeach
                                @else
                                <div class="col-md-12">
                                    <p>Şuan hiç bir büyü bilmiyorsunuz. Aşağıda mevcut büyüleri inceleyebilir, derslere katılarak yeni büyüler öğrenmeye başlayabilirsiniz!</p>
                                    <hr>
                                </div>
                                @foreach ($all_spells as $spell)
                                <div class="col-md-2 col-6 @foreach($character_spells as $character_spell) @if($character_spell->spell_id == $spell->id) d-none @endif @endforeach">
                                    <div class="spell-content dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $spell->name }}">
                                        <img src="img/spell/{{ $spell->id }}.png" alt="" data-bs-toggle="modal" data-bs-target="#allSpellInfo{{ $spell->id }}" class="cursor-pointer deactive">
                                    </div>
                                </div>
                                @include('components.modal.all-spell-info')
                                @endforeach
                            @endisset
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
