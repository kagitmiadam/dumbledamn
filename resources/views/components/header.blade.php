<header id="header" class="bb-{{$user->character->school_class->color}}">
    <div class="col-md-2">

    </div>
    <div class="col-md-10">
        <div class="right-field">
            <div class="galleon-field">
                <div class="galleon character-currency dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Galleon: {{$user->character->galleon}}">
                    <img src="{{asset('img/icon/galleon.svg')}}" alt="" class="icon">
                    <span>{{$user->character->galleon}}</span>
                </div>
                <div class="sickle character-currency dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sickle: {{$user->character->sickle}}">
                    <img src="{{asset('img/icon/sickle.svg')}}" alt="" class="icon">
                    <span>{{$user->character->sickle}}</span>
                </div>
                <div class="knut character-currency dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Knut: {{$user->character->knut}}">
                    <img src="{{asset('img/icon/knut.svg')}}" alt="" class="icon">
                    <span>{{$user->character->knut}}</span>
                </div>
            </div>
            <div class="period-cup-field">
                <div class="period-cup-icon dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dönem Kupası bilgisi">
                    <a href="{{route('get-past-period-info')}}">
                        <img src="{{asset('img/icon/period-cup.png')}}" alt="" class="icon">
                        <span class="{{$user->character->school_class->color}}-color-link-light">Dönem Bilgisi</span>
                    </a>
                </div>
            </div>
            <div class="equipment-field">
                <div class="equipment-icon b-{{$user->character->school_class->color}} dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ekipmanları görüntülemek için tıklayın.">
                    <img src="{{asset($user->character->school_class->image)}}" alt="" class="icon">
                </div>
                <div class="equipment-menu">
                    <p class="title">Ekipman Bilgileri</p>
                    <hr>
                    <div class="equipped-equipment">
                        <div class="equipment-box">
                            <p class="title">Asa</p>
                            @if ($user->character->wand_id != "")
                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->wand->name}}">
                                <img src="{{asset($user->character->wand->image)}}" alt="">
                            </div>
                            @else
                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut asanız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                            </div>
                            @endif
                        </div>
                        <div class="equipment-box">
                            <p class="title">Pelerin</p>
                            @if ($user->character->gown_id != "")
                            <div class="item gown dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->gown->name}}">
                                <img src="{{asset($user->character->gown->image)}}" alt="">
                            </div>
                            @else
                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut pelerininiz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                            </div>
                            @endif
                        </div>
                        <div class="equipment-box">
                            <p class="title">Evcil Hayvan</p>
                            @if ($user->character->pet_id != "")
                            <div class="item pet dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->pet->name}}">
                                <img src="{{asset($user->character->pet->image)}}" alt="">
                            </div>
                            @else
                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut evcil hayvanınız yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                            </div>
                            @endif
                        </div>
                        <div class="equipment-box">
                            <p class="title">Süpürge</p>
                            @if ($user->character->broom_id != "")
                            <div class="item broom dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$user->character->broom->name}}">
                                <img src="{{asset($user->character->broom->image)}}" alt="">
                            </div>
                            @else
                            <div class="item wand dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mevcut süpürgeniz yok. Mağazayı ziyaret ederek satın alabilirsiniz.">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="new-equipment">
                        <div><a href="#" class="btn-{{$user->character->school_class->color}}">Envanteri görüntüle</a></div>
                        <div><a href="#" class="btn-{{$user->character->school_class->color}}">Yeni ekipman satın al</a></div>
                    </div>
                </div>
            </div>
            <div class="profile-field">
                <div class="username b-{{$user->character->school_class->color}}">
                    {{$user->name}}
                </div>
                <div class="profile-menu">
                    <ul>
                        <li>
                            <a href="#">Profil</a>
                        </li>
                        <li>
                            <a href="#">İstatistikler</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Çıkış Yap') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>