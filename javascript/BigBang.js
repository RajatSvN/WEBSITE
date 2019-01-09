$(".dot").click(function(){

   	$(this).css("box-shadow","0 0 0 30px rgba(255,92,51,.1),0 0 0 60px rgba(255,92,51,.1),0 0 0 120px rgba(255,92,51,.1),0 0 0 240px rgba(255,92,51,.1),0 0 0 480px rgba(255,92,51,.1),0 0 0 960px rgba(255,92,51,.1)");

   })

	setTimeout(function(){$(".dot").trigger("click")},950);