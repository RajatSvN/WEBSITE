var left = ($(window).width() - $("#main").width())/2;

        $("#main").css("margin-left",left);

        $(window).resize(function(){

        var left = ($(window).width() - $("#main").width())/2;

        $("#main").css("margin-left",left);


        })

        $(".imgContainer").mouseenter(function(){

          $(this).addClass("shadow-lg");


        })

        $(".imgContainer").mouseleave(function(){

          $(this).removeClass("shadow-lg");

        })