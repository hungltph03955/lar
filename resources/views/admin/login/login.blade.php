<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="{!! asset('qt64_admin/templates/css/style.css') !!}" />
    <title>Admin Area ::  Đăng nhập </title>
</head>
<body>
<div id="layout">
    <div id="top">
        Admin Area :: Đăng nhập
    </div>
    <div id="menu">
        <table width="100%">
            <tr>
                <td>
                    <a href="">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a>
                </td>
                <td align="right">
                    Xin chào admin | <a href="logout.php">Logout</a>
                </td>
            </tr>
        </table>
    </div>
    <div id="main">
    @include('admin.blocks.error')
        <form action="" method="POST" style="width: 650px; margin: 30px auto;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <legend>Thông Tin Đăng Nhập</legend>                
                <table>
                    <tr>
                        <td class="login_img"></td>
                        <td>
                            <span class="form_label">Username:</span>
                            <span class="form_item">
                                <input type="text" name="txtUser" class="textbox" />
                            </span><br />
                            <span class="form_label">Password:</span>
                            <span class="form_item">
                                <input type="password" name="txtPass" class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                            </span>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div id="bottom">
        Copyright © 2016 by QuocTuan.Info & QHOnline.Edu.Vn 
    </div>
</div>
</body>
</html>