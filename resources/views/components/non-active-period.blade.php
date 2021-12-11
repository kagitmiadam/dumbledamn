@if($period->status == 0)
    <div class="row">
        <div class="col-md-12">
            <div class="alert">
                <p class="all_period_link">
                    Yeni dönem daha başlamamıştır. {{ $period->name }} başlamasına kalan süre: <span id="start-date-period"></span>.
                </p>
            </div>
        </div>
    </div>
@elseif($period->status == 1)
    <div class="row">
        <div class="col-md-12">
            <div class="alert bg-{{$user->character->school_class->color}}-color">
                <p class="all_period_link">
                    {{ $period->name }} bitmesine kalan süre: <span id="end-date-period"></span>.
                </p>
            </div>
        </div>
    </div>
@endif