<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stuff;
use Auth;
use App\Http\Resources\StuffCollection;

class StuffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $school_id = Auth::user()->school_id;
        $stuffs = Stuff::where('school_id', $school_id)->orWhere('school_id', null)->paginate(25);
        $resource = new StuffCollection($stuffs);
        return $resource;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('stuff.create');
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
        $data = $request->validate($request->json());
        $stuff = Stuff::create($data);
        return response()->json($stuff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $stuff = Stuff::findOrFail($id);
        return view('stuff.edit')->with('stuff', $stuff);
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
        $stuff = Stuff::findOrFail($id);
        $stuff = $request->input('title');
        $stuff->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $stuff = Stuff::findOrFail($id);
        $stuff->delete();
        return response()->json('Apagado com sucesso!');
    }
}
