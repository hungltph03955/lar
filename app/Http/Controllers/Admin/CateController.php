<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateAddRequest;
use App\Models\Cate;
use DateTime;

class CateController extends Controller
{
	public function getCateAdd() 
	{
		$nameCategory = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.module.category.add',['dataCate' => $nameCategory ]);
	}

	public function postCateAdd(CateAddRequest $request) 
	{
		$cate 				= new Cate;
        $cate->name 		= $request->txtCateName;
        $cate->slug 		= str_slug($request->txtCateName,'-');
        $cate->parent_id 	= $request->sltCate;
        $cate->created_at 	= new DateTime();
        $cate->save();

        return redirect()->route('getCateList')->with(['flash_level' =>'result_msg','flash_message' => 'Thêm danh mục thành công !!']);
	}

	public function getCateList () 
	{
		$nameCategory = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.module.category.list',['data' => $nameCategory ]);
	}

}
