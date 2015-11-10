
<!doctype html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title> mouth drag and drop </title>
	<script src="js/jquery/jquery-1.11.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style_mouth.css">
</head>

<body>
	
	<div id="tounge"></div>
	<ul>
		<li id= "tomato"> <img src="images/tomato.png"></li>
		<li id= "broccoli"> <img src="images/broccoli.png"></li>
		<li id="banana"> <img src="images/banana.png"></li>
		<li id="eggplant"> <img src="images/eggplant.png"> </li>
		<li id="strawberry"> <img src="images/strawberry.png"></li>
		<li id="toast"> <img src="images/toast.png"></li>
		<li id="pasta"> <img src="images/pasta.png"></li>
		<li id="chicken"> <img src="images/chicken.png"></li>
		<li id="hamburger"> <img src="images/hamburger.png"></li>
		<li id="fries"> <img src="images/fries.png"></li>
	</ul>
	
	<img id="mouth" src="images/mouth/mouth_00.png"/>

<script>


// drag and drop food
	var dropped = false;
	var whichDropped;
	var whichDropped; 
	var overMouth = false;
	var targetPosX;
	var targetPosY;

	$(function(){
		$('li').draggable({ 
			
			scroll: true,
			start: function(){
				console.log("start drag");
			},
			stop: function(){
				if(overMouth){
					//move food to location
					targetPosX = ((Math.random() *300) +1);
					targetPosY = ((Math.random() *300) +1);
					$(this).appendTo("#tounge").css({
						"position":"absolute",
						"top":targetPosY,
						"left":targetPosX
					});
					
					//close mouth

					//
					overMouth = false;
				}
			}
		});
	 	$("#mouth").droppable({
	 		drop: function(event, ui) {
	 			overMouth = true;
	 			dropped = true;
	 			
	 			if(dropped=true){
	 			mouthMove();
	 		} //else? mouth stop?
	 		// mouthStop()
	 		}
	 	}); 	 			 	
	});

	// $("#mouth").mouseleave(function(){
	// 	dropped = false;
	// 	console.log(dropped);
	// });

//mouth
	var pp= "images/mouth/mouth_";
	var images = new Array();
	var unWindBacktoZero = false;
	

	//load images into array
	for(var i=0; i<35; i++){
		if(i<10){
		images.push(pp+'0'+i+'.png');
		src = images[i];
		//$("#mouth").attr("src", src); //finds the attribute src and replaces it with the var src
		}
		else{
			images.push(pp+ i +'.png');
			src = images[i];
			//$("#mouth").attr("src", src);
		}
	}

	//make a million unnecissary variables
	var offset = $("#mouth").offset(); //.offset = retrieve pos relative to doc
	var numberOfFrames = images.length;
	var widthOfImage = $("#mouth").width();
	var yLocInImage;
	var frameNumber = 0; //what pic youre on in the animation sequence
	var interval = widthOfImage/numberOfFrames; //ex: 340px image, so then every ten px changes to a new frame

	//test click on mouth
	$("#mouth").click(function(){
		 console.log("ive been pushed");
	});


	//move image when you hover over it
	var mY =0;
	var isMovingDown = false;
	var mouthMove = function(){			
		$("#mouth").mousemove(function(e){
			yLocInImage = e.pageY - offset.top; //offset.top gives you the top coordinate measured previously with .offset(). this saying mouselocation x - x location of image. this is finding the distane of the mouse from the image
			frameNumber = parseInt(yLocInImage/interval);
			src = images[frameNumber]; //number in the array
			$(this).attr("src", src); //this = the object to which the code you are looking at right now applies which is mouth in this case

			//check if e.pageY is increasing (if mouse is moving down)
			if(e.pageY > mY){

				isMovingDown=true;
					if(frameNumber == 28) {
					ion.sound.play("crunch");
					console.log('crunch');
					}
					if(isMovingDown==true){
						$("#tounge").children().toggle( "explode" );
						$("#tounge").empty();

					}
				
			}
			//play sound if mouse is down
			
			mY = e.pageY;
		});
	};
	
	
	        


	/*//unwind back to zero when you move off ???
		$("#mouth").mouseout(function(){
			frameNumber = 0;
	        $("#mouth").attr("src", images[frameNumber]);
		}); */



	//unwind
	


	

	</script>
</body>
</html>