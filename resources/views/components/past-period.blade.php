<div class="row">
    <div class="col-md-12">
        <div class="alert bg-{{$user->character->school_class->color}}-color white-color">
            <a href="{{ route('get-past-period-info') }}" class="{{$user->character->school_class->color}}-color-link-white">
                Geçmiş dönem kupalarını ve kazananları görüntüle.
            </a>
        </div>
    </div>
</div>