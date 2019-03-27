<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

class logincontroller extends Controller
{
    //
    public function loginview(){
        return view('login');
    }

    public function loginsession(Request $request)
    {
        try{
        $checks = users::where(['user' => $request->user, 'pass' => $request->pass])->get();
        foreach ($checks as $check) {
            $uname = $check->user;
            $admin=$check->priv;
        }
        if ($checks) {
            session()->put([
                'user' => $uname,
                'admin' => $admin,
            ]);
            return redirect('/dashboard');
        } else {
            session()->flash('err_msg', 'Invalid email or password');
            return redirect('/login');
        }
    }
    catch (\Exception $e){
            session()->flash('err_msg','Something went worng contact admin');
            return back();
        }
    }

    //logout control
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }
}
