<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;
use Redirect;

class TweetController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $tweets = Tweet::with('user')->get();

        return view('home')->with(compact('tweets'));

    }

    /**
     *Save Tweet
     */
    public function saveTweet(Request $request) {

        $validated = $request->validate([
            'message' => 'required|max:250',
        ]);

        $save_data = [
            'user_id' => Auth::user()->id,
            'message' => $request->message
        ];

        $tweet = Tweet::create($save_data);

        return Redirect::back()->with('message', 'Tweet created successfully');
    }
}
