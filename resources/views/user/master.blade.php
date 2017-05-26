<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href=" {!! asset('user/templates/css/style.css') !!}" />
    <title> @yield('title')</title>
</head>
<body>
    <div id="layout">
        <div id="top">
            Banner
        </div>
        <div id="topmenu">
            <ul>
                <li><a href="/">Trang Chủ</a></li>
                <?php
                    $cate = App\Models\Cate::select('id','name','slug','parent_id')->get()->toArray();   
                ?>
                @foreach($cate as $item)
                @if($item['parent_id'] == 0)
                    <li><a href="{{ URL('the-loai/'.$item['id'].'/' .$item['slug'].'.html') }}">{{ $item['name'] }}</a>
                        <?php 
                            subMenu($cate,$item["id"]);
                        ?>
                    </li>
                @endif
                @endforeach
            </ul>
        </div>
        <div id="content">
            <div id="left">
                <div id="leftmenu">
                    <h1>
                        Menu Chính
                    </h1>
                    <ul>
                        <li><a href="/">Trang Chủ</a></li>
                        <?php
                            $cate = App\Models\Cate::select('id','name','slug','parent_id')->get()->toArray();   
                        ?>
                        @foreach($cate as $item)
                        @if($item['parent_id'] == 0)
                            <li><a href="{{ URL('the-loai/'.$item['id'].'/' .$item['slug'].'.html') }}">{{ $item['name'] }}</a>
                                <?php 
                                    subMenu($cate,$item["id"]);
                                ?>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="main">
				 @yield('content')         
			</div>
            <div class="clearfix"></div>
        </div>
        <div id="bottom">
            Copyright &copy; 2016 by QuocTuan.Info & QHOnline.Edu.Vn
        </div>
    </div>
</body>
</html>