<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
      return view('auth.login');
    }
  
   public function login(Request $request){
        $this->validateLogin($request);        
 
        if (Auth::attempt(['nombre' => $request->nombre,'password' => $request->password,'status'=>1])){
            return redirect()->route('main');
        }
 
        //return back()
        //->withErrors(['nombre' => trans('auth.failed')])
        //->withInput(request(['nombre']));
        return redirect()->route('main');
 
    }
 
    protected function validateLogin(Request $request){
        $this->validate($request,[
            //'nombre' => 'required|string',
            'password' => 'required|string'
        ]);
 
    }
 
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
