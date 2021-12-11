<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LocationType;

class LocationTypeSeeder extends Seeder
{
    public function run()
    {
        // #1
        $locationType = new LocationType();
        $locationType->name = "Bölge";
        $locationType->description = "Bölge hakkında açıklama";
        $locationType->save();
        // #2
        $locationType = new LocationType();
        $locationType->name = "Dükkan";
        $locationType->description = "Dükkan hakkında açıklama";
        $locationType->save();
        // #3
        $locationType = new LocationType();
        $locationType->name = "Okul";
        $locationType->description = "Okul hakkında açıklama";
        $locationType->save();
        // #4
        $locationType = new LocationType();
        $locationType->name = "Yerleşke";
        $locationType->description = "Yerleşke hakkında açıklama";
        $locationType->save();
        // #5
        $locationType = new LocationType();
        $locationType->name = "Banka";
        $locationType->description = "Banka hakkında açıklama";
        $locationType->save();
        // #6
        $locationType = new LocationType();
        $locationType->name = "Asa Dükkanı";
        $locationType->description = "Asa Dükkanı hakkında açıklama";
        $locationType->save();
        // #7
        $locationType = new LocationType();
        $locationType->name = "Cüppe Dükkanı";
        $locationType->description = "Cüppe Dükkanı hakkında açıklama";
        $locationType->save();
        // #8
        $locationType = new LocationType();
        $locationType->name = "Quidditch Dükkanı";
        $locationType->description = "Quidditch Dükkanı hakkında açıklama";
        $locationType->save();
        // #9
        $locationType = new LocationType();
        $locationType->name = "Evcil Hayvan Dükkanı";
        $locationType->description = "Evcil Hayvan Dükkanı hakkında açıklama";
        $locationType->save();
        // #10
        $locationType = new LocationType();
        $locationType->name = "Malzeme Dükkanı";
        $locationType->description = "Malzeme Dükkanı hakkında açıklama";
        $locationType->save();
        // #11
        $locationType = new LocationType();
        $locationType->name = "İksir Dükkanı";
        $locationType->description = "İksir Dükkanı hakkında açıklama";
        $locationType->save();
        // #12
        $locationType = new LocationType();
        $locationType->name = "Han";
        $locationType->description = "Han hakkında açıklama";
        $locationType->save();
        // #13
        $locationType = new LocationType();
        $locationType->name = "Kitap Dükkanı";
        $locationType->description = "Kitap Dükkanı hakkında açıklama";
        $locationType->save();
        // #14
        $locationType = new LocationType();
        $locationType->name = "Tren İstasyonu";
        $locationType->description = "Tren İstasyonu hakkında açıklama";
        $locationType->save();
        // #15
        $locationType = new LocationType();
        $locationType->name = "Bina";
        $locationType->description = "Bina hakkında açıklama";
        $locationType->save();
        // #16
        $locationType = new LocationType();
        $locationType->name = "Ortak Salon";
        $locationType->description = "Ortak Salon hakkında açıklama";
        $locationType->save();
        // #17
        $locationType = new LocationType();
        $locationType->name = "Büyücü Yatakhanesi";
        $locationType->description = "Büyücü Yatakhanesi hakkında açıklama";
        $locationType->save();
        // #18
        $locationType = new LocationType();
        $locationType->name = "Cadı Yatakhanesi";
        $locationType->description = "Cadı Yatakhanesi hakkında açıklama";
        $locationType->save();
        // #19
        $locationType = new LocationType();
        $locationType->name = "Derslik";
        $locationType->description = "Derslik hakkında açıklama";
        $locationType->save();
        // #20
        $locationType = new LocationType();
        $locationType->name = "Okul";
        $locationType->description = "Okul hakkında açıklama";
        $locationType->save();
        // #21
        $locationType = new LocationType();
        $locationType->name = "Tüy Kalem Dükkanı";
        $locationType->description = "Tüy Kalem Dükkanı hakkında açıklama";
        $locationType->save();
        // #22
        $locationType = new LocationType();
        $locationType->name = "Macera";
        $locationType->description = "Maceralar hakkında açıklama";
        $locationType->save();
        // #23
        $locationType = new LocationType();
        $locationType->name = "Sihir Bakanlığı";
        $locationType->description = "Sihir Bakanlığı hakkında açıklama";
        $locationType->save();
    }
}
