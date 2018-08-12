<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\SecurityModel;
use Auth;
use Input;
use Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('security.login');
    }
    
    public function postLogin(Request $request){
        try {   
			$validator = Validator::make($request->all(), [
					'email' => 'required|email',
					'password' => 'required',
				],[
					'email.required' => 'Email is required',
					'email.email' => 'Invalid Email',
					'password.required' => 'Password is required'
				]
			);

			if ($validator->fails()) {
				return redirect('login')->withErrors($validator)->withInput();
			}else{
				$userdata = array(
					'email'     => Input::get('email'),
					'password'  => Input::get('password')
				);

				if (Auth::attempt($userdata)) {
					Session()->put('userlogin', '1');
					Session()->put('userDatas', Auth::user());
					Session()->put('userId', Auth::user()->id);
					Session()->put('userName', Auth::user()->user_name);
					return redirect('blog');

				} else {        

					$errorMsg = 'Invalid Email and Password';
					return redirect('login')->withErrors($errorMsg)->withInput(); 
				}
			}
		} catch (Exception $e) {
            Log::error('LoginController->postLogin' . $e->getCode());
        }
    }
	
	public function logout(Request $request) {
        try {  
            Auth::logout(); 
            Session::flush();
            return redirect('/');
        } catch (Exception $e) {
            Log::error('LoginController->logout' . $e->getCode());
        }
    } 
}
