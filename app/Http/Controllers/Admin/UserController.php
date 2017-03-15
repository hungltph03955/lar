<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use DateTime;
use Hash;

class UserController extends Controller
{
   public function getUserAdd () 
   {
   		return view('admin.module.user.add');
   }

   public function postUserAdd (UserAddRequest $request) 
   {
   		$user 					=  new User;
   		$user->username 		= $request->txtUser;
   		$user->password 		= Hash::make($request->txtPas);
   		$user->level 			= $request->rdoLevel;
   		$user->remember_token 	= $request->_token;
        $user->created_at 		= new DateTime();
        $user->save();
        return redirect()->route('getUserList')->with(['flash_level'=>'result_msg','flash_message'=>'Thêm người dùng thành công !!']);
   }

   public function getUserList () 
   {
   		$user = User::select('id','username','level')->get()->toArray();
   		return view('admin.module.user.list',['user'=>$user]);
   }



}
