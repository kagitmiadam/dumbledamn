@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
<div id="auth-homepage" class="wrapper shop">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">{{$location->name}}</h5>
                        </div>
                        <hr>
                        <div class="shop-inner">
                            <div class="row">
                                @foreach ($books as $book)
                                    <div class="col-md-2 col-6 book-shop" data-bs-toggle="modal" data-bs-target="#book{{ $book->id }}">
                                        <div class="shop-item dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$book->description}}">
                                            <img src="{{asset($book->image)}}" alt="" class="icon">
                                            <div class="text">
                                                @php $discounted_price = 0; $discount_description = ""; @endphp
                                                @if($book->discount == 0)
                                                    <p>Fiyat:&nbsp;<span>{{ round($book->price) }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                @elseif($book->discount > 0 and $book->price >= 10)
                                                    @php
                                                        $discounted_price = $book->price * $book->discount;
                                                        $discount_description = "Seçili ürün(ler)de %" . $book->discount*100 . " indirim";
                                                    @endphp
                                                    <div class="text-center dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$discount_description}}">
                                                        <p>Eski Fiyat:&nbsp;<span class="text-line-through">{{ $book->price }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                        <p>Fiyat:&nbsp;<span>{{ round($book->price-$discounted_price) }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                    </div>
                                                @else
                                                    <p>Fiyat:&nbsp;<span>{{ round($book->price) }}</span> <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="galleon-icon"></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @php $book_status = ""; $book_table_id = ""; $current_book_count = ""; $new_count = ""; @endphp
                                    @foreach($character_books->where('character_id', $user->character->id)
                                        ->where('book_id', $book->id) as $character_book)
                                        @php
                                            $book_status = 1;
                                            $current_book_id = $character_book->id;
                                            $current_book_count = $character_book->count;
                                        @endphp
                                    @endforeach
                                    @include('components.modal.book-shop-modal')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection