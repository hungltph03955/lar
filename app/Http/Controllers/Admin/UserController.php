<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use DateTime;
use Hash;
use Auth;

class UserController extends Controller
{
public function getUserList () 
   {
   		$user = User::select('id','username','level')->get()->toArray();
   		return view('admin.module.user.list',['user'=>$user]);
   }
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

   public function getUserDel($id) 
   {
   		$user_current_login = Auth::user()->id;
   		$user_delete = User::findOrFail($id);
   		if ($id == 1 || ($user_current_login != 1 && $user_delete["level"] == 1)) 
   		{
   			return redirect()->route('getUserList')->with(['flash_level'=>'error_msg','flash_message'=>'Bạn không có quyền xóa !!!']);
   		}else
   		{
   			$user_delete->delete($id);
   			return redirect()->route('getUserList')->with(['flash_level'=>'result_msg','flash_message'=>'Xóa thành công !!!']);
   		}
   }

   public function getUserEdit($id) 
   {
      $data = User::findOrFail($id);
      if ((Auth::user()->id != 1) && ($id = 1 && $data['level'] == 1 && Auth::user()->id != $id)) 
      {
        return redirect()->route('getUserList')->with(['flash_level'=>'error_msg','flash_message'=>'Bạn không có quyền sửa thành viên này !!!']);
      }
      return view('admin.module.user.edit',['data'=>$data]);
   }
   public function postUserEdit($id) 
   {
      
   }



}
