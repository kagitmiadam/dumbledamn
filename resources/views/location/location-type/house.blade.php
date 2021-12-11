<div class="row w-100 d-flex d-around">
    @if(Auth::user()->character->classes->name == $location->house_affiliation)
        @if($location->permit == "Şifre")
            @if(session()->get('current_check') == "Başarısız" or session()->get('current_check') == "")
                <div class="col-md-6 pt-10px pb-10px">
                    <p class="text-center alert ct-bg-{{ $location->short_link }}">
                        {{ $location->name }} bölgesi bina öğrencileri içindir ve şifrelidir. Giriş yapabilmek için şifre giriniz.
                    </p>
                    <div class="ct-input-1">
                        <div class="ct-form-group field">
                            <form action="/location/{{$location->id}}/password-check" method="POST" class="w-100">
                                @csrf
                                <input type="text" name="id" value="{{$location->id}}" hidden/>
                                <input type="password" class="ct-input-1" name="house_password" required/>
                                <label for="name" class="ct-form-label">Şifre</label>
                                <button type="submit"><i class="fa fa-chevron-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @elseif($location->permit == "Girilmez")
            <div class="col-md-6 pt-10px pb-10px">
                <p class="text-center">
                    Bu {{ $location->sub_location_type->name }} girilmez alandır. Sadece Yetkili ve Görevli kişiler giriş yapabilmektedir.
                </p>
            </div>
        @else
            <div class="col-md-6 pt-10px pb-10px">
                <div class="link-alignment">
                    <a href="#">Rol yap</a>
                </div>
            </div>
        @endif
    @else
        <p class="text-center alert ct-bg-{{ $location->short_link }}">
            Bu {{ $location->location_type->name }} sadece {{ $location->name }} öğrencilerine özeldir.
        </p>
    @endif

    @if(session()->get('current_check') == "Başarılı")
        @if(Auth::user()->character->role_play_status == 0)
            @include('location.components.role-play-link')
            @include('location.components.role-play-status')
        @else
            @include('location.components.location-type-link')
        @endif
    @endif
</div>
<hr>