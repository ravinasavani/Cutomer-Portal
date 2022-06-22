<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Passenger;
use App\Trip;
use Validator;

class UserController extends Controller
{
   
    public function index()
    {
        $user = new User();
        $userData = $user->getUserById(auth()->user()->id);

        $passenger = new Passenger();
        $passengerData = $passenger->getPassengerByUserId(auth()->user()->id);

        $trip = new Trip();
        $tripData = $trip->getTrip();


        return view('customer.edit', compact('userData','passengerData','tripData'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore(auth()->user()->id),],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string']
          ]);
        $data=array(
          'email'=>$request->get('email'),
          'name'=>$request->get('name'),
          'address'=>$request->get('address'),
          'city'=>$request->get('city'),
          'country'=>$request->get('country')
        );
        $userId = auth()->user()->id; 
        $user=new User();
        $user=$user->updateUser($data, $userId);
        
      return redirect('customer');
    }
}
