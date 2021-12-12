<div class="modal fade" id="book{{ $book->id }}" tabindex="-1" aria-labelledby="bookLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookLabel">
            {{ $book->name }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body book-shop-modal">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="modal-image">
                        <img src="{{asset($book->image)}}" alt="" class="icon">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <p>{{$book->description}}</p>
                    <p>Bu kitap, {{$book->lesson->name}} dersinde size ek puan sağlayacaktır.</p>
                    <p><span class="text-underline">Ders:</span>&nbsp;{{$book->lesson->name}}</p>
                    <p><span class="text-underline">Sınıf:</span>&nbsp;{{$book->lesson->school_grade->name}}</p>
                    <hr>
                    @php $discounted_price = 0; $discount_description = ""; @endphp
                      @if($book->discount == 0)
                        <p>Fiyat:&nbsp;<span>{{ round($book->price) }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                      @elseif($book->discount > 0 and $book->price >= 10)
                        @php
                          $discounted_price = $book->price * $book->discount;
                          $discount_description = "Seçili ürün(ler)de %" . $book->discount*100 . " indirim";
                        @endphp
                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $book->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                        <p>Fiyat: {{ round($book->price-$discounted_price) }} <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                      @else
                        <p>Fiyat:&nbsp;<span>{{ round($book->price) }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                      @endif
                      @if($book_status == 1)
                        <form action="/shop/book/update" method="POST" class="form-row">
                            @csrf
                            <input type="text" name="id" id="id" value="{{ $current_book_id }}" hidden/>
                            <input type="text" name="book_id" id="book_id" value="{{ $book->id }}" hidden/>
                            <input type="text" name="character_id" id="character_id" value="{{ Auth::user()->character->id }}" hidden/>
                            <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                            <input type="text" name="count" id="count" value="1" hidden/>
                            @php
                                $new_galleon = Auth::user()->character->galleon - ($book->price-$discounted_price);
                            @endphp
                            <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                            <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white">
                                Satın al
                            </button>
                        </form>
                    @else
                        <form action="/shop/book/submit" method="POST" class="form-row">
                            @csrf
                            <input type="text" name="book_id" id="book_id" value="{{ $book->id }}" hidden/>
                            <input type="text" name="character_id" id="character_id" value="{{ Auth::user()->character->id }}" hidden/>
                            <input type="text" name="location_id" id="location_id" value="{{ $location->id }}" hidden/>
                            <input type="text"  name="count" id="count" value="1" hidden/>
                            @php
                                $new_galleon = Auth::user()->character->galleon - ($book->price-$discounted_price);
                            @endphp
                            <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                            <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white">
                                Satın al
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>