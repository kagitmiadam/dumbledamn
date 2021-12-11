<div class="row mt-2">
    <div class="col-md-12">
        <h5 class="text-center">Mevcut Maceralar</h5>
    </div>
    @foreach($all_adventures as $adventure)
        @foreach($character_titles as $title)
            @if($adventure->title->name == $title->title->name)
                <div class="col-md-4 pt-10px pb-10px">
                    <div class="link-alignment">
                        <a href="#" data-toggle="modal" data-target="#adventureInfo{{ $adventure->id }}" class="@include('components.other.class-color-button-trs') rounded">
                            {{ $adventure->name }}
                        </a>
                    </div>
                </div>
            @endif
            @include('components.modals.adventure-info-modal')
        @endforeach
    @endforeach
    <div class="col-md-12">
        <hr>
        <h5 class="text-center">Gerekliliği Karşılanmayan Maceralar</h5>
    </div>
{{--    @foreach($all_adventures as $adventure)--}}
{{--        @foreach($character_titles as $title)--}}
{{--            @if($adventure->title->name == $title->title->name)--}}
{{--                <div class="col-md-4 pt-10px pb-10px">--}}
{{--                    <div class="link-alignment">--}}
{{--                        <a href="#" data-toggle="modal" data-target="#adventureInfo{{ $adventure->id }}" class="@include('components.other.class-color-button-trs') rounded">--}}
{{--                            {{ $adventure->name }}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @include('components.modals.adventure-info-modal')--}}
{{--            @endif--}}
{{--        @endforeach--}}
{{--    @endforeach--}}
</div>
