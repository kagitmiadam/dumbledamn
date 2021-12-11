<div class="row w-100 m-0 d-flex d-around">
    <div class="col-md-12 pt-10px pb-10px">
        @if($location->permit == "Şifre")
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <p class="text-center alert warning">
                        <i class="fa fa-exclamation-triangle pr-10px"></i>
                        @if($location->name === "Gryffindor" or $location->name === "Slytherin" or $location->name === "Hufflepuff" or $location->name === "Ravenclaw")
                            {{ $location->name . $houses_suffix }} şifrelidir. Giriş yapabilmek için şifre giriniz
                        @else
                            {{ $sub_location->name }}
                        @endif
                    </p>
                    <div class="ct-input-1">
                        <div class="ct-form-group field">
                            <input type="password" class="ct-input-1" placeholder="Name" name="name" id='name' required/>
                            <label for="name" class="ct-form-label">Şifre</label>
                            <button type="submit"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($location->permit == "Girilmez")
            <div class="row">
                <div class="col-md-6 offset-md-3 d-flex d-align d-column">
                    <p class="text-center alert danger"><i class="fa fa-exclamation-triangle pr-10px"></i>Bu {{ $location->sub_location_type->name }} girilmez alandır. Sadece Yetkili ve Görevli kişiler giriş yapabilmektedir.</p>
                    <div class="d-flex d-between w-100">
                        <button class="mt-10px @include('components.other.class-color-button') rounded" disabled>
                            Giriş Yap
                        </button>
                        <button class="mt-10px @include('components.other.class-color-button') rounded" disabled>
                            Giriş İzni İste
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<hr>
