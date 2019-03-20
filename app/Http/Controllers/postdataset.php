<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

   public function update(Request $request,$id){

   }

   public function delete(Request $request){

        $data=dataset::find($request->ids);
        try{
            $data->delete();
            echo '<div class="alert-success p-3 rounded">Successfully done!</div>';
        }
        catch (\Exception $e){
            echo '<div class="alert-danger p-3 rounded">Something went wrong!</div>';
        }
   }

}
