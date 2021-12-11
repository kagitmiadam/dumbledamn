@if(Auth::user()->character->role_play_status == 0)
    <div class="col-md-4 pt-10px pb-10px">
        <div class="link-alignment">
            <a href="#" class="@include('components.other.class-color-button-trs') rounded">
                Derse katıl
            </a>
        </div>
    </div>
@endif