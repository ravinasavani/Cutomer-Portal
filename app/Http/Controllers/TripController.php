<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Passenger;
use Validator;

class TripController extends Controller
{
    public function create()
    {
        $passenger = new Passenger();
        $passengerData = $passenger->getPassengerByUserId(auth()->user()->id);

        return view('customer.passenger.trip.create',compact('passengerData'));
    }   

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'departure_airport'=>'required|string',
            'destination_airport'=>'required|string',
            'departure_datetime'=>'required', 
            'arrival_datetime'=>'required',
            'passenger_id'=>'required|min:1',
            ]);
 
        if($validator->fails()) 
        {
            return redirect('customer/passenger/trip/create')->withErrors($validator)->withInput();
        }

        $data=array(
            'departure_airport' => $request->get('departure_airport'),
            'destination_airport' => $request->get('destination_airport'),
            'departure_datetime' => $request->get('departure_datetime'),
            'arrival_datetime' => $request->get('arrival_datetime'),
            'passenger_id' => $request->get('passenger_id')
        );

        $trip = new Trip();
        $addTrip = $trip->addTrip($data);

        return redirect('customer');
    }

    public function delete($id)
    {
      $trip = new Trip();
      $checkTrip = $trip->getTripById($id); 
      if($checkTrip)
      {
        $deleteTrip = $trip->deleteTrip($checkTrip->id);
      }
      return redirect('customer');
    } 
}
