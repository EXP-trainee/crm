<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name' , 
        'middle_name' , 
        'last_name' , 
        'email' , 
        'dob' , 
        'address1' ,
        'address2' ,
        'company' ,
        'city' ,
        'state',
        'country' ,
        'zip' ,
        'phone' ,
        'other_info' ,
        'note' ,
        'status' 
    ];

    public static function rules($update = false, $id = null)
    {
        $common = [
            'first_name'   => 'required',
            'last_name'  => 'required',
            'address1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',
            'phone' => 'required|min:9',
        ];

        return $common;
    }
}
