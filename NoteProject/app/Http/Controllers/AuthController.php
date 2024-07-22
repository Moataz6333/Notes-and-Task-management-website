<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    
    public function loginPage(){
        return view('System.login');
    }

    public function login(){
       validator(request()->all(),[
        'email'=>['required','email'],
        'password'=>['required']
       ])->validate();

       if(auth()->attempt(request()->only(['email','password']),
       request()->filled('remember'))){
        return to_route('notes.dashboard');
       }
       return redirect()->back()->withErrors(['email'=>'invaild email'])->withInput();

    }
    public function signUp(){
        return view('System.signIn');
    }
    public function store(Request $request){
      
        $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required', 'unique:users'],
            'password'=>['required','min:8'],

        ]
        );
        

       
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

       return redirect()->route('login')->with('success','User regirtered successfully!');
   
    }
    
}
