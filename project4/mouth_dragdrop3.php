<?php //puts me in php mode
session_start(); //creates a cookie session, creates information on the cookie thats been stored on your computer. host is sending a cookie
if( isset( $_SESSION['valid'] ) ) {
   if( $_SESSION['valid'] !== TRUE )
      header( "Location: ./mouth_dragdrop2.php" );
}
else
   header( "Location: ./mouth_dragdrop2.php" );
require_once "includes/db.php";

$username = select( "username", "user", "username", $_SESSION['username'] );

?>

<!doctype html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title> mouth drag and drop </title>
	<script src="js/jquery/jquery-1.11.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style_mouth2.css">
	<link href='http://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet' type='text/css'>
</head>
<style>
	body {
	background-image: url("images/background_long2.jpg");
	background-position: center;
	}
</style>

<body>
	<div id="header" style = "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x"> 
		<img id="logo" src="images/logo2">
		<p> Welcome <?php echo $username; ?> ! </p>
		<p id="logout"><a href="./logout.php">Logout</a></p>

	</div>
		<img id= "adventure_gif" src="images/adventuregif.gif" />
	<h2> What happens to food when you eat? <br> Feed the mouth to take the adventure and find out! </h2>
	<h3>  </h3>
	<div id="container">
		<div id="food_container"> 
			<img id= "tomato" class="food" src="images/tomato.png">
			<img id= "broccoli" class="food" src="images/broccoli.png">
			<img id="banana" class="food" src="images/banana.png">
			<img id="eggplant" class="food" src="images/eggplant.png">
			<img id="strawberry" class="food" src="images/strawberry.png">
			<img id="toast" class="food" src="images/toast.png">
			<img id="pasta" class="food" src="images/pasta.png">
			<img id="chicken" class="food" src="images/chicken.png">
			<img id="hamburger" class="food" src="images/hamburger.png">
			<img id="fries" class="food" src="images/fries.png">
		</div>
		<div id="mouth_cont">
			<div id="tounge"></div>
			<img id="mouth" src="images/mouth/mouth_00.png"/>
		</div>
	</div>
<script>


// drag and drop food
	var dropped = false;
	var whichDropped;
	var whichDropped; 
	var overMouth = false;
	var targetPosX;
	var targetPosY;

	$(function(){
		$('.food').draggable({ 
			
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

			if( $('#food_container').children().length == 0 ){
				console.log('empty');
				$('body').contents().animate({
					left: '-150%',
				}, 1000); 
				
				 setTimeout(function(){ 
		      		window.location.href = 'index.php';
		        }, 1000);
	 		
			}
		});
	}
	//if the food container is empty move everything off the page and relocate to index
	
	




	/*//unwind back to zero when you move off ???
		$("#mouth").mouseout(function(){
			frameNumber = 0;
	        $("#mouth").attr("src", images[frameNumber]);
		}); */



	//unwind
	


	

	</script>
	

</body>
</html>