<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SearchController extends Controller
{

    private $except = ['id', 'created_at', 'updated_at', 'school_id'];
    private $only = [];
    
    public function index(Request $request, $entity, $search){
        $entity = $this->toCamelCase($entity, true);
        $entity = 'App\\'.rtrim($entity, 's');
        $entity = new $entity();
        $table = $entity->getTable();
        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        $array_search = [];
        $query = $entity->query();
        foreach($columns as $c){
            if(!in_array($c, $this->except)){
                $query = $query->orWhere($c, 'like', '%'.$search.'%');
            }elseif($c == 'school_id'){
                $query = $query->where($c, Auth::user()->school_id);
            }
        }
        //dd($query);
        //dd($array_search);
        return response()->json($query->paginate(5));
    }

    private function toCamelCase($string, $capitalizeFirstCharacter = false) {
        $str = str_replace('-', '', ucwords($string, '-'));
        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }
        return $str;
    }

}
