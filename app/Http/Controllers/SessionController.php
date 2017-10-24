<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{   
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function index()
    {
        return view('sessions.login');
    }


    public function create()
    {
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        
        if(! Auth::attempt(request(['email','password']))){

            return back()->withErrors([
                'message' => 'Please Check Credentials!'
            ]);
            
        }else{

            return redirect()->home();

        }
    
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        auth()->logout(); 
        return redirect('login'); 
    }
}
