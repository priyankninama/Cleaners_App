<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\BookingDetail;
use App\Models\City;
use App\Models\Cleaner;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingDetails = BookingDetail::with('customer', 'cleaner', 'city')->get();

        return view('admin.dashboard',compact('bookingDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_no' => $request->phone_no,
        ]);

        $startTime = Carbon::parse($request->date.' '.$request->time);
        $endTime = $startTime->copy()->addHours($request->no_of_hours);
        
        $bookedCleanersId = BookingDetail::bookedCleaners($startTime, $endTime)->get()->pluck('cleaner.id')->unique()->toArray();

        $availableCleaners = City::findorFail($request->city)->cleaners()->select('id')->whereNotIn('id', $bookedCleanersId)->get();

        if($availableCleaners->count() == 0){

            return redirect('/book-cleaner')->with('reject','There is no cleaner available in your City.');
        };

        $cleaner = $availableCleaners->random();

        $customer->bookingDetail()->create([
            'city_id' => $request->city,
            'cleaner_id' => $cleaner->id,
            'date_time' => $startTime,
            'no_of_hours' => $request->no_of_hours,
            'booked_time' => $endTime,
        ]);

        return redirect('/book-cleaner')->with('success','Cleaner Booked successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function show(BookingDetail $bookingDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingDetail $bookingDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingDetail $bookingDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingDetail  $bookingDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingDetail $bookingDetail)
    {
        //
    }
}
