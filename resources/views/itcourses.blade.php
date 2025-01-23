@extends('layouts.app')

@section('content')
@foreach($courses as $course)
<div>
  <div>
    <h1>{{$course->title}}</h1> 
  </div>
  <table>
    <tr>
      <td style="vertical-align:top;">
        <img src={{$course->img}} width="600">
      </td>
      <td style="vertical-align:top;">
        <!-- <b>简介：</b>
        <p>{{$course->description}}</p> -->
        <b>更新日期：</b>
        <p>{{$course->update_time}}</p>
        <b>标签：</b>
        <p>{{$course->tags}}</p>
        @if(Auth::check())
          <b>下载链接：</b>
          <p>{{$course->download_links}}</p>
          <p>提取码：{{$course->downcodes}}</p>
        @else
          <p><font color="red">登陆后获取下载链接！</font></p>
        @endif
      </td>
    </tr>
  </table>
</div>
@endforeach
<div>
  {{$courses->appends(request()->query())->links()}}
</div>

<b><font color="#1B75D0">学习次数：{{$count}}</font></b>
@endsection