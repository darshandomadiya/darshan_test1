<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
use Hash;

class UserModel extends Model
{
    protected $table = 'users';
     
    public static function insertUserData($request){
       $user = new UserModel;
       $user->name = $request->Name;
       $user->city = $request->City;
       $user->mobile_no  = $request->MobileNo;
       $user->user_name  = $request->UserName;
       $user->email      = $request->Email;
	   $user->password   = Hash::make($request->Password);
       $user->status     = 1;
       $user->created_at = date("Y-m-d");
       
       $user->save();
    }
    
    public static function getUserData(){
        return UserModel::get();
    }
}
