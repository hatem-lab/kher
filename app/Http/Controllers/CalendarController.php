<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\VerificationMail;
use App\Models\Lecture;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $id = $request['id'];

        $events = array();
        $bookings = Course::where('id', $id)->first()->lectures;
        foreach($bookings as $booking) {
            $color = null;
            if($booking->title == 'lecture 1') {
                $color = '#924ACE';
            }
            if($booking->title == 'lecture 3') {
                $color = '#68B01A';
            }

            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color
            ];
        }
        return view('teacherTimeLine.calendar', ['events' => $events]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $booking = Lecture::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $color = null;

        if($booking->title == 'Test') {
            $color = '#924ACE';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color: '',

        ]);
    }
    public function update(Request $request ,$id)
    {
        $booking = Lecture::find($id);

//        dd($request);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }
    public function destroy($id)
    {
        $booking = Lecture::find($id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $booking->delete();
        return $id;
    }
    public function Contact(){
        $contact =  Contact::first();
        return view('user.contact-us',compact('contact'));
    }

    public function Send_Email(Request $request){
        $contact =  Contact::first();

        if($contact->email)
        {
            $details['name']=$request->name;
            $details['body']=$request->subject;
            $details['email']=$request->email;

            Mail::to($contact->email)->send(new ContactMail($details));
            return redirect()->back()->with(['message'=>'تم الارسال بنجاح']);
        }
        return redirect()->back();


    }


}
