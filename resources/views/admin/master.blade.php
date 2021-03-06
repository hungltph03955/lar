<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{!! asset('qt64_admin/templates/css/style.css') !!}" />
    <script src="{!! asset('qt64_admin/templates/js/jquery-3.1.1.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('qt64_admin/templates/js/myscript.js') !!}" type="text/javascript"></script>
	<title>Admin Area ::  @yield('title');  </title>
	<script type="text/javascript" src="{!! asset('qt64_admin/templates/js/plugin/ckeditor/ckeditor.js') !!}"></script>
</head>
<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="{{ url("/qho_admin") }}">Trang chính</a> | <a href="{{ route('getUserList') }}">Quản lý user</a> | <a href="{{ route('getCateList') }}">Quản lý danh mục</a> | <a href="{{ route('getNewsList') }}">Quản lý tin</a>
				</td>
				<td align="right">
					Xin chào {{ Auth::user()->username }} | <a href="{{ url('logout') }}">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
    	@include('admin.blocks.error')
    	@include('admin.blocks.flash')
		 @yield('content');  
	</div>
    <div id="bottom">
        Copyright © 2016 by QuocTuan.Info & QHOnline.Edu.Vn 
    </div>
</div>
</body>
</html>