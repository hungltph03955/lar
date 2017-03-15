@extends('admin.master')
@section('title','Danh sách người dùng')
@section('content')
<table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Username</td>
                <td>Level</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            @foreach($user as $item_user)
            <tr class="list_data">
                <td class="aligncenter">1</td>
                <td class="list_td aligncenter">{{ $item_user["username"] }}</td>

                <td class="list_td aligncenter">
                    @if($item_user["id"] == 1)
                        <span style="color: red; font-weight: bold;">Super Admin</span>
                    @elseif($item_user["level"] == 1)
                        <span style="color: blue; font-weight: bold;">Admin</span>
                    @else
                        <span style="color: black;">Member</span>
                    @endif
                </td>
                <td class="list_td aligncenter">
                     <a href=""><img src="{!! asset('qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{!! asset('qt64_admin/templates/images/delete.png') !!}" /></a>
                </td>
            </tr>
            @endforeach
        </table>
@endsection