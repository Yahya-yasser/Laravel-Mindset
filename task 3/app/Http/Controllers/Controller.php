<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function check($color){
        return view('colors' , ['color' => $color]);
    }
}
