<?php

namespace App\Console\Commands;


use App\Http\Controllers\Admin\CourseController;
use App\Models\Homework;
use Illuminate\Console\Command;
use Carbon\Carbon;

class CloseHomework extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'close:homework';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CloseHomework: to close all course on close Homework close date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }



    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $homeworks=Homework::all();
        foreach ($homeworks as $homework)
        {

            $date_now = strtotime(Carbon::now());
            $timestamp = strtotime($homework->date);


            $day = date('d', $timestamp);
            $month = date('m', $timestamp);
            $year = new Carbon( $homework->date );

            $day_now = date('d', $date_now);
            $month_now = date('m', $date_now);
            $year_now = Carbon::now()->format('Y');

            if($day==$day_now && $month==$month_now && $year->year == $year_now)
            {
                $homework->status=2;
                $homework->save();
            }

        }
    }


}
