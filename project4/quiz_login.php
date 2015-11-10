<?php //puts me in php mode
session_start(); //creates a cookie session, creates information on the cookie thats been stored on your computer. host is sending a cookie

if( isset( $_SESSION["valid"] ) ) //if this variable has been set then go to the next if
   if( 1 == $_SESSION["valid"] ) //if session valid is equal to 1
   header("Location: ./quiz.php");

if( !isset( $_GET['action'] ) ) { //if the variable get action is not set
   $_GET['action'] = "register"; //set it to register
   header( "Location: ./quiz_login.php?action=". $_GET['action'] ); //header refreshes, it sends you somewhere else. the "." is like the + in javascript
}//there are curly brackets here because there are ore than one commands/statements for this if statement

include "includes/main.php"; //adding an includes, 

if( isset( $_GET['action'] ) ) //check to see if this was set
   if( "login" == $_GET['action'] ) { //is it also equal to login
      $action_value = "login_from_quiz.php"; //you are just setting a variable by doing this $______.
      $subheading = $button_value = "Login"; // make the subheading and buttonvalue "login"..to be echoed later in html
   }
   else
      if( "register" == $_GET['action'] ) { 
         $action_value = "register.php";
         $subheading = $button_value = "Register";
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
	<link rel="stylesheet" type="text/css" href="css/quiz_login.css">
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
		<img id="logo" src="images/logo2.png">

	</div>
	
	<img id="must_login" src="images/must_login.png">
		<form id="login2" action = "<?php echo $action_value; ?>" method="post">
			Username: <input type="text" name="username" value=""/>
			Password: <input type="password" name="password" value="" />
			        <input type="hidden" name="submitted" value="1">
			         <input type="submit" style = "background-image: url('images/register_bg_pink.png'); background-position: center" value="<?php echo $button_value; ?>">
		</form>
		<p id="reg_log2">Would you like to <a href="./quiz_login.php?action=register">register</a> or <a href="./quiz_login.php?action=login"> login? </a></p>
	

</body>
</html>