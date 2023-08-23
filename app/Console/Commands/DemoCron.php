<?php

namespace App\Console\Commands;

use App\Models\Homework;
use Carbon\Carbon;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

            $H_now = date('H', $date_now);
            $S_now = date('s', $date_now);
            $I_now = date('i', $date_now);

            $H_date = date('H', $timestamp);
            $S_date = date('s', $timestamp);
            $I_date = date('i', $timestamp);

            if($day==$day_now && $month==$month_now && $year->year == $year_now && $H_now==$H_date && $S_now== $S_date && $I_now== $I_date)
            {
                $homework->status=2;
                $homework->save();
            }

        }

    }
}
