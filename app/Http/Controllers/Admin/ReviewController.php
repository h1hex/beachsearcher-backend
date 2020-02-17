<?php

namespace App\Http\Controllers\Admin;

use App\Beach;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reviews.index', [
            'reviews' => Review::orderBy('id', 'desc')->where('reply_to', null)->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['store_reply']) {
            $review = Review::create([
                'reply_to' => $request['reply_to'],
                'beach_id' => $request['beach_id'],
                'user_id' => Auth::id(),
                'status' => 10,
                'text' => $request['text'],
                'type' => 4
            ]);

            $reply_to = Review::where('id', $request['reply_to'])->first();
            return redirect()->route('admin.reviews.edit', $reply_to);
        }
        return redirect()->route('admin.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', [
            'review' => $review,
            'beach' => Beach::where('id', $review->beach_id)->first(),
            'user' => User::where('id', $review->user_id)->first(),
            'answers' => Review::where('reply_to', $review->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->all());

        return redirect()->route('admin.reviews.edit', $review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index');
    }
}
