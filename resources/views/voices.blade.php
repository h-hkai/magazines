<!DOCTYPE html>
  <head>
    <style>
      #playlist,audio{background:#666;width:800px;padding:20px;} 
      .active a{color:#5DB0E6;text-decoration:none;} 
      li a{color:#eeeedd;background:#333;padding:5px;display:block;} 
      li a:hover{text-decoration:none;} 
    </style>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
  </head>

  <div>
    <audio id="audio" preload="auto" tabindex="0" controls="" type="audio/mpeg" autoplay>
      <source type="audio/mp3" src="">
      Sorry, your browser does not support HTML5 audio.
    </audio>
  </div>
  <div>
    <ul id="playlist">
    @foreach($voices as $voice)
      <li class="active">
        <a href="{{$voice->mp3_path}}">
          {{$voice->name}}
        </a>
      </li>
    @endforeach
    </ul>
  </div>
</html>

<script>
  var audio;
  var playlist;
  var tracks;
  var current;

  init();
  function init() {
    current = 0;
    audio = $('audio');
    playlist = $('#playlist');
    tracks = playlist.find('li a');
    len = tracks.length - 1;
    audio[0].volume = .95;
    playlist.find('a').click(function(e){
      e.preventDefault();
      link = $(this);
      current = link.parent().index();
      // load(audio[0]);
      run(link, audio[0]);
    });
    audio[0].addEventListener('ended',function(e){
      current++;
      if (current == len) {
        current = 0;
        link = playlist.find('a')[0];
      } else {
        link = playlist.find('a')[current];    
      }
      run($(link),audio[0]);
    });
  }
  function run(link, player) {
    player.src = link.attr('href');
    par = link.parent();
    par.addClass('active').siblings().removeClass('active');
    audio[0].load();
    audio[0].play();
  }
  // function load(player) {
  //   for (var i = current; i < len && i < current + 2; ++i) {
  //     link = playlist.find('a')[i];
  //     player.src = link.attr('href');
  //     audio[0].load();
  //   }
  // }
</script>