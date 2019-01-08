/*	  	used for sine approximation, but Math.sin in Chrome is still fast enough :)http://jsperf.com/math-sin-vs-sine-approximation

	    B = 4 / Math.PI,
	    C = -4 / Math.pow( Math.PI, 2 ),
	    P = 0.225,

*/

	var NUM_PARTICLES = ( ( ROWS = 30 ) * ( COLS = 60 ) ),
		    THICKNESS = Math.pow( 60, 2 ),
		    SPACING = 24,
		    MARGIN = 0,
		    COLOR = 220,
		    DRAG = 0.9,
		    EASE = 0.2,
	    container,particle,canvas,mouse,stats,list,ctx,tog,man,dx,dy,mx,my,d,t,f,a,b,i,n,w,h,p,s,r,c;

	particle = {
	  vx: 0,
	  vy: 0,
	  x: 0,
	  y: 0
	};

	function init() {

		  container = document.getElementById( 'container' );
		  canvas = document.createElement( 'canvas' );
		  
		  ctx = canvas.getContext( '2d' );
		  tog = true;
		  
		  list = [];
		  
		   //w = canvas.width = COLS * SPACING + MARGIN * 2;
		   //h = canvas.height = ROWS * SPACING + MARGIN * 2;
		   canvas.style.zIndex = -1;    //if forground not working properly uncomment this
		   container.style.zIndex = -1;
		   w = canvas.width = window.innerWidth;
		   h = canvas.height = window.innerHeight;
		  //container.style.marginLeft = Math.round( w * -0.5 ) + 'px';
		  //container.style.marginTop = Math.round( h * -0.5 ) + 'px';
		  
		  for ( i = 0; i < NUM_PARTICLES; i++ ) {
		    
		    p = Object.create( particle );

			p.x = p.ox = MARGIN + SPACING * ( i % COLS );
			if(p.x > window.innerWidth){
				p.destroy();
				continue;
			}

			if(i%2==0)
				p.y = p.oy = MARGIN + SPACING * Math.floor( i / COLS );
			else
				p.y = p.oy = MARGIN + SPACING * Math.floor( i / COLS ) + SPACING/2;

		    list[i] = p;

		  }

		  container.addEventListener( 'mousemove', function(e) {

		    bounds = container.getBoundingClientRect();
		    mx = e.clientX - bounds.left;
		    my = e.clientY - bounds.top;
		    
		  });
		  
		  if ( typeof Stats === 'function' ) {
		    document.body.appendChild( ( stats = new Stats() ).domElement );
		  }
		  
		  container.appendChild( canvas );
		  step();
	}

	function step() {

		  if ( stats ) stats.begin();

		  if ( tog = !tog ) {
		      
		    for ( i = 0; i < NUM_PARTICLES; i++ ) {
		      
		      p = list[i];
		      
		      d = ( dx = mx - p.x ) * dx + ( dy = my - p.y ) * dy;
		      f = -THICKNESS / d;

		      if ( d < THICKNESS ) {
		        t = Math.atan2( dy, dx );
		        p.vx += f * Math.cos(t);
		        p.vy += f * Math.sin(t);
		      }

		      p.x += ( p.vx *= DRAG ) + (p.ox - p.x) * EASE;
		      p.y += ( p.vy *= DRAG ) + (p.oy - p.y) * EASE;

		    }

		  } else {

		    b = ( a = ctx.createImageData( w, h ) ).data;

		    for ( i = 0; i < NUM_PARTICLES; i++ ) {

		      p = list[i];
		      b[n = ( ~~p.x + ( ~~p.y * w ) ) * 4] = b[n+1] = b[n+2] = COLOR, b[n+3] = 255;
		    }

		    ctx.putImageData( a, 0, 0 );
	  }

	  if ( stats ) stats.end();

	  requestAnimationFrame( step );
	}
