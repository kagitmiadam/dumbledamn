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
        $user                           = Auth::user();
        return view('location.index', [
            'id'                                => $id,
            'location'                          => $location,
            'sub_locations'                     => $all_locations,
            'all_locations'                     => $all_locations,
            'locations'                         => $all_locations,
            'all_periods'                       => $all_periods,
            'user'                              => $user,
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
            'wands'                     => $wands,
            'gowns'                     => $gowns,
            'brooms'                    => $brooms,
            'pets'                      => $pets,
            'books'                     => $books,
            'character_lessons'         => $character_lessons,
            'locations'                 => $locations,
            'all_periods'               => $all_periods,
            'character_items'           => $character_items,
            'character_books'           => $character_books,
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