<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\CharacterBook;
use App\Models\CharacterInventory;
use App\Models\CharacterLesson;
use App\Models\PeriodCup;
use App\Models\Location;
use App\Models\Items;
use App\Models\Book;
use App\Models\Lesson;
use App\Models\SchoolGrade;
use App\Models\CharacterQuiz;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class LocationController extends Controller
{
    // Mekan Bilgilerini Çekme
    public function getLocation($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        return view('location.index', [
            'id'                        => $id,
            'user'                      => $user,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_lessons'         => $character_lessons,
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
                                        ->get();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
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
            'character_lessons'         => $character_lessons,
        ]);
    }
    public function getGownShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_items                = CharacterInventory::all();
        $gowns                          = Items::
                                        orderBy('id', 'asc')
                                        ->where('type', 'pelerin')
                                        ->get();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        return view('location.gown-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_items'           => $character_items,
            'gowns'                     => $gowns,
            'character_lessons'         => $character_lessons,
        ]);
    }
    public function getBroomShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_items                = CharacterInventory::all();
        $brooms                         = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'süpürge')
                                        ->get();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        return view('location.broom-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_items'           => $character_items,
            'brooms'                    => $brooms,
            'character_lessons'         => $character_lessons,
        ]);
    }
    public function getPetShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_items                = CharacterInventory::all();
        $pets                           = Items::
                                        orderBy('price', 'asc')
                                        ->where('type', 'evcil hayvan')
                                        ->get();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        return view('location.pet-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_items'           => $character_items,
            'pets'                      => $pets,
            'character_lessons'         => $character_lessons,
        ]);
    }
    public function getBookShop($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_books                = CharacterBook::all();
        $books                          = Book::
                                        orderBy('price', 'asc')
                                        ->get();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        return view('location.book-shop', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_books'           => $character_books,
            'books'                     => $books,
            'character_lessons'         => $character_lessons,
        ]);
    }
    public function getClassroom($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        $current_lesson                 = CharacterLesson::all();
        return view('location.classroom', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_lessons'         => $character_lessons,
            'current_lesson'            => $current_lesson,
        ]);
    }
    public function getClassroomQuiz($id) {
        $user                           = Auth::user();
        $location                       = Location::find($id);
        $all_locations                  = Location::all();
        $all_periods                    = PeriodCup::all();
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        $current_lesson                 = CharacterLesson::all();
        return view('location.classroom-quiz', [
            'user'                      => $user,
            'id'                        => $id,
            'location'                  => $location,
            'sub_locations'             => $all_locations,
            'all_locations'             => $all_locations,
            'locations'                 => $all_locations,
            'all_periods'               => $all_periods,
            'character_lessons'         => $character_lessons,
            'current_lesson'            => $current_lesson,
        ]);
    }
    public function getSchool($id) {
        $user                           = Auth::user();
        $character                      = $user->id;
        $character_lessons              = CharacterLesson::where('character_id', Auth::user()->character->id)->get();
        $all_lessons                    = Lesson::all();
        $locations                      = Location::all();
        $all_periods                    = PeriodCup::all();
        $location                       = Location::find($id);
        return view('location.school', [
            'user'                      => $user,
            'id'                        => $id,
            'character'                 => $character,
            'character_lessons'         => $character_lessons,
            'all_lessons'               => $all_lessons,
            'locations'                 => $locations,
            'sub_locations'             => $locations,
            'all_periods'               => $all_periods,
            'location'                  => $location,
        ]);
    }
    // Ders Kaydı Silme
    public function deleteLesson(Request $request) {
        $delete = CharacterLesson::find($request->id);
        $delete->delete();
        return redirect()->route('get-school', ['id' => 1]);
    }
    // Ders Kaydı Ekleme
    public function submitLesson(Request $request) {
        $submit = new CharacterLesson;
        $submit->lesson_id = $request->lesson_id;
        $submit->character_id = $request->character_id;
        $submit->status = 1;
        $submit->note_status = 0;
        $submit->note_status_short = 0;
        $submit->save();
        return redirect()->route('get-school', ['id' => 1]);
    }
    // Sınav Sonucu
    public function quizSubmit(Request $request) {
        $user = Auth::user();
        $submit = new CharacterQuiz;
        $submit->character_id = $user->character->id;
        $submit->lesson_id = $request->lesson_id;
        $submit->period_id = $request->period_id;
        $submit->point = $request->quiz_point;
        $submit->save();
        
        $update1 = Character::find($user->character->id);
        $update1->galleon = $user->character->galleon+$request->galleon;
        $update1->save();

        $update2 = CharacterLesson::find($request->lesson_id);
        $update2->note_status = $request->quiz_point;
        $update2->note_status_short = $request->quiz_point;
        $update2->save();
        return redirect()->route('get-school', ['id' => 1]);
    }
}