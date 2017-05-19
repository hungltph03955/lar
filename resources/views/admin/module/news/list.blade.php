@extends('admin.master')
@section('title','Danh sách tin tức')
@section('content')
    <table class="list_table">
            <tr class="list_heading">
                <td class="id_col">STT</td>
                <td>Tiêu Đề</td>
                <td>Tác Giả</td>
                <td>Danh Mục</td>
                <td>Thời Gian</td>
                <td class="action_col">Quản lý?</td>
            </tr>
            <?php $stt = 0 ?>
            @foreach($dataNew as $item_dataNew)
            <?php $stt++ ?>
            <tr class="list_data">
                <td class="aligncenter">{{ $stt }}</td>
                <td class="list_td aligncenter">{{ $item_dataNew["title"] }}</td>
                <td class="list_td aligncenter">{{ $item_dataNew["author"] }}</td>
                <td>
                <?php $cate = DB::table('qt64_category')->where('id',$item_dataNew["category_id"])->first(); ?>
                @if(!empty($cate->name))
                    {{ $cate->name }}
                @endif
                </td>
                <td class="list_td aligncenter">
                    <?php \Carbon\Carbon::setLocale('vi')  ?>
                    {{ \Carbon\Carbon::createFromTimestamp(strtotime($item_dataNew["created_at"]))->diffForHumans() }}
                </td>
                <td class="list_td aligncenter">
                    <a href="{{ route('getNewsEdit', ['id' => $item_dataNew["id"] ]) }}"><img src="{!! asset('qt64_admin/templates/images/edit.png') !!}" /></a>&nbsp;&nbsp;&nbsp;

                    
                    <a href="{{ route('getNewsDel', ['id' => $item_dataNew["id"] ]) }}"><img src="{!! asset('qt64_admin/templates/images/delete.png') !!}" /></a>
                </td>
            </tr>
            @endforeach
            
            
        </table>
@endsection