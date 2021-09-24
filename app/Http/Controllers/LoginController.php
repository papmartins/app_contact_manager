<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = "";
        if( $request->get('erro') == 1 ){
            $erro = "User doesn't exists.";
        };
        if( $request->get('erro') == 2 ){
            $erro = "Need login";
        };
        
        return view("login",['title' => 'Login', 'error' => $erro]);
    }
    
    public function authenticate(Request $request){
        // o utilizador criado foi paulo_martins@sapo.pt e password pass1234
        $regras = [
            'email' => 'email:filter',
            'password' => 'required'       
        ];
        
        $request->validate($regras);

        $email = $request->get('email');
        $password = $request->get('password');

        $user = new User;
        $user_finded = $user->where('email', $email)->where('password', $password)->get();

        $user_finded = $user_finded->first();
        
        if(isset($user_finded->name)){
            session_start();
            $_SESSION['name'] = $user_finded->name;
            $_SESSION['email'] = $user_finded->email;
            return redirect()->route('site.index');
        }
        else{
            return redirect()->route('site.login',['error' => 1]);
        }
        // echo "<pre>";
        // print_r($existe);
        // echo "</pre>";

        
    }
    public function exit(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
