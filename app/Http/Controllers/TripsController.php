<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top()
    {
        if(\Auth::check()) {
            // ログイン中
            return view('mypage');
            
        } else {
            // ログイン中でない
            return view('top');
        }
    } 
}

