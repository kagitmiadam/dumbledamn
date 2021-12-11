<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SchoolClass;
use App\Models\PeriodCup;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PeriodCommand extends Command
{
    protected $signature = 'period:check';

    protected $description = 'Yeni sezona olan başlangıç süresini gösterir.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $this_year = $now->year;

        $start_date = "";
        $end_date = "";
        date_default_timezone_set("Europe/Istanbul");
        $start_date = date('Y-m-d H:i:s', strtotime($start_date . ' +1 minute'));
        $end_date = date('Y-m-d H:i:s', strtotime($end_date . ' +5 minute'));

        $active_school_id = School::where('status', 1)->pluck('id');
        $period_cups = PeriodCup::whereIn('status', [0, 1])->whereIn('school_id', $active_school_id)->get();
        $school_classes = SchoolClass::where('status', 1)->get();
        $schools = School::where('status', 1)->get();
        $period_add = false;

        foreach ($schools as $school) {
            // Sınıf Bilgileri
                if ($school->id == 1) {
                    $class_1        = 1;
                    $class_2        = 2;
                    $class_3        = 3;
                    $class_4        = 4;
                } elseif ($school->id == 2) {
                    $class_1        = 5;
                    $class_2        = 6;
                    $class_3        = 7;
                    $class_4        = 8;
                } elseif ($school->id == 3) {
                    $class_1        = 9;
                    $class_2        = 10;
                    $class_3        = 11;
                    $class_4        = 12;
                } elseif ($school->id == 4) {
                    $class_1        = 13;
                    $class_2        = 14;
                    $class_3        = 15;
                    $class_4        = 16;
                }
            // Eski Dönemi Bitirme / Yeni Dönem Ekleme
            foreach ($period_cups as $period_cup) {
                // End date Sonrası
                if (Carbon::now() >= $period_cup->end_date) {
                    $period_cup->status = 2;
                    $period_cup->save();
                    $period_add = true;
                }
                // Start date ile End date arası
                elseif (Carbon::now() >= $period_cup->start_date) {
                    $period_cup->status = 1;
                    $period_cup->save();
                    $period_add = false;
                }
            }
            // Dönem Bilgisi
            foreach ($period_cups->where('school_id', $school->id)->where('status', 2) as $last_period) {
                if (isset($last_period)) {
                    $period_count = $last_period->period + 1;
                } else {
                    $period_count = 1;
                }
            }
            // Yeni Dönem Ekleme
            if ($period_add) {
                $submit1 = new PeriodCup;
                $submit1->name = $this_year . " Yılı " . $period_count . ". Dönem Kupası";
                $submit1->description = $this_year . " Yılı " . $period_count . ". Dönem Kupası hakkında bilgi";
                $submit1->year = $this_year;
                $submit1->period = $period_count;
                $submit1->reward = 0;
                $submit1->school_id = $school->id;
                $submit1->class_id_1 = $class_1;
                $submit1->class_id_2 = $class_2;
                $submit1->class_id_3 = $class_3;
                $submit1->class_id_4 = $class_4;
                $submit1->point_1 = rand(0, 1000);
                $submit1->point_2 = rand(0, 1000);
                $submit1->point_3 = rand(0, 1000);
                $submit1->point_4 = rand(0, 1000);
                $submit1->start_date = $start_date;
                $submit1->end_date = $end_date;
                $submit1->status = 0;
                $submit1->save();
            }
        }

        $this->info('Dönem güncellendi!');
    }
}
