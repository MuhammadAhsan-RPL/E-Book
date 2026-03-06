<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index(){
        $books = Books::all();
        return view('user.index', compact('books'));
        
    }

     public function login(){
            return view('auth.login');
        }

        public function register(){
            return view('auth.register');
        }


        public function dashboard(){
            return view('index');
        }

        public function actionlogin(Request $request){
            $login = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(!$login){
                return redirect()->back()->with('success', 'Login Berhasil');
            }

            if(Auth::attempt($login)){
                if(Auth::user()->role == 'admin'){
                    return redirect()->route('dashboard')->with('success', 'Berhasil login sebagai admin');
                }
                return redirect()->route('home')->with('success', 'Berhasil login sebagai user');
            }
            return redirect()->route('home')->with('error', 'Email atau password salah');
        }

        public function logout(){
            Auth::logout();
            return redirect()->route('home')->with('success', 'Logout Berhasil');
        }

        public function actionRegister(Request $request){
            $validation = $request->validate([
                "username" => 'requirred',
                'email'=> 'required|unique:users,email',
                'passworld'=> "required|min:5"
            ]);
        
            if(!$validation){
                return redirect()->back()->with('eror');
            }

            User::create([
                "name" => $request->username,
                "email"=> $request->email,
                "passworld" => $request->passworld,
                "role" => "user"
            ]);

            return redirect()->rouet('auth.login')->with('berhasil');
        }
}
