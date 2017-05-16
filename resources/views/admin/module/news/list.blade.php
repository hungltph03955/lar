@extends('admin.master')
@section('title','Danh sách tin tức')
@section('content')
    <table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Tiêu Đề</td>
                <td>Tác Giả</td>
                <td>Thời Gian</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            @foreach($dataNew as $item_dataNew)
            <tr class="list_data">
                <td class="aligncenter">1</td>
                <td class="list_td aligncenter">{{ $item_dataNew["title"] }}</td>
                <td class="list_td aligncenter">{{ $item_dataNew["author"] }}</td>
                <td class="list_td aligncenter">{{ $item_dataNew["created_at"] }}</td>
                <td class="list_td aligncenter">
                    <a href="{{ route('getNewsEdit', ['id' => $item_dataNew["id"] ]) }}"><img src="{!! asset('qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;

                    
                    <a href="{{ route('getNewsDel', ['id' => $item_dataNew["id"] ]) }}"><img src="{!! asset('qt64_admin/templates/images/delete.png') !!}" /></a>
                </td>
            </tr>
            @endforeach
            
            
        </table>
@endsection