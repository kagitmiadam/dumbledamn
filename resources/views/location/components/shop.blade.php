<div class="row d-flex d-around">
    @if(Auth::user()->character->role_play_status == 0)
        @include('location.components.role-play-link')
        @include('location.components.location-type-link')
    @else
        @include('location.components.role-play-status')
    @endif
</div>