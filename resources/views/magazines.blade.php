@extends('layouts.app')

@section('content')
@foreach($magazines as $magazine)
<div>
  <h1>{{$magazine->title_zh}}</h1> 
  <img src={{$magazine->img}}>
  <div>
    <b>简介：</b>
    <p>{{$magazine->description}}</p>
    <b>更新日期：</b>
    <p>{{$magazine->update_time}}</p>
    <b>标签：</b>
    <p>{{$magazine->tags}}</p>
    @if(Auth::check())
      <b>下载链接：</b>
      <p>{{substr($magazine->pure_download_links, 2, -2)}}</p>
      <p>{{substr($magazine->lanzoup_download_links, 2, -2)}}</p>
      <p>{{substr($magazine->kdocs_download_links, 2, -2)}}</p>
    @else
      <p><font color="red">登陆后获取下载链接！</font></p>
    @endif
  </div>
</div>
@endforeach
<div>
  {{$magazines->appends(request()->query())->links()}}
</div>

<b><font color="#1B75D0">学习次数：{{$count}}</font></b>
@endsection