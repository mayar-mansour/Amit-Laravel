<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Catgeory;
use Illuminate\Http\Request;

class categoryApi extends Controller
{
    public function index()
    {
        $categories = Catgeory::all();
        return response()->json([
            "status"=>200,
            "data"=>$categories
        ]);
    }

    public function show($id)
    {
       $category =  Catgeory::find($id);
       if(is_object($category)){
        return response()->json([
            "status"=>200,
            "data"=>$category
          ]);
       }
       return response()->json([
        "status"=>404,
        "data"=>[]
      ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|min:2|max:20"
        ]);
        $res =  Catgeory::create($request->all());
        if($res){
            return response()->json([
                "status"=>201,
                "data"=>[],
                "msg"=>"category created"
              ]);
        }
    }

    public function update(Request $request)
    {
        $data =  Catgeory::find($request->id);
        $data->name = $request->name;
        $data->update();
        return response()->json([
            "status"=>201,
            "data"=>[],
            "msg"=>"category update"
          ]);
    }

    public function delete(Request $request)
    {
        $data =  Catgeory::destroy($request->id);

        return response()->json([
            "status"=>201,
            "data"=>[],
            "msg"=>"category deleted"
          ]);
    }

}
