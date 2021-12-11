<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CharacterBook;
use App\Models\CharacterInventory;
use App\Models\CharacterLesson;
use App\Models\PeriodCup;
use App\Models\Location;
use App\Http\Controllers\Controller;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LocationController extends Controller
{
    // Mekan Bilgilerini Çekme
    public function getLocation($id) {
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        
        if ($location['title_id'] != null) {
            $location_title_check = true; // Mekanda unvan var
        } else {
            $location_title_check = false; // Mekanda unvan yok
        }
        foreach ($character_titles as $character_title) {
            if ($location_title_check == true) {
                if ($location['title_id'] == $character_title->title_id) {
                    $cltc = 1; // Karakter unvanı mekanınkine uygun
                    break;
                } else {
                    $cltc = 2; // Karakter unvanı mekanınkine uygun değil
                    $required_title = $location->title->name;
                    $required_title_description = $location->title->description;
                }
            } else {
                $cltc = 3; // Mekan unvan istemiyor
            }
        }
        return view('location.index', [
            'id'                                => $id,
            'location'                          => $location,
            'all_notifications'                 => $all_notifications,
            'all_locations'                     => $all_locations,
            'locations'                         => $locations,
            'all_periods'                       => $all_periods,
            'npc_characters'                    => $npc_characters,
            'character_titles'                  => $character_titles,
            'all_character_role_plays'          => $all_character_role_plays,
            'all_role_plays'                    => $all_role_plays,
            'all_adventure_drops'               => $all_adventure_drops,
            'all_titles'                        => $all_titles,
            'cltc'                              => $cltc,
            'required_title'                    => $required_title,
            'required_title_description'        => $required_title_description,
        ]);
    }
    // Dükkan Bilgileri
    public function getShop($id) {
        $location = Location::find($id);
        $wands = Items::orderBy('price', 'asc')
            ->orderBy('name', 'asc')
            ->where('type', 'asa')
            ->paginate(15);
        $gowns = Items::
            orderBy('price', 'asc')
            ->where('type', 'pelerin')
            ->paginate(15);
        $brooms = Items::orderBy('price', 'asc')
            ->orderBy('name', 'asc')
            ->where('type', 'süpürge')
            ->paginate(15);
        $pets = Items::orderBy('price', 'asc')
            ->orderBy('name', 'asc')
            ->where('type', 'evcil hayvan')
            ->paginate(15);
        $books = Book::orderBy('price', 'asc')
            ->orderBy('name', 'asc')
            ->get();
        $character_lessons          = CharacterLesson::all();
        $locations                  = Location::all();
        $all_periods                = PeriodCup::all();
        $character_items            = CharacterInventory::all();
        $character_books            = CharacterBook::where('character_id', Auth::user()->character->id)->get();
        return view('location.shops.index', [
            'id'                        => $id,
            'location'                  => $location,
            'all_notifications'         => $all_notifications,
            'wands'                     => $wands,
            'gowns'                     => $gowns,
            'brooms'                    => $brooms,
            'pets'                      => $pets,
            'materials'                 => $materials,
            'quills'                    => $quills,
            'potions'                   => $potions,
            'books'                     => $books,
            'inn_markets'               => $inn_markets,
            'train_stations'            => $train_stations,
            'all_character_role_plays'  => $all_character_role_plays,
            'character_lessons'         => $character_lessons,
            'locations'                 => $locations,
            'all_periods'               => $all_periods,
            'character_materials'       => $character_materials,
            'character_items'           => $character_items,
            'character_books'           => $character_books,
            'tiers'                     => $tiers,
            'all_role_plays'            => $all_role_plays,
        ]);
    }
    public function passwordCheck(Request $request) {
        $check = Location::find($request->id);
        $current_check = "";
        if ($check->password == $request->house_password) {
            $current_check = "Başarılı";
            return redirect()->route('get-location', ['id' => $check])->with(['current_check' => $current_check]);
        } else {
            $current_check = "Başarısız";
            return redirect()->route('get-location', ['id' => $check])->with(['current_check' => $current_check]);
        }
    }
}