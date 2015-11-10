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
		<form id="login" action = "<?php echo $action_value; ?>" method="post">
			Username: <input type="text" name="username" value=""/>
			Password: <input type="password" name="password" value="" />
			        <input type="hidden" name="submitted" value="1">
			         <input type="submit" style = "background-image: url('images/register_bg_pink'); background-position: center" value="<?php echo $button_value; ?>">
		</form>
		<p id="reg_log">Would you like to <a href="./mouth_dragdrop2.php?action=register">register</a> or <a href="./mouth_dragdrop2.php?action=login"> login? </a></p>
	</div>
	<div id="home_container" class="container">
		<img id= "adventure_gif" src="images/adventuregif3.gif" />
		<img id= "hamburger_man" class="animate_man" src="images/hamburger_man.png"/>
		<img id= "tomato_man" class="animate_man" src = "images/tomato_man.png"/>
		<img id= "boat" class="animate_man" src = "images/boat.png"/>
	 <h2> What happens to food when you eat? <br> To find out, take the adventure through your digestion system by following the guides for clues! </h2> 
	</div>

<script>

$(".animate_man").mouseover(function(){
	var src = $(this).attr('src');
	if(src.indexOf('_animated.gif') === -1) {
		console.log("over");
	  	src = src.replace('.png', '_animated.gif');
	  	$(this).attr('src', src); 
	 }                   
});
$(".animate_man").mouseout(function(){
	var src = $(this).attr('src');
	if(src.indexOf('.png') === -1) {
		console.log("out");
	  	src = src.replace('_animated.gif', '.png');
	  	$(this).attr('src', src); 
	 }                   
});


$("#adventure_gif").click(function(){
	$(".container").animate({
	marginTop: ['-1000px', "easeOutQuad"]
	}, 1000);
	console.log("clicked");

	setTimeout(function(){
		window.location = "map_page.php";
	},500);
	
});


	

	</script>
	

</body>
</html>