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
                <div class="period-cup-icon dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dönem Kupası">
                    <a href="#">
                        <img src="{{asset('img/icon/period-cup.png')}}" alt="" class="icon">
                    </a>
                </div>
            </div>
            <div class="equipment-field">
                <div class="equipment-icon b-{{$user->character->school_class->color}} dd-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ekipmanları görüntülemek için tıklayın.">
                    <img src="{{$user->character->school_class->image}}" alt="" class="icon">
                </div>
                <div class="equipment-menu">
                    <p class="title">Ekipman Bilgileri</p>
                    <div class="equipped-equipment">
                        <div class="item gown"></div>
                        <div class="item wand"></div>
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