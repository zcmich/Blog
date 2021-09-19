<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store(){
//        @ddd('login store');
        $attributes = request( )->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'PROVIDED CREDENTIALS COULD NOT BE VERIFIED'
            ]);
        }

//        return  back()
//            ->withInput()
//            ->withErrors(['email' => 'PROVIDED CREDENTIALS COULD NOT BE VERIFIED']);
        session()->regenerate(); //to avoid session fixation
        return redirect('/')->with('success','welcome back');

    }

    public function destroy(){
        //ddd("user logout");
        auth()->logout();
        return redirect('/')->with('success','Bye-Bye');
    }
}
