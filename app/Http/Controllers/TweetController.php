<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
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
