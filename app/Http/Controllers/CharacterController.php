<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;
use App\Models\Gender;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Location;
use App\Models\LocationType;
use App\Models\Spell;
use App\Models\CharacterInventory;
use App\Models\CharacterBook;
use App\Models\CharacterSpell;
use App\Models\Lesson;
use App\Models\CharacterLesson;
use App\Models\PeriodCup;

class CharacterController extends Controller
{
    public function sortingHat(Request $request) {
        $user = Auth::user();
        $character = $user->id;
        return view('homepage.sorting-hat.index', [
            'user'                      => $user,
            'character'                 => $character,
        ]);
    }
    public function submitSortingHat(Request $request) {
        $user = Auth::user();
        $character = new Character;
        $character->user_id = $user->id;
        $character->gender_id = $request['avatar-gender'];
        $character->school_id = $request['school-select'];
        if ($request->school_class_id == "gryffindor") {$request->school_class_id=1;}
        else if ($request->school_class_id == "slytherin") {$request->school_class_id=2;}
        else if ($request->school_class_id == "hufflepuff") {$request->school_class_id=3;}
        else if ($request->school_class_id == "ravenclaw") {$request->school_class_id=4;}
        $character->school_class_id = $request->school_class_id;
        $character->school_grade_id = 1;
        $character->save();

        return redirect()->route('get-select-wand')->with('success', 'Bina seçimi!');
    }
    public function selectWand() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        return view('homepage.select-wand.index', [
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
        ]);
    }
    public function submitSelectWand(Request $request) {
        $user = Auth::user();
        $update = Character::find($user->id);
        $update->preffered_core = $request->preffered_core;
        if($request->preffered_core == 1) {
            $character_wand_id = rand(1,5);
            $character_wand_ap = 22;
            $character_wand_dp = 17;
            $character_gown_ap = 12;
            $character_gown_dp = 8;
            $character_attack_power = $character_wand_ap + $character_gown_ap;
            $character_defence_power = $character_wand_dp + $character_gown_dp;
            if($user->character->school_class->color == "gryffindor") {
                $character_gown_id = 36;
            } else if($user->character->school_class->color == "slytherin") {
                $character_gown_id = 44;
            } else if($user->character->school_class->color == "hufflepuff") {
                $character_gown_id = 48;
            } else if($user->character->school_class->color == "ravenclaw") {
                $character_gown_id = 40;
            }
        } else if($request->preffered_core == 2) {
            $character_wand_id = rand(6,10);
            $character_wand_ap = 20;
            $character_wand_dp = 20;
            $character_gown_ap = 10;
            $character_gown_dp = 11;
            $character_attack_power = $character_wand_ap + $character_gown_ap;
            $character_defence_power = $character_wand_dp + $character_gown_dp;
            if($user->character->school_class->color == "gryffindor") {
                $character_gown_id = 37;
            } else if($user->character->school_class->color == "slytherin") {
                $character_gown_id = 45;
            } else if($user->character->school_class->color == "hufflepuff") {
                $character_gown_id = 49;
            } else if($user->character->school_class->color == "ravenclaw") {
                $character_gown_id = 41;
            }
        } else if($request->preffered_core == 3) {
            $character_wand_id = rand(11,15);
            $character_wand_ap = 17;
            $character_wand_dp = 22;
            $character_gown_ap = 7;
            $character_gown_dp = 13;
            $character_attack_power = $character_wand_ap + $character_gown_ap;
            $character_defence_power = $character_wand_dp + $character_gown_dp;
            if($user->character->school_class->color == "gryffindor") {
                $character_gown_id = 38;
            } else if($user->character->school_class->color == "slytherin") {
                $character_gown_id = 46;
            } else if($user->character->school_class->color == "hufflepuff") {
                $character_gown_id = 50;
            } else if($user->character->school_class->color == "ravenclaw") {
                $character_gown_id = 42;
            }
        } else if($request->preffered_core == 4) {
            $character_wand_id = rand(16,20);
            $character_wand_ap = 15;
            $character_wand_dp = 25;
            $character_gown_ap = 5;
            $character_gown_dp = 16;
            $character_attack_power = $character_wand_ap + $character_gown_ap;
            $character_defence_power = $character_wand_dp + $character_gown_dp;
            if($user->character->school_class->color == "gryffindor") {
                $character_gown_id = 39;
            } else if($user->character->school_class->color == "slytherin") {
                $character_gown_id = 47;
            } else if($user->character->school_class->color == "hufflepuff") {
                $character_gown_id = 51;
            } else if($user->character->school_class->color == "ravenclaw") {
                $character_gown_id = 43;
            }
        }
        $update->wand_id = $character_wand_id;
        $update->gown_id = $character_gown_id;
        $update->attack_power = $character_attack_power;
        $update->defence_power = $character_defence_power;
        $update->speed_power = 0;
        $update->status = $request->status;

        $update->save();

        return redirect()->route('get-auth-homepage')->with('success', 'Herşey tamam!');
    }
    public function homepage() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        $spells                         = Spell::all();
        $character_lessons              = CharacterLesson::all();
        return view('auth-homepage.homepage.index', [
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'spells'                    => $spells,
            'character_lessons'                 => $character_lessons,
        ]);
    }
    public function character() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        $spells                         = Spell::all();
        $character_books                = CharacterBook::all();
        $character_items                = CharacterInventory::all();
        return view('character.index', [
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'spells'                    => $spells,
            'character_books'           => $character_books,
            'character_items'           => $character_items,
        ]);
    }
    public function characterInventory() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $character_items                = CharacterInventory::where('character_id', $user->id)->get();
        $character_lessons              = CharacterLesson::all();
        $all_lessons                    = Lesson::all();
        $locations                      = Location::all();
        $all_periods                    = PeriodCup::all();
        return view('character.inventory-item', [
            'user'                      => $user,
            'character'                 => $character,
            'character_items'           => $character_items,
            'character_lessons'         => $character_lessons,
            'all_lessons'               => $all_lessons,
            'locations'                 => $locations,
            'sub_locations'             => $locations,
            'all_periods'               => $all_periods,
            'all_periods'               => $all_periods,
        ]);
    }
    public function characterBookInventory() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $character_books                = CharacterBook::where('character_id', $user->id)->get();
        $character_lessons              = CharacterLesson::all();
        $all_lessons                    = Lesson::all();
        $locations                      = Location::all();
        $all_periods                    = PeriodCup::all();
        return view('character.inventory-book', [
            'user'                      => $user,
            'character'                 => $character,
            'character_books'           => $character_books,
            'character_lessons'         => $character_lessons,
            'all_lessons'               => $all_lessons,
            'locations'                 => $locations,
            'sub_locations'             => $locations,
            'all_periods'               => $all_periods,
        ]);
    }
    public function characterSpell() {
        $user                           = Auth::user();
        $character                      = $user->id;
        $character_spells               = CharacterSpell::where('character_id', $user->id)->get();
        $all_spells                     = Spell::all();
        $character_lessons              = CharacterLesson::all();
        $all_lessons                    = Lesson::all();
        $locations                      = Location::all();
        $all_periods                    = PeriodCup::all();
        return view('character.spell', [
            'user'                      => $user,
            'character'                 => $character,
            'character_spells'          => $character_spells,
            'all_spells'                => $all_spells,
            'character_lessons'         => $character_lessons,
            'all_lessons'               => $all_lessons,
            'locations'                 => $locations,
            'sub_locations'             => $locations,
            'all_periods'               => $all_periods,
        ]);
    }
}
