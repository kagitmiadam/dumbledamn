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
use App\Models\PeriodCup;
use App\Models\PeriodCupDetail;

class PeriodController extends Controller
{
    // Geçmiş Dönem Kupaları
    public function pastPeriodInfo(){
        $user                           = Auth::user();
        $character                      = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        $spells                         = Spell::all();
        $all_periods                    = PeriodCup::all();
        $all_past_periods               = PeriodCup::where('school_id', '=', Auth::user()->character->school->id)->get();
        $classes_cup_wins               = PeriodCup::select('class_id_1', 'point_1', 'class_id_2', 'point_2', 'class_id_3', 'point_3', 'class_id_4', 'point_4', 'status')
                                        ->where('school_id', '=', Auth::user()->character->school->id)
                                        ->where('status', '=', 2)
                                        ->get();
        return view('periods.past.index', [
            'user'                      => $user,
            'character'                 => $character,
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'spells'                    => $spells,
            'all_periods'               => $all_periods,
            'all_past_periods'          => $all_past_periods,
            'classes_cup_wins'          => $classes_cup_wins,
        ]);
    }
    public function periodAllInfo(){
        $user                           = Auth::user();
        $character                      = $user->id;
        $gender                         = Gender::all();
        $school                         = School::all();
        $school_class                   = SchoolClass::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        $spells                         = Spell::all();
        $all_periods                    = PeriodCup::all();
        $all_past_periods               = PeriodCup::where('school_id', '=', Auth::user()->character->school->id)->get();
        $classes_cup_wins               = PeriodCup::select('class_id_1', 'point_1', 'class_id_2', 'point_2', 'class_id_3', 'point_3', 'class_id_4', 'point_4', 'status')
                                        ->where('school_id', '=', Auth::user()->character->school->id)
                                        ->where('status', '=', 2)
                                        ->get();
        return view('periods.all.index', [
            'user'                      => $user,
            'character'                 => $character,
            'user'                      => $user,
            'character'                 => $character,
            'gender'                    => $gender,
            'school'                    => $school,
            'school_class'              => $school_class,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'spells'                    => $spells,
            'all_periods'               => $all_periods,
            'all_past_periods'          => $all_past_periods,
            'classes_cup_wins'          => $classes_cup_wins,
        ]);
    }
    public function currentPeriod(){
        $user                           = Auth::user();
        $character                      = $user->id;
        $all_periods                    = PeriodCup::all();
        $locations                      = Location::all();
        $sub_locations                  = Location::all();
        foreach($all_periods->where('school_id', $user->character->school->id) as $period) {
            // 0: Başlamayan dönem
            // 1: Devam eden dönem
            // 2: Biten dönem
            if ($period->status == 0) {
                $period_end_date        = $period->end_date;
                $period_start_date      = $period->start_date;
            } elseif ($period->status == 1) {
                $period_end_date        = $period->end_date;
                $period_start_date      = $period->start_date;
            } elseif ($period->status == 2) {
                $period_end_date        = $period->end_date;
                $period_start_date      = $period->start_date;
            }
        }
        return view('periods.current.index', [
            'user'                      => $user,
            'character'                 => $character,
            'all_periods'               => $all_periods,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'period_start_date'         => $period_start_date,
            'period_end_date'           => $period_end_date,
        ]);
    }
    // Dönem Kupası Detayları
    public function periodDetailInfo($id) {
        $user                       = Auth::user();
        $character                  = $user->id;
        $current_period             = PeriodCup::find($id);
        $past_period                = PeriodCup::find($id);
        $selected_period            = PeriodCup::find($id);
        $period_details             = PeriodCupDetail::where('period_id', $id)->get();
        $period_characters          = PeriodCupDetail::groupBy('character_id')
                                      ->select('character_id')
                                      ->selectRaw("SUM(point) as total_point")
                                      ->where('period_id', '=', $id)
                                      ->orderBy('total_point', 'desc')
                                      ->get();
        $locations                  = Location::all();
        $sub_locations              = Location::all();
        $all_periods                = PeriodCup::all();
        return view('periods.detail.index', [
            'id'                        => $id,
            'user'                      => $user,
            'character'                 => $character,
            'current_period'            => $current_period,
            'past_period'               => $past_period,
            'selected_period'           => $selected_period,
            'period_details'            => $period_details,
            'period_characters'         => $period_characters,
            'locations'                 => $locations,
            'sub_locations'             => $sub_locations,
            'all_periods'               => $all_periods,
        ]);
    }
}
