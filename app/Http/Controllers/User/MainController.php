<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Cate;

class MainController extends Controller
{
   public function getIndex() 
   {
   	$news = News::select('id','title','alias','author','created_at','category_id','image','intro')->with('cate')->orderBy('id','DESC')->limit(10)->get()->toArray();
   	return view('user.pages.index',['news' => $news]);
   }

   public function getCate($id) 
   {
   	$cate = Cate::select('name')->where('id',$id)->first()->toArray(); 
   	$news = News::select('id','title','alias','author','created_at','category_id','image','intro')->with('cate')->orderBy('id','DESC')->where('category_id',$id)->limit(10)->get()->toArray();
   	return view('user.pages.cate',['cate'=>$cate,'news'=>$news]);
   }

   public function getDetail($id) 
   {
   	$news = News::select('id','title','alias','author','full','created_at','category_id','image','intro')->with('cate')->orderBy('id','DESC')->where('id',$id)->first()->toArray();
   	return view('user.pages.detail',['news' => $news]);
   }


}
