<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/create form
    public function create(){
        return view('users.register');
    }

    //store or create new user
    public function store(Request $request){
        $formFields= $request->validate([
           'name' => ['required','min:3'],
           'email' =>['required','email', Rule::unique('users','email')],
           'password' => ['required', 'confirmed','min:6' ]
        ]);

        //hash password
        $formFields['password'] =  bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message','user created and logged in succesfully!');

    }
     
    //logout
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'you have been logged out');
    }

    //show login foem
    public function login(){
        return view('users.login');
    }

    //authenticate user 
    public function authenticate(Request $request){
          $formFields= $request->validate([
           'email' =>['required','email'],
           'password' => ['required']
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Your successfully login');
        }
        return back()->witherrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
}
