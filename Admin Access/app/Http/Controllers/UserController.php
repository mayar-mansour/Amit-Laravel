<?php

namespace App\Http\Controllers;



use App\Models\Catgeory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function index()
    {
        return view('users.create_user');
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|unique:users',
            'email' => 'required|max:30|unique:users|email',
            'password' => 'required',
        ]);

        // post create for each input ,then stored into input variable and request all
        $user = $request->all();
        //  dd($request->name);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        //  $user->access = $request->access;

        $users = User::first();
        if (is_null($users)) {
            $user->access = $request->access ?? '1';
        } else {
            $user->access = $request->access ?? '0';
        }
        $user->password = bcrypt($request->password);
        $user->token = Str::random(30);
        $user->save();
        return redirect('view')->with(
            'success',
            'user added successfully.',
            compact('user')
        );
    }
    public function view(Request $request)
    {
        $user = new User();
        $users = $user->get();
        // dd( $category->get('name'));
        return view('users.index', compact('users'));
    }
    public function editUser($id)
    {
        $users = User::find($id);
        return view('users.edit_user', compact('users'));
    }
    public function updateUser(Request $request)
    {
        $users = User::find($request->id);
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        // $users->access = $request->get('access');

        $user = User::first();
        if (is_null($user)) {
            $users->access = $request->access ?? '1';
        } else {
            $users->access = $request->access ?? '0';
        }
        // $users->password = Hash::make($request['password']);
        // $users->token = Str::random($request['token']);
        $users->update();
        return view('users.edit_user', compact('users'))->with('sucess', 'category updated successfully.');;
    }
    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('view')->with('success', 'Cat removed.'); // -> resources/views/stocks/index.blade.php
    }
    public function displayUser($id)
    {
        $users = User::find($id);
        return view('users.display_user', compact('users'));
    }

}
