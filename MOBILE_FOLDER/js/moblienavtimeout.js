setTimeout(function () {
var timeout1 = document.querySelector('.timeout');
timeout1.classList.add('timeout2');
},2300);

var x=0;


document.addEventListener('scroll',function () {
    var timeout1 = document.querySelector('.timeout');
    if(window.scrollY>=x)
    {
        timeout1.classList.remove('timeout2');
    }
    else
    {
        timeout1.classList.add('timeout2');
    }
    x=window.scrollY;
    });

var login = document.querySelector('.login');
var login1 = document.querySelector('.login1');
var login2 = document.querySelector('.login2');
var p1 = document.querySelector('.p1');
var p2 = document.querySelector('.p2');
login.addEventListener('click',function () {
    console.log('ada');
    login2.classList.toggle('login1add');
    login1.classList.toggle('login1add');
    p2.classList.toggle('padd');
    p1.classList.toggle('padd');
    login.classList.toggle('loginadd');
});

var w = $(window).width();
var h = $(window).height();

$(".logodiv").css("margin-left",w/2 - 100)
$(".countdown").css("margin-left",w/4)
$(".logodiv").css("margin-top",h/2-100)

$(window).resize(function(){
    var w1 = $(window).width();
var h1 = $(window).height();
    $(".logodiv").css("margin-left",w1/2 - 100)
    $(".logodiv").css("margin-top",h1/2-100) 
})