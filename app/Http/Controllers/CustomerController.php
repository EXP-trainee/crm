<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Imports\CustomersImport;
use App\Mail\TestEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function index()
    {
        $items = Customer::latest('updated_at')->paginate(10);

        return view('admin.customers.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Customer::rules());
        
        Customer::create($request->all());

        return back()->withSuccess(trans('app.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Customer::findOrFail($id);

        return view('admin.customers.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Customer::rules(true, $id));

        $item = Customer::findOrFail($id);

        $item->update($request->all());

        return redirect()->route(ADMIN . '.customers.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }

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

    public function test(){
        
        $customers = Customer::all();
        foreach ($customers as $item) {
            $data = ['message' => 'This is a test!',
                    'customer'     => $item,
                ];    
        }

        Mail::to('nguyenmanhhuynh98@gmail.com')->send(new TestEmail($data));

        return back()->withSuccess(trans('app.success_email'));
    }
}
