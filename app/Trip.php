<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table='trip';
    protected $primaryKey="id";

    public function Passenger()
    {
       return $this->belongsTo('App\Passenger','passenger_id','id');
    }

    public function getTripById($id)
    {
        $record=$this->where('id', '=', $id)->first();
        if($record)
        {
          return $record;
        }
        return false;
    }

    public function getTrip()
    {
        $record=$this->with(['Passenger'])->get();
        if($record)
        {
          return $record;
        }
        return false;
    }

    public function addTrip($data)
    {
        $passengerIds=implode(",",$data['passenger_id']);
        $newTrip = new Trip();
        $newTrip->departure_airport = $data['departure_airport'];
        $newTrip->destination_airport = $data['destination_airport'];
        $newTrip->departure_datetime = $data['departure_datetime'];
        $newTrip->arrival_datetime = $data['arrival_datetime'];
        $newTrip->passenger_id = $passengerIds; 
        if($newTrip->save())
        {
            return true;
        }
        return false;
    }

    public function deleteTrip($id)
    {        
        return $this->where('id', '=', $id)->delete();
    } 
}
