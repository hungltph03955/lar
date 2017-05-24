<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
   public function getIndex() 
   {
   	return view('user.pages.index');
   }

   public function getCate() 
   {
   	return view('user.pages.cate');
   }

   public function getDetail() 
   {
   	return view('user.pages.detail');
   }


}
