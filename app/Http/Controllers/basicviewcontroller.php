<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\neuralschema as NeuralSchema;
use App\dataset;
use App\users;
use App\posts;

class basicviewcontroller extends Controller
{
    //
    public function admin(){
        $data=dataset::all();
        return view('admin')->with('data',$data);
    }
    public function dashboard(){
        $user=users::where('user',session('user'))->get();
        $posts=posts::where('user','!=',session('user'))->orderBy('id', 'desc')->get();
        return view('dashboard')->with(['users'=>$user,'posts'=>$posts]);
    }

    public function myposts(){
        $posts=posts::where('user',session('user'))->orderBy('id', 'desc')->get();
        return view('myposts')->with(['posts'=>$posts]);
    }

    public function myfriends(){
        $users=users::all();
        return view('myfriends')->with(['users'=>$users]);
    }

    public function storepost(Request $request){
       $p=new posts();
       $p->title=$request->title;
       $p->contents=$request->contents;
       //merging title and post content
       $contents=$request->title.' '.$request->contents;
       //neural initialize
       $n=new NeuralSchema();
       //Adding test data to run the artificial neural network
       $fakeprobability=$n->addTestData($contents);
       //finally fake storing fake percentage of this post
       $p->fake=$fakeprobability;
       $p->user=session('user');
       try{
          $p->save();
          echo '<div class="alert-success p-3 rounded">Successfully done!</div>';
       }
       catch(\Exception $e){
           echo 'something went wrong!'.$e;
       }
    }

}
