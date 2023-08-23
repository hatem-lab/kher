<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Timeline extends Component
{
    public function render()
    {
        $courses = auth('admin')->user()->courses;
        // print_r(auth('admin')->user());
        // die();
        // foreach ($courses as $key => $course){
        //     echo $course->lectures;
        // }
        // die();
        if(count($courses) > 0){
            return view('teacherTimeLine.timeline', compact('courses'));
        }
        else{
            $courses=[];
            return view('teacherTimeLine.timeline', compact('courses'))->with('message','you have no courses');
        }
    }
}
