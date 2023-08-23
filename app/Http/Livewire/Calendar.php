<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Lecture;

class Calendar extends Component
{
    public function render()
    {


    $getEvents =  auth('admin')->user()->courses;

    $events = array();
    foreach($getEvents as $values) {
        $lectures = $values->lectures;
        foreach ($lectures as $lecture) {

        $events[] = [
            'id'   => $lecture->id,
            'title' => $lecture->title,
            'start' => $lecture->start_date,
            'end' => $lecture->end_date,
            // 'color' => $color
        ];
    }
    }
    // foreach ($getEvents as $values) {
    //     $lectures = $values->lectures;
    //     foreach ($lectures as $lecture) {
    //     $event = [];
    //     $event['title'] = $lecture->title;
    //     $event['status'] = 1;
    //     $event['start'] = $lecture->start_date;
    //     $event['end'] = $lecture->end_date;
    //     $events[] = $event;

    //     }
    // }
    // print_r(json_encode($events));
    // die();
    $allBookings = Lecture::all();
    $bookings = json_encode($allBookings);//$allBookings->toJson();

    // return view('admin.calendar.index', compact('bookings'));
        return view('livewire.calendar' ,  ['events' => json_encode($events)]); ;
        // return view('calendar.index', ['events' => $events]);
    }








}
