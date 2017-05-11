<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getNewsList()
    {

    }


     public function getNewsAdd()
    {
    	return view('admin.module.news.add');
    }


    public function postNewsAdd(NewsAddRequest $request)
    {
    	echo "1111";
    }
}
