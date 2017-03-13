<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;

class UserController extends Controller
{
   public function getUserList () 
   {
   		return view('admin.module.user.list');
   }

   public function getUserAdd () 
   {
   		return view('admin.module.user.add');
   }

   public function postUserAdd (UserAddRequest $request) 
   {

   }


}
