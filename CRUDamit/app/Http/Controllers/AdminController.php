<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Catgeory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'email' => 'unique:admins,email',
            'name' => 'unique:admins',
        ]);
        $user = $request->all();
        //  dd($request->name);
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->access = $request->access;
        // dd($request->access);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginRequest(Request $request)
    {
         $category = new Catgeory();
        $categories = $category->get();
       $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       if(Auth::attempt($request->except("_token"))){
            // success
            return view('categories.index', compact('categories'));
        }
        return view("login");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
