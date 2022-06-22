<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Passenger;
use Validator;

class PassengerController extends Controller
{

    public function create()
    {
        return view('customer.passenger.create');
    }   

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|string',
            'firstname'=>'required|string',
            'surname'=>'required|string', 
            'passport_id'=>'required|string',
            ]);
 
        if($validator->fails()) 
        {
            return redirect('customer/passenger/create')->withErrors($validator)->withInput();
        }

        $data=array(
            'title'=>$request->get('title'),
            'firstname'=>$request->get('firstname'),
            'surname'=>$request->get('surname'),
            'passport_id'=>$request->get('passport_id'),
            'customer_id'=>auth()->user()->id
        );

        $passenger = new Passenger();
        $addPassenger = $passenger->addPassenger($data);

        return redirect('customer');
    }

    public function delete($id)
    {
      $passenger = new Passenger();
      $checkPassenger = $passenger->getPassengerById($id); 
      if($checkPassenger)
      {
        $deletePassenger = $passenger->deletePassenger($checkPassenger->id);
        
      }
      
      return redirect('customer');
    } 

}
