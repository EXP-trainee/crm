<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Imports\CustomersImport;
use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new CustomersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new CustomersImport,request()->file('file'));
           
        return back();
    }

    public function searchCustomer($keyword) 
    {
        $items = Customer::where('first_name','like',"%$keyword%")->orwhere('middle_name','like',"%$keyword%")->orwhere('last_name','like',"%$keyword%")->get();
           
        return view("admin.customers.search",compact('items'));
    }
}
