@extends('layouts.homepage')

@section('title', 'Dumbledamn - Seçmen Şapka')

@section('styles')
@stop

@section('content')
    <div id="sorting-hat" class="sorting-hat">
        <div class="logout-field">
            <p>
                Hoş geldin, <span>{{$user->name}}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Çıkış Yap') }}
                </x-dropdown-link>
            </form>
            </p>
        </div>
        <div class="main-content__wrapper">
            <div class="main-content">
                <div class="sorting-hat">
                    <div class="sorting-hat__answer"></div>
                    <div class="sorting-hat__top"></div>
                    <div class="sorting-hat__eye left"></div>
                    <div class="sorting-hat__eye right"></div>
                    <div class="sorting-hat__mouth"></div>
                    <div class="sorting-hat__base"></div>
                </div>
                <div class="avatar">
                    <div class="avatar__hair"></div>
                    <div class="avatar__head">
                        <div class="avatar__eyes left"></div>
                        <div class="avatar__eyes right"></div>
                        <div class="avatar__mouth"></div>
                    </div>
                    <div class="avatar__ears left"></div>
                    <div class="avatar__ears right"></div>
                    <div class="avatar__coat">
                        <div class="avatar__shirt">
                            <div class="avatar__tie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-field">
                <button class="sort-house js-sort">Bina seçimi</button>
            </div>
            <form action="{{url('/sorting-hat/submit')}}" method="post">
                <div class="avatar-gender">
                    @csrf
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    <input type="hidden" id="id" name="id" value="{{ $user->id }}"/>
                    <input type="hidden" id="school_class_id" name="school_class_id" value=""/>
                    <div class="school-select hide">
                        <p>Okul</p>
                        <div>
                            <input type="radio" id="school-hogwarts" name="school-select" value="1" checked="true" />
                            <label for="school-hogwarts">Hogwarts</label>
                        </div>
                        <div>
                            <input type="radio" id="school-ilvermorny" name="school-select" value="2" />
                            <label for="school-ilvermorny">Ilvermorny</label>
                        </div>
                    </div>
                    <div class="gender-select">
                        <p>Cinsiyet</p>
                        <div>
                            <input type="radio" id="avatar-male" name="avatar-gender" value="1" checked="true" />
                            <label for="avatar-male">Büyücü</label>
                        </div>
                        <div>
                            <input type="radio" id="avatar-female" name="avatar-gender" value="2" />
                            <label for="avatar-female">Cadı</label>
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="Asa Seçim"/>
                </div>
                <button class="next-page hide" type="submit">Devam et</button>
            </form>
            <audio id="gryffindor-sound" src="{{asset('sound/gryffindor.mp3')}}"> </audio>
            <audio id="hufflepuff-sound" src="{{asset('sound/hufflepuff.mp3')}}"> </audio>
            <audio id="ravenclaw-sound" src="{{asset('sound/ravenclaw.mp3')}}"> </audio>
            <audio id="slytherin-sound" src="{{asset('sound/slytherin.mp3')}}"> </audio>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $(".js-sort").on("click", function() {
            $('.sort-house').addClass('hide');
            $('.avatar-gender').addClass('hide');
            $(".main-content__wrapper")
                .removeClass()
                .addClass("main-content__wrapper");
            $(".sorting-hat,.avatar__mouth").removeClass("animate");

            var houses = ["hufflepuff", "gryffindor", "ravenclaw", "slytherin"];
            var item = houses[Math.floor(Math.random() * houses.length)];
            $('.sorting-hat #school_class_id').val(item);

            setTimeout(function() {
                $(".sorting-hat").addClass("animate");
                $(".sorting-hat__answer").text(item + "!");
            }, 1000);
            setTimeout(function() {
                $(".avatar__mouth").addClass("animate");
            }, 1500);
            setTimeout(function() {
                $("#"+item+"-sound").get(0).play();
            }, 3000);
            setTimeout(function() {
                $(".main-content__wrapper").addClass(item);
                $('.sorting-hat .next-page').removeClass('hide');
            }, 4000);
        });
        $('input[name=avatar-gender]').on('change', function(){
            var value = $('input[name=avatar-gender]:checked').val();
            if (value == 1) {
                $('.avatar__hair').removeClass('female');
            } else if (value == 2) {
                $('.avatar__hair').addClass('female');
            }
        });
    </script>
@stop
