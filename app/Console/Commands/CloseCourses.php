<?php

namespace App\Console\Commands;


use App\Http\Controllers\Admin\CourseController;
use Illuminate\Console\Command;


class CloseCourses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CloseCourses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CloseCourses: to close all course on close course close date';

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
       CourseController::Close_Course();
        echo "done to do schedule";
    }
  

}