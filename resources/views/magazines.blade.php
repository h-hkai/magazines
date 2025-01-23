@extends('layouts.app')

@section('content')
<b><font color="#1B75D0">学习次数：{{$count}}</font></b>
<!-- @php($first = true) -->
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
          <!-- @if($first)
            @php($first = false)
            <b>MP3：</b><a href="http://122.51.101.83:81/voices" class="button">Listen</a>
          @endif -->
        @else
          <!-- <b>学习码：</b> 
          <form action="{{route('magazines.get')}}" method="get">
            <input type="text" id="study_code" name="study_code"><br><br>
            <input type="submit" value="Sumit">
          </form>
          @if($study_code != null) <p><font color="red">学习码错误，请联系管理员！</font></p>@endif -->
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