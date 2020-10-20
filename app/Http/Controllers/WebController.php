<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function contact () {
        $name = 'Maria';
        $lastName = 'Meza';
        $text = 'hola hola hola hola hola';

        return view('home',compact('name','lastName', 'text'));
    }
}
