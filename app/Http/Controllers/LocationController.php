<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CharacterBook;
use App\Models\CharacterInventory;
use App\Models\CharacterLesson;
use App\Models\PeriodCup;
use App\Models\Location;
use App\Models\Items;
use App\Http\Controllers\Controller;
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
    public function getWandShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_items                = CharacterInventory::all();
        $wands                          = Items::orderBy('price', 'asc')
                                        ->orderBy('name', 'asc')
                                        ->where('type', 'asa')
                                        ->paginate(15);
        return view('location.wand-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_items'           => $character_items,
            'wands'                     => $wands,
        ]);
    }
    public function getGownShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $gowns                          = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'pelerin')
                                        ->paginate(15);
        return view('location.gown-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'gowns'                     => $gowns,
        ]);
    }
    public function getBroomShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $brooms                         = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'süpürge')
                                        ->paginate(15);
        return view('location.broom-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'brooms'                    => $brooms,
        ]);
    }
    public function getPetShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $pets                           = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'evcil hayvan')
                                        ->paginate(15);
        return view('location.pet-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'pets'                      => $pets,
        ]);
    }
    public function getBookShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $books                          = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'kitap')
                                        ->paginate(15);
        return view('location.pet-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'books'                     => $books,
        ]);
    }
    public function getClassroom($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        return view('location.pet-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
        ]);
    }
}