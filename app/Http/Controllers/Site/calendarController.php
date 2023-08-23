<?php

namespace App\Http\Controllers\Site;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Http\Controllers\Controller;

class calendarController extends Controller
{
    public function index()
    {
  
    $student = auth('student')->user();
    $getEvents =  $student->courses;
      
    $events = array();
    foreach($getEvents as $values) {
        $lectures = $values->lectures;
        foreach ($lectures as $lecture) {
           
        $events[] = [
            'id'   => $lecture->id,
            'title' => 'lecture '.$lecture->title,
            'start' => $lecture->start_date,
            'end' => $lecture->end_date,
            'color' => 'blue'
        ];

        $hw=$lecture->homework;
        if($hw != null){
            $events[] = [
                'id'   => $hw->id,
                'title' => 'HomeWork '.$hw->title,
                'start' => $hw->created_at,
                'end' => $hw->created_at,
                'color' => 'green'
            ];
        }
       
    }
    $course_tests = $values->tests;
                foreach ($course_tests as $test) {
                    $events[] = [
                        'id'   => $test->id,
                        'title' => 'Test '.$test->title,
                        'start' => $test->date,
                        'end' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $test->date)->addMinutes($test->duration),
                        'color' => 'red'
                    ];
                }
    }
        return view('user.calendar.calendar' ,  ['events' => $events]); ;
    }





    

    
}
