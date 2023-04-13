
$(document).ready(function () {
    $("#jquery_jplayer_1").jPlayer({
      ready: function () {
        $(this).jPlayer("setMedia", {
          mp3: "http://example.com/mysong.mp3",
        });
      },
      swfPath: "https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/",
      supplied: "mp3",
      wmode: "window",
      useStateClassSkin: true,
      autoBlur: false,
      smoothPlayBar: true,
      keyEnabled: true,
      remainingDuration: true,
      toggleDuration: true,
    });
  });
  