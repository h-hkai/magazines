@extends('layouts.app')

@section('content')

<div class="row" style="margin: 60px;">
  @foreach($magazines as $magazine)
  <div class="col-sm-3 col-md-3 col-lg-3" style="text-align: center;">
    <a href="{{route('magazines.show', ['id' => $magazine->id])}}">
      <img src={{$magazine->img}} width=60%>
    </a>
    <p>{{$magazine->title_zh}}</p> 
  </div>
  @endforeach
</div>

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