<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    public function index()
    {
        $data = DB::table('employees')->get();
        return view('index', ['data' => $data]);
        // return view('index');
    }
    public function store(Request $request)
    {

        DB::table('employees')->insert([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // dd( $request->email);


        return redirect('/');
    }
    public function destroy(Request $datas)
    {
        $id = $datas->id;
        DB::table('employees')
            ->where('id', $id)
            ->delete();
        return redirect('/');
    }
    public function edit($id)
    {
        //  $data = DB::table('users')->get();
        $data = DB::table('employees')->find($id);
        // dd($data);
        return view('edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        //   $data = DB::table('employees')->get();
        //  dd($request->id);
         $id = $request->id;
        //  dd($id);
        DB::table('employees')->where('id', $id)->update([
            "email"=>$request->email,
            "password"=>$request->password
        ]);
        // dd(DB::table('employees'));
        return redirect('/');
    }
    //     public function update(Request $request, Datas $datas)
    //     {
    //         $request->validate([
    //             'email' => 'required',
    //             'password' => 'required',
    //         ]);

    //         $datas->fill($request->post())->save();

    //         return redirect("index")->with('success','Company Has Been updated successfully');
    //     }

    // request to update category

}
