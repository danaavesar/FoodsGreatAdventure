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
	<?php include 'images/hormone1.svg' ?>
	<?php include 'images/stomach.svg' ?>
	<script>

	//make snap variables
  	var hormone_g = Snap.select('#hormone_g');

  	//make variables
  	var mouseX;
  	var mouseY;
  	var toggled = true;


  		//click
  	$('#hormone1').on('click', function(){

  		//follow mouse
  		if(toggled) {
  			alert('first handler!');
  			//get mouse position and move mouse
  			$("#stomach").mousemove(function(e){
  				mouseX = e.pageX;
  				mouseY = e.pageY;	
  				//follow
  				$('#hormone1').css({
  					"top":mouseY,
  					"left":mouseX
  				}); 
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