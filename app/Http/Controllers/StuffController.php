<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stuff;
use Auth;
use App\Http\Resources\StuffCollection;
use App\Http\Requests\StuffStoreRequest;
use Flash;

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
        $where = [
          ['schools.id', '=', $school_id]
        ];
        if($group_id = $request->input('group_id')){
          $where[] = ['stuffs.group_id', '=', $group_id];
        }
        $stuffs = Stuff::join('groups', 'groups.id', '=', 'stuffs.group_id')
                       ->join('schools', 'groups.school_id', 'schools.id')
                       ->where($where)
                       ->select('stuffs.*')
                       ->paginate(25);
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
        return view('stuffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StuffStoreRequest $request)
    {
        //
        $data = $request->validated();
        $stuff = Stuff::create($data);
        Flash::success("Matéria {$data['title']} criada com sucesso!");
        return redirect('/stuffs/create');
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
        if($this->isOurStuff($stuff)){
          return view('stuffs.edit')->with('stuff', $stuff);
        }
        return view('errors.401', 401);
    }

    private function isOurStuff($stuff){
      return $stuff->group->school_id == Auth::user()->school_id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $stuff = Stuff::findOrFail($data['id']);
        if($this->isOurStuff($stuff)){
          $stuff->update($data);
          Flash::success("Matéria {$stuff->title} atualizada com sucesso!");
          return redirect()->back();
        }
        return view('errors.401', 401);
    }

    public function destroy(Request $request, $id)
    {
        $stuff = Stuff::findOrFail($id);
        $stuff->delete();
        return response('Apagado com sucesso!', 200);
    }
}
