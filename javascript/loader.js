var xmlns = "http://www.w3.org/2000/svg",
  select = function(s) {
    return document.querySelector(s);
  },
  selectAll = function(s) {
    return document.querySelectorAll(s);
  },
  container = select('.container'),
  popGroup = selectAll('#popGroup line'),
    stage0Path = select('#stage0').getAttribute('d')

//CubicBezier.create("evolEase",0.99, 0, 0.71, 1)
CubicBezier.create("evolEase",0.96, 0.03, 0.14, 0.74)
  
//center the container cos it's pretty an' that
TweenMax.set(container, {
  position: 'absolute',
  top: '50%',
  left: '50%',
  xPercent: -50,
  yPercent: -50
})

TweenMax.set(popGroup, {
 
  drawSVG:'0% 0%',
  alpha:0
})
TweenMax.set('#popGroup', {
 x:-105,
  y:230,
  transformOrigin:'50% 50%',
  scale:0.8
})

TweenMax.set('svg', {
  visibility:'visible'
})


var tl = new TimelineMax({delay:2, repeat:-1, yoyo:false, repeatDelay:2});
tl.to('#stage0', 2, {
  morphSVG:{shape:'#stage1'},
  ease:CubicBezier.get("evolEase")
})
.to('#stage0', 2, {
  morphSVG:{shape:'#stage2'},
  ease:CubicBezier.get("evolEase")
})
.to('#stage0', 2, {
  morphSVG:{shape:'#stage3'},
  ease:CubicBezier.get("evolEase")
})
.to('#stage0', 2, {
  morphSVG:{shape:'#stage4', shapeIndex:'auto'},
  ease:CubicBezier.get("evolEase")
})
.to('#stage0', 2, {
  morphSVG:{shape:'#stage5'},
  ease:CubicBezier.get("evolEase")
})
/*  .to('#stage0', 2, {
  morphSVG:{shape:'#stage2'},
  ease:CubicBezier.get("evolEase"),
  delay:0
})*/
 .to('#stage0', 2, {
  morphSVG:{shape:'#stage6'},
  ease:CubicBezier.get("evolEase"),
  delay:0
})

.from('#table', 1, {
  scaleX:0,
  //y:10,
  transformOrigin:'50% 100%'
},'-=1')
.from('#laptopBase',1, {
  scaleX:0,
  transformOrigin:'100% 0%'
},'-=1')
.set('#laptopLid', {
  alpha:1
})
.from('#laptopLid', 1, {
  rotation:-90,
  transformOrigin:'16% 100%',
  ease:Elastic.easeOut.config(2, 0.8)
})

.addCallback(pop, '-=0.5')
.to('#theGroup', 1, {
  //morphSVG:{shape:'#capitalR'},
  x:-6,
  delay:0.5,
  ease:Anticipate.easeIn
},'-=1.5')

.to('#evolutionGroup', 1, {
  x:26,
  ease:Anticipate.easeInOut
},'-=1')

.to('#dGroup', 1, {
  alpha:1//,
  //fill:'#88CE02'
},'-=1')

.to('#laptopLid', 1, {
  rotation:-90,
  transformOrigin:'16% 100%',
  ease:Power2.easeIn,
  delay:4
})
.set('#laptopLid', {
  alpha:0
},'-=0')

.to('#laptopBase',0.5, {
  scaleX:0
})
.to('#table', 0.5, {
  scaleX:0,
  //y:10,
  transformOrigin:'50% 100%'
},'-=0')
.to('#stage0', 2, {
  morphSVG:{shape:stage0Path},
  ease:CubicBezier.get("evolEase"),
  delay:0
})

.to('#theGroup', 1, {
  //morphSVG:{shape:'#capitalR'},
  x:0,
  delay:0.5,
  ease:Anticipate.easeIn
})

.to('#evolutionGroup', 1, {
  x:0,
  ease:Anticipate.easeInOut
},'-=1')

.to('#dGroup', 1, {
  alpha:0//,
  //fill:'#88CE02'
},'-=1')




var popTl = new TimelineMax({paused:true});
  popTl.set(popGroup, {
    alpha:1
  })
    .staggerTo(popGroup, 0.1, {
  drawSVG:'30% 0%',
  ease:Expo.easeIn
}, 0)
.staggerTo(popGroup, 0.8, {
  drawSVG:'100% 100%',
  ease:Expo.easeOut
}, 0);
//popTl.timeScale(0.3)

function pop(){
  
  popTl.play(0)
 
}

//findShapeIndex('#stage3', '#stage4')
//ScrubGSAPTimeline(tl)