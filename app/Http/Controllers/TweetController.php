<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    /**
     * Show the tweets content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // set up what data we want to send to the view
        // $tweets = Tweet::latest()->get();
        return view('tweets.index', [
            // we want to get the users timeline -> not just all tweets -> this is unique
            'tweets' => auth()->user()->timeline()
            // 'tweets' => Tweet::all()
        ]);
    }

    /**
     * store method -> persist data into db
     */
    public function store()
    {
        // validate request data -> array of validated attributes
        $attributes = request()->validate(['body'=>'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        // once persisted -> redirect
        return redirect('/home');
    }
}
