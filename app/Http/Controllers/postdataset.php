<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\neuralschema as neuralBridge;
use App\dataset;

class postdataset extends Controller
{
   public function store(Request $request){

       $dataset= new dataset();

       $dataset->tags=$request->tags;
       $dataset->keywords=$request->keywords;
       $dataset->contents=$request->contents;

       try{
          $dataset->save();
          return '<h1> Datasaved Successfully ! </h1>';
       }
       catch (\Exception $e){
         return 'Something went Worng';
       }

   }
}
