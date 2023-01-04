<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Catgeory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = $request->all();
        //  dd($request->name);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // dd($user->access == null);
        // if ($user->access == null) {
        //     $user->access = '1';
        // } else {
        //     $user->access = $request->access;
        // }
        // dd($request->access);
        $user->password = bcrypt($request->password);
        $user->token = Str::random(30);

        // $users = User::all();

        $users = User::first();
        if (is_null($users)) {
            $user->access = $request->access ?? '1';
        } else {
            $user->access = $request->access ?? '0';
        }
        $user->save();

        return redirect('login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginRequest(Request $request)
    {
        $user = new User();
        $users = $user->get();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->except('_token'))) {
            // success
            return view('users.index', compact('users'));
        }
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
