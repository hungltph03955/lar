@extends('user.master')
@section('title','Trang Chi Tiết tin')
@section('content')
<h1>{{ $news["title"] }}</h1>
                    <img src="{{ asset('/public/uploads/news/'.$news['image']) }}" class="thumbs" />
                    <p>
                        <i><b>Danh mục</b>: <a href="">{{ $news['cate']['name'] }}</a><br />
                        <b>Viết bởi</b>: {{ $news["author"] }}<br />
                        <b>Ngày viết</b>: {{ $news["created_at"] }}</i>
                    </p>
                    <p>
                        {!! $news["intro"] !!}
                    </p>
                    <p>
                        {!! $news["full"] !!}
                    </p>
@stop