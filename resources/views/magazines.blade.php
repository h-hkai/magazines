@extends('layouts.app')

@section('content')
<b><font color="#1B75D0">学习次数：{{$count}}</font></b>
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
          <p>{{$magazine->pure_download_links}}</p>
          <p>{{$magazine->lanzoup_download_links}}</p>
          <p>{{$magazine->kdocs_download_links}}</p>
        @else
          <p><font color="red">登陆后获取下载链接！</font></p>
        @endif
      </td>
    </tr>
  </table>
</div>
@endforeach
<div>
  {{$magazines->appends(request()->query())->links()}}
</div>

@endsection