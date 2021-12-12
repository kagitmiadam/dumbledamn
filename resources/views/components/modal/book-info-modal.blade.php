<div class="modal fade" id="bookInfo{{ $book->book->id }}" tabindex="-1" aria-labelledby="bookInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookInfoLabel">
            {{ $book->book->name }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="modal-image">
                        <img src="{{asset($book->book->image)}}" alt="" class="icon">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <p>{{$book->book->description}}</p>
                    <p>Bu kitap, {{$book->book->lesson->name}} dersinde size ek puan sağlayacaktır.</p>
                    <p><span class="text-underline">Ders:</span>&nbsp;{{$book->book->lesson->name}}</p>
                    <p><span class="text-underline">Sınıf:</span>&nbsp;{{$book->book->lesson->school_grade->name}}</p>
                    <form action="/shop/book/delete" method="POST" class="form-row">
                        @csrf
                        <input type="text" name="book_id" id="book_id" value="{{ $book->book->id }}" hidden/>
                        <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                        <input type="text"  name="count" id="count" value="1" hidden/>
                        @php
                            $new_galleon = $user->character->galleon + ($book->book->price/2);
                        @endphp
                        <input type="text" name="galleon" id="galleon" value="{{ $new_galleon }}" hidden/>
                        <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white">
                            Sat
                        </button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>