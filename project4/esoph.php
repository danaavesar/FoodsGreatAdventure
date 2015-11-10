
<!doctype html>
<html lang = "en">
<head>

	<meta charset="UTF-8">
	<title> esoph </title>
	<script src="js/jquery/jquery-1.11.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="snap/dist/snap.svg-min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>

<body>

<img id="esoph" src="images/esoph/esoph_000.png"/>
<?php include 'images/epiglottis.svg'; ?>

<img id="key_buttons" src="images/key_button.gif"
<div> </div>


  	<script>
  	var epiglottis_svg = Snap.select('#epiglottis_svg');
  	var epiglottis = epiglottis_svg.select('#epiglottis');
  	
	

  	//epiglottis
  	$("#epiglottis").click(function(){
  		console.log('hey');
  		  	epiglottis.animate({
  				transform: "r180,80,120"
  			}, 700, mina.elastic);
  			ion.sound.play("gate_open");
  			var src = $("#key_buttons").attr('src');
  		  	$("#key_buttons").attr("src", src.replace('.gif', '_animated.gif'));
  		  	src = $("#esoph").attr('src');
  		  	$("#esoph").attr("src", src.replace('esoph_000.png', 'esoph_00.png'));
  		  	console.log(src);
  	});

  	//esophogus
  	var pp= "images/esoph/esoph_";
	var eImages = new Array();
	var unWindBacktoZero = false;
	

	//load images into array
	for(var i=0; i<61; i++){
		if(i<10){
			eImages.push(pp+'0'+i+'.png');
			src = eImages[i];
			//$("#esoph").attr("src", src); //finds the attribute src and replaces it with the var src
		}
		else{
			eImages.push(pp+ i +'.png');
			src = eImages[i];
			//$("#esoph").attr("src", src);
		}
	}

	//make a million unnecissary variables
	var eOffset = $("#esoph").offset(); //.offset = retrieve pos relative to doc
	var eNumberOfFrames = eImages.length;
	var eHeight = $("#esoph").height();
	var dTriggered = 0;
	var c = 0;
	var frameNumber = 0; //what pic youre on in the animation sequence
	var interval = eHeight/eNumberOfFrames; //ex: 340px image, so then every ten px changes to a new frame */

	//animate when down arrow pressed
	//var downKey = jQuery.Event("keydown", { keyCode: 40});
	$('body').keydown(function(e){
		//every time i press d src runs four frames
		if(event.which == 68){
			e.preventDefault();
		 	
		 	c = dTriggered*4;
		 	dTriggered++;
		 	/*$('html, body').animate({
		 		scroll();*/

		 	console.log(dTriggered);
			
			/*for(i=0; i=eNumberOfFrames; i++){
				src= eImages[frameNumber];
			} */
			for(i=c; i<c+4; i++){
				//time(100);
				src=eImages[i];
				$("#esoph").attr("src", src);
				console.log(i);
			} 


			/*var k = c;
				function loop () {
					setTimeout(function() {
					
						if (k<c+4) {
							src= eImages[k];
					
							$("#esoph").attr("src", src);
							k++;
							loop();

						}
					}, 500);

				} */

			
		}
		
		function increaseDBy1(){
			c++;
		}
	});



	</script> 

</body>

</html>