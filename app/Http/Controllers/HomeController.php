<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // set up what data we want to send to the view
        // $tweets = Tweet::latest()->get();
        return view('home', [
            // we want to get the users timeline -> not just all tweets -> this is unique
            'tweets' => auth()->user()->timeline()
            // 'tweets' => Tweet::all()
        ]);
    }
}
