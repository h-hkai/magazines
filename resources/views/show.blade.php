@extends('layouts.app')

@section('content')

<div class="row" style="margin: 60px;">
  <div>
    <h1>{{$magazine->title_zh}}</h1> 

    <div class="image" style="text-align: center;">
      <img src={{$magazine->img}} width=60%>
    </div>
    <br>
    <b>简介：</b>
    <p>{{$magazine->description}}</p>
    <b>更新日期：</b>
    <p>{{$magazine->update_time}}</p>
    <b>标签：</b>
    <p>{{$magazine->tags}}</p>
    @if(Auth::check())
      <b>下载链接：</b>
      <br>
      <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->pure_download_links, 2, -2)}}">百度网盘</button>
      <br>
      <br>
      <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->lanzoup_download_links, 2, -2)}}">蓝奏云</button>
      <br>
      <br>
      <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->kdocs_download_links, 2, -2)}}">在线阅读</button>

    @else
      <p><font color="red">登陆后获取下载链接！</font></p>
    @endif

  </div>
</div>

<script src="../js/jquery-3.7.1.min.js"></script>
<script>
  $(document).on('click', '.redirectToUrl', function() {
    $.get("{{route('magazines.count')}}");
    let getRedirectUrl = $(this).attr('data-redirect-url');
    console.log("Multiple", "arguments", "here");
    window.open(getRedirectUrl, "_blank");
  });
</script>
@endsection