function paint(){
	var canvasty = document.getElementsByName('ty');
	var canvas = document.getElementById("can");
	var rad=document.getElementsByName('r1');
	var ctx = canvas.getContext("2d");
	var ran = document.getElementById('ran');
	ctx.clearRect(0,0, canvas.width, canvas.height);
    for (var i=0;i<rad.length; i++) {
        if (rad[i].checked) {
            var currentcolor = rad[i].value;
        }
    }
    for (var i=0;i<canvasty.length; i++) {
        if (canvasty[i].checked) {
            var currenttype = canvasty[i].value;
        }
    }
    var canvas = document.getElementById('can');
	var ctx = canvas.getContext('2d');
	var raf;
	var vxx = +ran.value;
    var vyy = +(ran.value - 10);
	var shape = {
 	x: 100,
  	y: 100,
  	vx: vxx,
  	vy: vyy,
  	radius: 25,
  	color: currentcolor,
  	draw: function() {
    	ctx.beginPath();
    	if (currenttype == "circle") {
    		ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, true);
    	}
    	else if (currenttype == "rectangle") {
    		ctx.rect(this.x, this.y, 100, 50);
    	}
    	else if (currenttype == "square"){
			ctx.rect(this.x, this.y, 100, 100);
    	}
    	ctx.closePath();
    	ctx.fillStyle = this.color;
    	ctx.fill();
  	}
	};
	var interval = setTimeout(function() {
        	var startTime = (new Date()).getTime();
        	raf = window.requestAnimationFrame(draw);
      }, 1);

	function draw() {
  		ctx.clearRect(0,0, canvas.width, canvas.height);
  		shape.draw();
  		shape.x += shape.vx;
  		shape.y += shape.vy;

  		if (shape.y + shape.vy > canvas.height ||
      	shape.y + shape.vy < 0) {
    	shape.vy = -shape.vy;
  	}
  		if (shape.x + shape.vx > canvas.width ||
     	shape.x + shape.vx < 0) {
   		shape.vx = -shape.vx;
  	}
  	raf = window.requestAnimationFrame(draw);
	}
	


document.getElementById('stop').addEventListener('click', function(e) {
	shape = null;
	ctx.clearRect(0,0, canvas.width, canvas.height);
  	window.cancelAnimationFrame(raf);
  	clearInterval(interval);
});


};
