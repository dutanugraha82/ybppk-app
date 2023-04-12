<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){

        // dd($request);
        $credentials = $request->validate([
            'email' => ['required',' email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role == 'superadmin') {
                return redirect('/superadmin/dashboard');
            }
            elseif(auth()->user()->role == 'opt_yayasan') {
                return redirect('/yayasan/dashboard');
            }
            elseif(auth()->user()->role == 'opt_rektorat'){
                return redirect('/rektorat/dashboard');
            }
            elseif(auth()->user()->role == 'bendahara'){
                return redirect('/bendahara/dashboard');
            }
            elseif(auth()->user()->role == 'top_mgmt_yayasan'){
                return redirect('/top-mgmt-yayasan/dashboard');
            }
            elseif(auth()->user()->role == 'top_mgmt_rektorat'){
                return redirect('/top-mgmt-rektorat/dashboard');
            }
            
        }
        return redirect('/');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
