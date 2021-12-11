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
        $update->status = $request->status;

        $update->save();

        return redirect()->route('get-auth-homepage')->with('success', 'Herşey tamam!');
    }
    public function homepage() {
        $user = Auth::user();
        $character = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        return view('auth-homepage.homepage.index', [
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
        ]);
    }
}
