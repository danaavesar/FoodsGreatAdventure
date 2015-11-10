<!doctype html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title> mouth drag and drop </title>
	<script src="js/jquery/jquery-1.11.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<script src="snap/dist/snap.svg-min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- <object id="shape" type="image/svg+xml" data="images/website_shapes.svg"></object> -->
	<?php include 'images/website_shapes.svg' ?>
	<script>

	//make snap variables
	var shapes = Snap.select('#shapes');
  	var hormone_g = shapes.select('#hormone_g');

  	//make variables
  	var mouseX;
  	var mouseY;
  	var toggled = true;

  	//make it so i can map stuff
  	Number.prototype.map = function ( in_min , in_max , out_min , out_max ) {
  	return ( this - in_min ) * ( out_max - out_min ) / ( in_max - in_min ) + out_min;
	}

  		//click
  	$('#hormone_g').on('click', function(){

  		//follow mouse
  		if(toggled) {
  			
  			//get mouse position and move mouse
  			$("#stomach").mousemove(function(e){
  				mouseX = e.pageX;
  				mouseY = e.pageY;
				horPosX = (mouseX.map( 700 , 1300 , 0, 50 ));
				horPosY = (mouseY.map( 1080 , 1580 , 0, 100 ));
				console.log(horPosX);
  			//follow
  				hormone_g.transform("t" + horPosX,0);
  				/*$('#hormone1').css({
  					
  					"top":mouseY,
  					"left":mouseX
  				}); */
  			});
  		} 
  		//on click again stop following
  		else {
  			alert('second handler!');
  		}

  		toggled = !toggled;
  	});
  		
  		
  		

  		
  		

  		
  		
	
	</script>
</body>