<?php

namespace App\Http\Controllers\Api;

use App\Beach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $beach_id = $request['beach_id'];

        if ($beach_id) {
            $beach = Beach::where('id', $beach_id)->first();

            $data = [
                'beach' => $beach,
                'beach_metas' => $beach->metas()->get()
            ];

            return json_encode($data);
        }
        else {
            $error = [
                'code' => 400,
                'message' => 'Required parameters not specified'
            ];

            return json_encode($error);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
