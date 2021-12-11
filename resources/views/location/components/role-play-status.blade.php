@if(Auth::user()->character->role_play_status == 0)
    <div class="col-md-4 pt-10px pb-10px">
        <div class="link-alignment">
            <a class="@include('components.other.class-color-button-trs') rounded c-pointer"
            data-toggle="modal" data-target="#rolePlayNew{{ $location->id }}">
                Yeni role başla
            </a>
        </div>
    </div>
    @include('components.modals.role-play-new-modal')
@endif