<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\School;
use App\Models\PeriodCup;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $active_school_id = School::where('status', 1)->pluck('id');
        $period_cups = PeriodCup::whereIn('status', [0, 1])->whereIn('school_id', $active_school_id)->get();
        if(!empty($period_cups->all())) {
            \Artisan::call("period:check");
        }
    }
}
