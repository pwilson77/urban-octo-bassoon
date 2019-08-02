<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Feature;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id =  auth()->user()->id;
        $bookings = Booking::where('user_id', $user_id)->orderBy('created_at','desc')->paginate(10);
        return view('bookings.index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $features = Feature::all();
        return view('bookings.create')->with('features',$features);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'location' => 'required',
            'booking_date' => 'required'
        ]);

        //Create booking
        $booking = new Booking;
        $booking->location = $request->input('location');
        $booking->status = "Scheduled";
        $booking->booking_date = $request->input('booking_date');
        $booking->user_id = auth()->user()->id;
        $booking->save();
        $booking->features()->sync($request->features,false);
        return redirect('/bookings')->with('success', 'Your trip has been scheduled');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $features = Feature::all();
        return view('bookings.edit')->with('booking',$booking)->with('features',$features);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location' => 'required',
            'booking_date' => 'required',
            'status' => 'required'
        ]);
        //Create booking
        $booking = Booking::find($id);
        $booking->location = $request->input('location');
        $booking->status = $request->input('status');
        $booking->booking_date = $request->input('booking_date');

        $booking->save();

        if (isset($request->features)) {
            $booking->features()->sync($request->features);
        } else {
            $booking->features()->sync(array());
        }
        return redirect('/bookings')->with('success', 'Booking Updated');
    
    }
    /**
     * Remove the specified resource from storage. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->features()->detach();
        $booking->delete();
        return redirect('/bookings')->with('success', 'Booking removed');
    }
}