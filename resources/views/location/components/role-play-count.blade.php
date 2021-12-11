@php $role_play_exist = 0; @endphp
@foreach($all_role_plays as $all_role_play)
    @if($all_role_play->location_id == $location['id'])
        @php $role_play_exist = 1; @endphp
        @if($all_role_play->sub_location_id)
            @php $role_play_exist = 0; @endphp
        @endif
        @if($all_role_play->class_location_id)
            @php $role_play_exist = 0; @endphp
        @endif
    @endif
    @if(!$all_role_play->location_id == $location->id)
        @php $role_play_exist = 0; @endphp
    @endif
@endforeach

@if ($role_play_exist == 0)
    <div class="row">
        <div class="col-md-12 pt-10px pb-10px">
            <p class="@include('components.other.class-color-alert')">
                <i class="fa fa-info pr-10px"></i>{{ $location->name }} alanında henüz rol yapılmamış.
            </p>
        </div>
    </div>
@endif
