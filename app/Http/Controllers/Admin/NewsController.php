<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Requests\NewsEditRequest;
use App\Http\Controllers\Controller;
use App\Models\Cate;
use App\Models\News;
use App\Models\User;
use DateTime,File;
use Auth;

class NewsController extends Controller
{
    public function getNewsList()
    {
    	$news = News::select('id','title','author','created_at','category_id')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.module.news.list',['dataNew' => $news]);
    }


    public function getNewsAdd()
    {
    	$Cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.news.add',['dataCate' => $Cate ]);
    }


    public function postNewsAdd(NewsAddRequest $request)
    {
    	$news 				= new News;
    	$file 				= $request->file('newsImg');
    	$news->title 		= $request->txtTitle;
    	$news->alias 		= str_slug($request->txtTitle,'-');
    	$news->author 		= $request->txtAuthor;
    	$news->intro 		= $request->txtIntro;
    	$news->full 		= $request->txtFull;
    	$news->status 		= $request->rdoPublic;
    	$news->category_id 	= $request->sltCate;
    	$news->user_id = Auth::user()->id;
    	$news->created_at 	= new DateTime();
    	if(strlen($file) > 0)
    	{
			$filename  = time() . '.' . $file->getClientOriginalName();
			$destinationPath = 'public\uploads\news';
			$file->move($destinationPath,$filename);
			$news->image 		= $filename;
    	}
    	$news->save();
    	return redirect()->route('getNewsList')->with(['flash_level' =>'result_msg','flash_message' => 'Thêm Tin Tức Thành Công !!']);
    }


    public function getNewsDel($id)
    {
    	 $news = News::findOrFail($id);
    	 $filename = 'public/uploads/news/'.$news->image;
    	 if (File::exists($filename)) {
		    File::delete($filename);
		}
		$news->delete($id);
		return redirect()->route('getNewsList')->with(['flash_level' =>'result_msg','flash_message' => ' Xóa Tin Tức Thành Công !!']);
    }

    public function getNewsEdit($id)
    {
    	$news = News::findOrFail($id);
    	$Cate = Cate::select('id','name','parent_id')->get()->toArray();
    	return view('admin.module.news.edit',['data_news'=>$news,'data_Cate'=>$Cate]);
    }

    
    public function postNewsEdit(NewsEditRequest $request,$id)
    {
    	$news = News::findOrFail($id);
		$file 				= $request->file('newsImg');
		$news->title 		= $request->txtTitle;
		$news->alias 		= str_slug($request->txtTitle,'-');
		$news->author 		= $request->txtAuthor;
		$news->intro 		= $request->txtIntro;
		$news->full 		= $request->txtFull;
		$news->status 		= $request->rdoPublic;
		$news->category_id 	= $request->sltCate;
		$news->user_id = Auth::user()->id;
		$news->created_at 	= new DateTime();
		if(strlen($file) > 0)
		{
		$fImageCurrent = $request->fImageCurrent;
		$fImageCurrentFoder = 'public/uploads/news/'.$fImageCurrent;
    	if (File::exists($fImageCurrentFoder)) {
		    File::delete($fImageCurrentFoder);
		}
		$filename  = time() . '.' . $file->getClientOriginalName();
		$destinationPath = 'public\uploads\news';
		$file->move($destinationPath,$filename);
		$news->image 		= $filename;
		}
		$news->save();
		return redirect()->route('getNewsList')->with(['flash_level' =>'result_msg','flash_message' => 'Sửa Tin Tức Thành Công !!']);
    }

}
