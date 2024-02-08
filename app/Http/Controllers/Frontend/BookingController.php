<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function Checkout(){
        if(Session::has('book_date')){
            $book_data = Session::get('book_date');
            $room = Room::find($book_data['room_id']);

            $toDate = Carbon::parse($book_data['check_in']);
            $fromDate = Carbon::parse($book_data['check_out']);
            $nights = $toDate->diffInDays($fromDate);

            return view('frontend.checkout.checkout', compact('book_data', 'room', 'nights'));
        }else{
            $notification = array(
                'message' => "Something want to wrong",
                'alert-type' => 'error'
            );

            return redirect('/')->with($notification);
        }// end else
    } // End Method

    public function BookingStore(Request $request){
        $validateData = $request->validate([
            "check_in" => "bail|required",
            "check_out" => "bail|required",
            "persion" => "bail|required",
            "number_of_rooms" => "bail|required"
        ]);

        if($request->available_room < $request->number_of_rooms){
            $notification = array(
                'message' => "Something want to wrong",
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        Session::forget('book_date');

        $data = array();
        $data['number_of_rooms'] = $request->number_of_rooms;
        $data['available_room'] = $request->available_room;
        $data['persion'] = $request->persion;
        $data['check_in'] = date("Y-m-d", strtotime($request->check_in));
        $data['check_out'] = date("Y-m-d", strtotime($request->check_out));
        $data['room_id'] = $request->room_id;

        Session::put('book_date', $data);

        return redirect()->route('checkout');
    } // End Method
}
