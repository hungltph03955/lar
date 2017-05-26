@extends('user.master')
@section('title','Trang Thể Loại Tin')
@section('content')
<h1 style="margin-bottom:10px;color:red">Thể Loại : {{ $cate["name"] }}</h1>


@foreach($news as $item_news)
<div class="news">
    <h1>{{ $item_news['title'] }}</h1>
    <img src="{{ asset('/public/uploads/news/'.$item_news['image']) }}" />
    <p>{!! $item_news['intro'] !!}</p>
    <a href="{{ URL('chi-tiet-tin/'.$item_news['id'].'/' .$item_news['alias'].'.html') }}" class="readmore">Đọc thêm</a>
    <h3>Thể Loại : {{ $item_news['cate']['name'] }}</h3>
    <div class="clearfix"></div>
</div>
@endforeach

@stop            