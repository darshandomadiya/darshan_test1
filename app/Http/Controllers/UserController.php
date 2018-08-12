<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\UserModel;
use DB;

class UserController extends Controller
{
    public function index(){
        $userData = UserModel::getUserData();
        return view('user.index') ->with('userData',$userData);
    }

    public function create(){
        return view('user.create');
    }
    
    /* For Store User Data */
    public function store(Request $request){
        try{
			$validator = Validator::make($request->all(), [
					'Name' => 'required',
					'City' => 'required',
					'MobileNo' => 'required',
					'UserName' => 'required',
					'Email' => 'required|email|unique:users',
					'Password' => 'required',
				],[
					'Name.required' => 'Name is required',
					'City.required' => 'City is required',
					'MobileNo.required' => 'Mobile No is required',
					'UserName.required' => 'User Name is required',
					'Email.required' => 'Email is required',
					'Email.email' => 'Invalid Email Address',
					'Email.unique' => 'This Email Id Already Exists',
					'Password.required' => 'Password is required',
				]
			);

			if ($validator->fails()) {
				return redirect('user/add')->withErrors($validator, 'register')->withInput();
			}else{
				UserModel::insertUserData($request);
				Session::flash('message', 'User Registered Successfully.'); 
				return redirect('login');
			}
		} catch (Exception $e) {
            Log::error('UserController->store' . $e->getCode());
        }
    } 
}
