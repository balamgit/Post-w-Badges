<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dataset;

class basicviewcontroller extends Controller
{
    //
    public function dashboard(){
        $data=dataset::all();
        return view('dashboard')->with('data',$data);
    }
    public function source(){
        $data=dataset::all();
        return view('source')->with('data',$data);
    }

}
