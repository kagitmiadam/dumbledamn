@php $status = 0; @endphp
@if($status == 1)
    <div class="col-md-12 title">
        <div class="card-title text-center fw-bold mb-4 pb-2 f-36 bb-white">
            <div class="d-flex d-align d-center">
            <span class="mr-2">
                {{ $location->name }}
            </span>
                <span data-toggle="tooltip" data-placement="top" title="Tren biletleri hakkında bilgi almak için tıklayın.">
                <i class="fas fa-question-circle c-pointer" data-toggle="modal" data-target="#trainStationModal"></i>
            </span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td class="text-white bg-dark text-center fw-bold">Bilet adı</td>
                    <td class="text-white bg-dark text-center fw-bold">Başlangıç</td>
                    <td class="text-white bg-dark text-center fw-bold">Bitiş</td>
                    <td class="text-white bg-dark text-center fw-bold">Stok</td>
                    <td class="text-white bg-dark text-center fw-bold">Fiyatı</td>
                </tr>
                @foreach ($train_stations as $train_station)
                    <tr>
                        <td class="" data-toggle="tooltip" data-placement="top"
                            title="{{ $train_station->description }} ile {{ $train_station->startLocation->name }} mekanından {{ $train_station->endLocation->name }} arasında seyehat edebilirsiniz.">
                            {{ $train_station->name }}
                        </td>

                        <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $train_station->quality_description }}">
                            {{ $train_station->startLocation->name }}
                        </td>

                        <td class="text-center">
                            {{ $train_station->endLocation->name }}
                        </td>

                        <td class="text-center">
                            {{ $train_station->based_count }} adet
                        </td>

                        <td class="text-center">
                            {{ $train_station->price }} G
                        </td>
                        {{--   <td class="text-center ct-{{ $train_station->short_name }}-text ct-bg-{{ $train_station->short_name }}">--}}
                        {{--       @if($train_station->price > Auth::user()->character->galleon)--}}
                        {{--           <p class="fw-bold">Galleon yetersiz</p>--}}
                        {{--       @else--}}
                        {{--           <a href="#">Satın al</a>--}}
                        {{--       @endif--}}
                        {{--   </td>--}}
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $train_stations->links() }}
        @include('components.modals.train-station-modal')
    </div>
@else
    Tren istasyonları aktif olarak kullanılmamaktadır. İlerleyen güncellemelerde eklenecektir.
    <a href="{{ route('get-homepage') }}" class="@include('components.other.class-color-link-reverse')">Anasayfa</a>'ya geri dön.
@endif