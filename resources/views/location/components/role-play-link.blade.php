@if(Auth::user()->character->role_play_status == 0)
    <div class="col-md-4 col-12 pt-10px pb-10px">
        <div class="link-alignment">
            <a href="{{ route('get-role-play-list', ['id' => $location->id] ) }}"
               class="@include('components.other.class-color-button-trs') rounded">
                Rolleri görüntüle
            </a>
        </div>
    </div>
@endif