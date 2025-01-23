@extends('layouts.app')

@section('content')
@foreach($magazines as $magazine)
<div>
  <h1>{{$magazine->title_zh}}</h1> 
  <table>
    <tr>
      <td style="vertical-align:top;">
        <img src={{$magazine->img}}>
      </td>
      <td style="vertical-align:top;">
        <b>简介：</b>
        <p>{{$magazine->description}}</p>
        <b>更新日期：</b>
        <p>{{$magazine->update_time}}</p>
        <b>标签：</b>
        <p>{{$magazine->tags}}</p>
        @if(Auth::check())
          <b>下载链接：</b>
          
          <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->pure_download_links, 2, -2)}}">百度网盘</button>
          &nbsp
          <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->lanzoup_download_links, 2, -2)}}">蓝奏云</button>
          &nbsp
          <button type="button" class="redirectToUrl" data-redirect-url="{{substr($magazine->kdocs_download_links, 2, -2)}}">在线阅读</button>

        @else
          <p><font color="red">登陆后获取下载链接！</font></p>
        @endif
      </td>
    </tr>
  </table>
</div>
@endforeach

<b><font color="#1B75D0">学习次数：{{$count}}</font></b>

<div>
  {{$magazines->appends(request()->query())->links()}}
</div>

<script src="js/jquery-3.7.1.min.js"></script>
<script>
  $(document).on('click', '.redirectToUrl', function() {
    $.get("{{route('magazines.count')}}");
    let getRedirectUrl = $(this).attr('data-redirect-url');
    console.log("Multiple", "arguments", "here");
    window.location.href= getRedirectUrl;
  });
</script>
@endsection