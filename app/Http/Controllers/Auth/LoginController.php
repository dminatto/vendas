<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests; 

use Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
   
    public function index(){

        return view('home');
    }

    public function login(){

        return view('auth.login');
    }

    public function authenticate() { 

        $credenciais = Request::only('email', 'password');
        
        if(Auth::attempt($credenciais, true)) {
            
            $user = Auth::user();
            
            Auth::login($user);

            return redirect() -> action('Auth\LoginController@index');
         }
         
         return redirect() -> action('Auth\LoginController@login');

    }

    public function logout() { 

       if (Auth::check()) {
        Auth::logout();
       }
       
       return redirect() -> action('Auth\LoginController@login');
    }
}