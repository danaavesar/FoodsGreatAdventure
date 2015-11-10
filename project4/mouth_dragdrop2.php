<?php //puts me in php mode
session_start(); //creates a cookie session, creates information on the cookie thats been stored on your computer. host is sending a cookie

if( isset( $_SESSION["valid"] ) ) //if this variable has been set then go to the next if
   if( 1 == $_SESSION["valid"] ) //if session valid is equal to 1
   header("Location: ./mouth_dragdrop3.php");

if( !isset( $_GET['action'] ) ) { //if the variable get action is not set
   $_GET['action'] = "register"; //set it to register
   header( "Location: ./home_page.php?action=". $_GET['action'] ); //header refreshes, it sends you somewhere else. the "." is like the + in javascript
}//there are curly brackets here because there are ore than one commands/statements for this if statement

include "includes/main.php"; //adding an includes, 

if( isset( $_GET['action'] ) ) //check to see if this was set
   if( "login" == $_GET['action'] ) { //is it also equal to login
      $action_value = "login.php"; //you are just setting a variable by doing this $______.
      $subheading = $button_value = "Login"; // make the subheading and buttonvalue "login"..to be echoed later in html
      $link = "./index.php?action=login";
   }
   else
      if( "register" == $_GET['action'] ) { 
         $action_value = "register.php";
         $subheading = $button_value = "Register";
         $link = "./index.php?action=register";
      }


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
	background-size: 1400px;
	}
</style>

<body>
	<div id="header" style = "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x; background-size: 1700px"> 
		<img id="logo" src="images/logo.png">
		<!--
<img id="register_bg" src="images/register_bg_pink" >
		<div id="register_php"> <?php echo $button_value; ?> </div>
-->
		<form id="login" action = "<?php echo $action_value; ?>" method="post">
			Username: <input type="text" name="username" value=""/>
			Password: <input type="password" name="password" value="" />
			        <input type="hidden" name="submitted" value="1">
			         <input type="submit" style = "background-image: url('images/register_bg_pink'); background-position: center" value="<?php echo $button_value; ?>">
		</form>
		<p id="reg_log">Would you like to <a href="./home_page.php?action=register">register</a> or <a href="./home_page.php?action=login"> login? </a></p>

	</div>
		<img id= "adventure_gif" src="images/adventuregif2.gif" />
	<!-- <h2> What happens to food when you eat? <br> Feed the mouth to take the adventure and find out! </h2> -->
<!-- 	<div id="container"> -->

<!-- 		<div id="food_container"> 
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
			
		<!-- </div>  -->

<!-- 	</div> -->
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

			if( $('#food_container').children().length == 8){
				$("#click_to_start").show();
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