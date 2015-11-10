<?php //puts me in php mode
session_start(); //creates a cookie session, creates information on the cookie thats been stored on your computer. host is sending a cookie

if( !isset( $_GET['action'] ) ) { //if the variable get action is not set
   $_GET['action'] = "register"; //set it to register
   header( "Location: ./log_in.php?action=". $_GET['action'] ); //header refreshes, it sends you somewhere else. the "." is like the + in javascript
}//there are curly brackets here because there are ore than one commands/statements for this if statement

include "includes/main.php"; //adding an includes, 

if( isset( $_GET['action'] ) ) //check to see if this was set
   if( "login" == $_GET['action'] ) { //is it also equal to login
      $action_value = "login.php"; //you are just setting a variable by doing this $______.
      $subheading = $button_value = "Login"; // make the subheading and buttonvalue "login"..to be echoed later in html
   }
   else
      if( "register" == $_GET['action'] ) { 
         $action_value = "register.php";
         $subheading = $button_value = "Register";
      }
?>

<!DOCTYPE html PUBLIC >

<html lang="en">
	<head>
	 	<meta charset="utf-8">
		<title>Form</title>
	</head>
	<body>
		<header>
         <h1>Web App</h1>
         <p><?php echo $subheading ?></p> 
        </header>
		<form action = "<?php echo $action_value; ?>" method="post">
			Username: <input type="text" name="username" value=""/><br />
			Password: <input type="password" name="password" value"" /><br/>
			         <p><input type="hidden" name="submitted" value="1"></p>
			         <p><input type="submit" value="<?php echo $button_value; ?>"></p>
			<input type="submit" name="submit" value="submit" />
		</form>
		 <p>Would you like to <a href="./log_in.php?action=register">register</a> or <a href="./log_in.php?action=login">login?</a></p>
	</body>
</html>