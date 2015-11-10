

<!doctype html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title> mouth drag and drop </title>
	<script src="js/jquery/jquery-1.11.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<link rel="stylesheet" type="text/css" href="css/home_page.css">
	<link href='http://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet' type='text/css'>
</head>
<style>
	body {
	background-image: url("images/background_long2.jpg");
	background-position: center;
	background-size: 1400px;
	}
</style>

<body>
	<div id="header" style = "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x; background-size: 1700px"> 
		<img id="logo" src="images/logo.png">
	</div>

	<div id="mouth_page_container" class="container">
		<div id="fridge_container">
			<img class="fridge" src="images/fridge_back.png">
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
			<img id="fridge1" class="fridge" src="images/fridge_front1.png">
			<img id="fridge2" class="fridge" src="images/fridge_front2.png">
			<img id="fridge3" class="fridge" src="images/fridge_front3.png">
			<img id="drag_drop_arrow" src="images/drag_drop_arrow.png">
		</div>
		<div id="mouth_container">
			<img id="move_mouth_arrow" src="images/move_mouth_arrows.png"/>
			<div id="tounge"></div>
			<img id="mouth" src="images/mouth/mouth_00.png"/>
		</div>
	</div>
		
<script>
//animate window on
$(window).load(function(){
	$(".container").show();
	$(".container").animate({
		marginTop: ["0px", "easeOutQuad"]
	}, 1000);
});

// drag and drop food
	var dropped = false;
	var whichDropped;
	var overMouth = false;
	var targetPosX;
	var targetPosY;

	$(function(){
		$('.food').draggable({ 
			
			scroll: true,
			start: function(){
				
			},
			stop: function(){
				if(overMouth){
					//move food to tounge
					targetPosX = ((Math.random() *50) +1);
					targetPosY = ((Math.random() *50) +1);
					$(this).appendTo("#tounge").css({
						"position":"absolute",
						"top":targetPosY,
						"left":targetPosX
					});
					
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

	$("#move_mouth_arrow").hover(function(event){
		event.preventDefault();
		console.log("over");
	});


//mouth move
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

	//make a million variables
	var offset = $("#mouth").position(); //.offset = retrieve pos relative to doc
	var numberOfFrames = images.length;
	var widthOfImage = $("#mouth").width();
	var yLocInImage;
	var frameNumber = 0; //what pic youre on in the animation sequence
	var interval = widthOfImage/numberOfFrames; //ex: 340px image, so then every ten px changes to a new frame

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
				//play crunch sound
				if(e.pageY == 572) {
					ion.sound.play("crunch");
					console.log('crunch');
				
				}

				 
					$("#tounge").children().toggle( "explode" );
					$("#tounge").empty();

					
			}
			//console.log("my = " + mY);
			mY = e.pageY;
		});
	};

</script>
	

</body>
</html>