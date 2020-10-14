<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name' => $row[0], 
        'middle_name' => $row[1], 
        'last_name' => $row[2], 
        'email' => $row[3], 
        'dob' => $row[4], 
        'address1' => $row[6],
        'address2' => $row[5],
        'company' => $row[7],
        'city' => $row[8],
        'state' => $row[9],
        'country' => $row[10],
        'zip' => $row[11],
        'phone' => $row[12],
        'other_info' => $row[13],
        'note' => $row[14],
        ]);
    }
}
