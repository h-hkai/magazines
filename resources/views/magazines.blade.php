@extends('layouts.app')

@section('content')

<div class="row" style="margin: 60px;">
  @foreach($magazines as $magazine)
  <div class="col-sm-3 col-md-3 col-lg-3" style="text-align: center;">
    <a href="{{route('magazines.show', ['id' => $magazine->id])}}">
      <img src={{$magazine->img}} width=60%>
    </a>
    <a href="{{route('magazines.show', ['id' => $magazine->id])}}">
      <p>{{$magazine->title_zh}}</p> 
    </a>
  </div>
  @endforeach
</div>

<b><font color="#1B75D0">学习次数：{{$count}}</font></b>

<div>
  {{$magazines->appends(request()->query())->links()}}
</div>

@endsection