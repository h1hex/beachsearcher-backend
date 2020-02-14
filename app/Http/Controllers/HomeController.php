<?php

namespace App\Http\Controllers;

use App\Beach;
use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;

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
        return view('home', [
            'beaches' => Beach::all(),
            'reviews' => Review::where('user_id', Auth::id())->where('status', 10)->get()
        ]);
    }

    public function addReview(Request $request) {
        Review::create([
            'beach_id' => $request['beach_id'],
            'user_id' => Auth::id(),
            'rating' => $request['rating'],
            'text' => $request['text'],
        ]);
        return redirect()->route('home');
    }
}
