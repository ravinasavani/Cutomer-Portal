<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Trip;
class Passenger extends Model
{
    protected $table='passenger';
    protected $primaryKey="id";

    public function User()
    {
       return $this->belongsTo('App\User','customer_id','id');
    }

    public function Trip()
    {
        return $this->belongsToMany('App\Trip','passenger_id','id');
    }

    public function getPassengerByUserId($id)
    {
        $record=$this->where('customer_id', '=', $id)->get();
        if($record)
        {
          return $record;
        }
        return false;
    }

    public function getPassengerById($id)
    {
        $record=$this->where('id', '=', $id)->first();
        if($record)
        {
          return $record;
        }
        return false;
    }

    public function addPassenger($data)
    {
        $newPassenger = new Passenger();
        $newPassenger->title = $data['title'];
        $newPassenger->firstname = $data['firstname'];
        $newPassenger->surname = $data['surname'];
        $newPassenger->passport_id = $data['passport_id'];
        $newPassenger->customer_id = $data['customer_id']; 
        if($newPassenger->save())
        {
            return true;
        }
        return false;
    }

    public function deletePassenger($id)
    {        
        return $this->where('id', '=', $id)->delete();
    } 
}
