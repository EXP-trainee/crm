<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function test(){
        $data = Customer::all();
        // $data = Customer::all()->pluck('email');
        // dd($data);
        // die;
        foreach ($data as $item) {
            # code...
            if ($item->email != null) {
                # code...
                    Mail::send('layouts.mail', array('data2'=>$item,'data'=>$item->email), function ($message) use($item) {
                        $message->from('john@johndoe.com', 'John Doe');
                        $message->to($item->email, 'New Product');
                        $message->subject('Subject');
                    });
            }
        }
        return back()->withSuccess(trans('app.success_email'));
    }
}
