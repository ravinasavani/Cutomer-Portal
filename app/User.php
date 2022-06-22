<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];  
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserById($id)
    {
        $record=$this->where('id', '=', $id)->first();
        if($record)
        {
          return $record;
        }
        return false;
    }

    public function updateUser($requestData,$id)
    {
        $updatedData =$this->where('id',$id)->update([
           "name" => $requestData['name'],
           "name" => $requestData['name'],
           "address" => $requestData['address'],
           "city" => $requestData['city'],
           "country" => $requestData['country'],
           "updated_at" => Carbon::now(), 
        ]);

        if($updatedData)
        {
             return true;
        }
        return false;
    }
}
