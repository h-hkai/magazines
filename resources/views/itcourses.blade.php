<!DOCTYPE html>
  <b><font color="#1B75D0">学习次数：{{$count}}</font></b>
  @php($first = true)
  @foreach($courses as $course)
  <div>
    <h1>{{$course->title}}</h1> 
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
            @if($study_code == $passwd)
              <b>下载链接：</b>
              <p>{{$course->download_links}}</p>
              <p>提取码：{{$course->downcodes}}</p>
            @else
              <b>学习码：</b> 
              <form action="{{route('itcourses.get')}}" method="get">
                <input type="text" id="study_code" name="study_code"><br><br>
                <input type="submit" value="Sumit">
              </form>
              @if($study_code != null) <p><font color="red">学习码错误，请联系管理员！</font></p>@endif
            @endif
          </td>
        </tr>
      </table>
    </div>
  </div>
  @endforeach
  <div>
    {{$courses->appends(request()->query())->links()}}
  </div>

</html>