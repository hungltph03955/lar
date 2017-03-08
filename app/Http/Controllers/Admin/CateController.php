<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;

class CateController extends Controller
{
	public function getCatetAdd() 
	{
		return view('admin.module.category.add');
	}

	public function postCatetAdd(CateAddRequest $request) 
	{

	}
}
