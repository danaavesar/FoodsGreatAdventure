<?php
session_start();

if( isset( $_SESSION['valid'] ) ) {
   if( $_SESSION['valid'] !== TRUE )
      header( "Location: ./quiz_login.php" );
}
else
   header( "Location: ./quiz_login.php" );

require_once "includes/db.php";

$username = select( "username", "user", "username", $_SESSION['username'] );
$last_score = select("score", "score", "username", $_SESSION['username'] );
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
	<link rel="stylesheet" type="text/css" href="css/quiz.css">
	<link href='http://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet' type='text/css'>
</head>
<style>
	body {
	background-image: url("images/orange_paper.jpg");
	background-position: center;
	}
	
	
</style>

<body>
		<div id="header" style = "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x"> 
			<img id="logo" src="images/logo2">

			<p id="welcome"> Welcome <?php echo $username; ?> ! </p>
			<p id="logout"><a href="./logout.php">Logout</a></p>
	
		</div>
		
	
	<div id="options">
			<img id="pepsin" class="draggable" data-product="pepsin" src="images/quiz_pepsin.png">
			<img id="brush" class="draggable" data-product="brush"  src="images/quiz_brush.png">
			<img id="chyme" class="draggable" data-product="chyme" src="images/quiz_chyme.png">
			<img id="acid" class="draggable" data-product="acid"  src="images/quiz_acid.png">
			<img id="hormone" class="draggable" data-product="hormone"  src="images/quiz_hormone.png">
			<img id="esoph" class="draggable" data-product="esoph"  src="images/quiz_esoph.png">
			<img id="jujunum" class="draggable" data-product="jujunum"  src="images/quiz_jujunum.png">
			<img id="large_int" class="draggable" data-product="large_int"  src="images/quiz_large_int.png">
			<img id="saliva" class="draggable" data-product="saliva"  src="images/quiz_saliva.png">

	</div>
	<p id="score"> Your score is <?php echo $last_score; ?> </p>
	<p> drag and drop the elements on the correct description! Then press submit to see how many you got correct </p>
	<form action = "quizscore.php" method="post">

	<INPUT id="q1" TYPE="radio" NAME="a" VALUE=""><BR>
	<INPUT id="q2" TYPE="radio" NAME="b" VALUE=""><BR>
	<INPUT id="q3" TYPE="radio" NAME="c" VALUE=""><BR>
	<INPUT id="q4" TYPE="radio" NAME="d" VALUE=""><br>
	<INPUT id="q5" TYPE="radio" NAME="e" VALUE=""><br>
	<INPUT id="q6" TYPE="radio" NAME="f" VALUE=""><br>
	<INPUT id="q7" TYPE="radio" NAME="g" VALUE=""><br>
	<INPUT id="q8" TYPE="radio" NAME="h" VALUE=""><br>
	<INPUT id="q9" TYPE="radio" NAME="i" VALUE=""><br>
	<input id="submit" type="submit" value="Score Quiz!">
	</form>

	<div id="drops">
		<div id="drop1" class="droppable"> <p> Release proteins that break down food in the stomach </p> </div>
		<div id="drop2" class="droppable"> <p> Breaks down Chyme into basic nutrients </p> </div>
		<div id="drop3" class="droppable"> <p> Enzyme that is released by the Hormone Gastrin in the Stomach </p> </div>
		<div id="drop4" class="droppable"> <p> The acid in the Stomach that breaks down food </p> </div>
		<div id="drop5" class="droppable"> <p> Part of the small intestine that absorbs nutrients </p> </div>
		<div id="drop6" class="droppable"> <p> The organ for sucking the water out of food </p> </div>
		<div id="drop7" class="droppable"> <p> The organ for sucking the water out of food </p> </div>
		<div id="drop8" class="droppable"> <p> The organ for sucking the water out of food </p> </div>
		<div id="drop9" class="droppable"> <p> The organ for sucking the water out of food </p> </div>

	</div>	
	<script type="text/javascript" src="js/quiz.js"></script>
</body>
</html>
