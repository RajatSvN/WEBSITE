var navHeight = $("#botnav").height();
      

      $("#semicircle").css("height",navHeight*2);
      $("#semicircle").css("width",navHeight*2);
      $("#semicircle").css("margin-left",($(window).width()-$("#semicircle").width())/2);
      


      $(window).resize(function(){

        $("#semicircle").css("margin-left",($(window).width()-$("#semicircle").width())/2);

      })

      $("#semicircle").mouseenter(function() {

        $(this).css("animation-name","alpha");
        $(this).css("animation-duration","1s");
        $(this).css("background-size","90px");

      })

      $("#semicircle").mouseleave(function() {

        $(this).css("animation-name","revalpha");
        $(this).css("animation-duration","1s");
        $(this).css("background-size","80px");

      })

      $(".icon").mouseenter(function(){

        $(this).addClass("bounce");

      })

      $(".icon").mouseleave(function(){

        $(this).removeClass("bounce");

      })