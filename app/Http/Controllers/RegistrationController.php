<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('sessions.create');
    }

   
    public function create( )
    {
        $this->validate(request(),[
            'name' => 'required|min:2',
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:6'
    

        ]);
        
        if(User::where('email', request('email'))->first()){
        
            return back()->withErrors([
                'message' => 'User Already Exist!'
            ]);
          
        }else{

            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password'))   
                ]);

            
            auth()->login($user);

            \Mail::to($user)->send(new Welcome($user));
            
           
            
            session()->flash('message','Wellcome to '.config('app.name').', Check You mail inbox to Confrm your Email');
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

    
    public function destroy($id)
    {
        //
    }
}
