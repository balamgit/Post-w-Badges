<?php

namespace App\Http\Controllers;

use App\dataset;

class neuralschema
{
    //this function is base for hidden neural layers 1
    protected function baselayer1($dataset,$input){
        // Lets use a regular expression to match a our dataset string with timieline post content
       // the output since we are just testing if the regex matches.

        if (preg_match("/\b$dataset\b/i", $input, $match)) {
         // Indeed, the expression "/'.$dataset.'+/"; matches the date string
         // if its true it returns 10% of probability for each keyword & tags match
         return 20;
     }
     else {
         // If preg_match() returns false, then the regex does not match the string
         //false statement wil returns a zero probability
         return 0;
     }
  }

    //this function is base for hidden neural layers 1
    protected function baselayer2($dataset,$input){
        // Lets use a regular expression to match a our dataset string with timieline post content
        // the output since we are just testing if the regex matches.

        if (preg_match("/\b$dataset\b/i", $input, $match)) {
            // Indeed, the expression "/'.$dataset.'+/"; matches the date string
            // if its true it returns 10% of probability for each keyword & tags match
            return 10;
        }
        else {
            // If preg_match() returns false, then the regex does not match the string
            //false statement wil returns a zero probability
            return 0;
        }
    }


    //this function is base for hidden neural layers 3 only for contents
    protected function baselayer3($dataset,$input){
        // Lets use a regular expression to match a our dataset string with timieline post content
        // the output since we are just testing if the regex matches.

        if (preg_match("/\b$dataset\b/i", $input, $match)) {
            // Indeed, the expression "/'.$dataset.'+/"; matches the date string
            // if its true it returns 10% of probability for each keyword & tags match
            return 100;
        }
        else {
            // If preg_match() returns false, then the regex does not match the string
            //false statement wil returns a zero probability
            return 0;
        }
    }


    //neuron base function for tags
    protected function neuron1($base){
        $prob=0;
        $datasets=dataset::all();
        foreach ($datasets as $dataset){
            //match for tags only
            $prob+=$this->baselayer1($dataset->tags,$base);
        }
        return $prob;
    }

    //neuron base function for keywords
    protected function neuron2($base){
        $prob=0;
        $datasets=dataset::all();
        foreach ($datasets as $dataset){
            //match for keywords only
            $prob+=$this->baselayer2($dataset->keywords,$base);
        }
        return $prob;
    }

    //neuron base function for contents
    protected function neuron3($base){
        $prob=0;
        $datasets=dataset::all();
        foreach ($datasets as $dataset){
            //match for contents only
            $prob+=$this->baselayer3($dataset->contents,$base);
        }
        return $prob;
    }

    public function addTestData($INcontents){
        //here we are creating trained dataset and adding input source OR test data
        $t=$this->neuron1($INcontents);
        $k=$this->neuron2($INcontents);
        $c=$this->neuron3($INcontents);
        $f=$t+$k+$c;
        if($f>100){
            return 100;
        }
        else{
            return $f;
        }
    }
}
