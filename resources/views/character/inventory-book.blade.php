@extends('layouts.auth-homepage')

@section('title', 'Kitap Envanteri')

@section('styles')
@stop

@section('content')
<div id="auth-homepage" class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">Karakter Kitap Envanteri</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Envanterinizde bulunan bütün kitapları aşağıda görebilirsiniz.
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="inventory-inner">
                            <div class="row">
                                @foreach($character_books as $book)
                                <div class="col-md-2 col-6 dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$book->book->name}}">
                                    <img src="{{asset($book->book->image)}}" alt="" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#bookInfo{{ $book->book->id }}" class="icon cursor-pointer">
                                </div>
                                @include('components.modal.book-info-modal')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
@stop
