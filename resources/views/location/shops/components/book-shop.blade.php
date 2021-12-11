<div class="col-md-12 title">
    <div class="card-title text-center fw-bold mb-4 pb-2 f-36 bb-white">
        <div class="d-flex d-align d-center">
            <span class="mr-2">
                {{ $location->name }}
            </span>
            <span data-toggle="tooltip" data-placement="top" title="Kitaplar hakkında bilgi almak için tıklayın.">
                <i class="fas fa-question-circle c-pointer" data-toggle="modal" data-target="#bookModal"></i>
            </span>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <td class="text-white bg-dark text-center fw-bold">Adı</td>
                <td class="text-white bg-dark text-center fw-bold">Ders</td>
                <td class="text-white bg-dark text-center fw-bold">Sınıf</td>
                <td class="text-white bg-dark text-center fw-bold">Fiyatı</td>
                <td class="text-white bg-dark text-center fw-bold">Durum</td>
            </tr>
                @foreach($books as $book)
                    @if($book->lesson->class_number->name == Auth::user()->character->school_grade>id)
                        <tr>
                            <td data-toggle="tooltip" data-placement="top" title="{{ $book->description }}">
                                {{ $book->name }}
                            </td>

                            <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $book->lesson->description }}">
                                {{ $book->lesson->name }}
                            </td>

                            <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $book->lesson->description }}">
                                {{ $book->lesson->class_number->name }}
                            </td>

                            @php $discounted_price = 0; $discount_description = ""; @endphp
                            @if($book->discount == 0)
                                <td class="text-center">
                                    {{ $book->price }} G
                                </td>
                            @elseif($book->discount > 0 and $book->price >= 10)
                                @php
                                    $discounted_price = $book->price * $book->discount;
                                    $discount_description = "Seçili ürün(ler)de %" . $book->discount*100 . " indirim";
                                @endphp
                                <td class="text-center" data-toggle="tooltip" data-placement="top" title="{{ $discount_description }}">
                                    <p class="text-line-through">{{ $book->price }} G</p>
                                    {{ round($book->price-$discounted_price) }} G
                                </td>
                            @else
                                <td class="text-center">
                                    {{ $book->price }} G
                                </td>
                            @endif

                            <td class="text-center">
                                @if($book->price > Auth::user()->character->galleon)
                                    <p class="fw-bold @include('components.other.class-color')">Galleon yetersiz</p>
                                @else
                                    @foreach($character_books as $character_book)
                                        @if($character_book->book_id == $book->id)
                                            <form action="/shop/book/delete" method="POST" class="d-flex d-center">
                                                @csrf
                                                <input type="text" name="id" id="id" value="{{ $character_book->id }}" hidden/>
                                                <input type="text" name="character_id" id="character_id" value="{{ Auth::user()->character->id }}" hidden/>
                                                <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                                                @php
                                                    $new_galleon = Auth::user()->character->galleon + ($book->price*0.5);
                                                @endphp
                                                <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                                                <button type="submit" class="ct-btn @include('components.other.class-color-background') text-white
                                                @foreach($character_books as $character_book) @if($character_book->book_id == $book->id)  @endif @endforeach">
                                                    Sat
                                                </button>
                                            </form>
                                        @endif
                                    @endforeach
                                    <form action="/shop/book/submit" method="POST" class="d-flex d-center">
                                        @csrf
                                        <input type="text" name="character_id" id="character_id" value="{{ Auth::user()->character->id }}" hidden/>
                                        <input type="text" name="book_id" id="book_id" value="{{ $book->id }}" hidden/>
                                        <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                                        @php
                                            $new_galleon = Auth::user()->character->galleon - ($book->price-$discounted_price);
                                        @endphp
                                        <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                                        <input type="text" name="status" id="status" value="1" hidden/>
                                        <button type="submit" class="ct-btn @include('components.other.class-color-background') text-white
                                        @foreach($character_books as $character_book) @if($character_book->book_id == $book->id) d-none @endif @endforeach">
                                            Satın al
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
            @endforeach
        </table>
    </div>
    @include('components.modals.book-modal')
</div>