<?php //puts me in php mode
session_start(); //creates a cookie session, creates information on the cookie thats been stored on your computer. host is sending a cookie

if( isset( $_SESSION["valid"] ) ) //if this variable has been set then go to the next if
   if( 1 == $_SESSION["valid"] ) //if session valid is equal to 1
   header("Location: ./mouth_dragdrop3.php");

if( !isset( $_GET['action'] ) ) { //if the variable get action is not set
   $_GET['action'] = "register"; //set it to register
   header( "Location: ./index.php?action=". $_GET['action'] ); //header refreshes, it sends you somewhere else. the "." is like the + in javascript
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
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<meta charset="UTF-8">
	<title> index </title>
	<script src="js/jquery/jquery-1.11.1.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="ion.sound-master/js/ion.sound.min.js"></script>
	<script src="js/sounds.js"></script>
	<script src="js/p5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style>
		body {
			background-image: url("images/background_long2.jpg");
			background-position: center;
		}
		#circle_empty {
			background-image: url("images/magnified_brush_border.svg");
		    background-position: 325px 50px, center;
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-size: 160px;
		    border-radius: 50%;
		    width: 100px;
		    height: 100px;
		    position: absolute;
		    z-index: 13;
		}

	/*	#circle_empty {
		    border-radius: 50%;
		    width: 100px;
		    height: 100px;
		    position: absolute;
		    z-index: 13;
		    -webkit-mask-image: url("images/magnified_brush_border.svg");
		}*/
	</style>
</head>

<body>
	<div id="header" style = "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x"> 
		<img id="logo" src="images/logo.png">
		<div id="register_php"> <?php echo $button_value; ?> </div>
		<form id="login" action = "<?php echo $action_value; ?>" method="post">
			Username: <input type="text" name="username" value=""/>
			Password: <input type="password" name="password" value="" />
			       	<input type="hidden" name="submitted" value="1">
			        <input type="submit" style = "background-image: url('images/register_bg_pink.png'); background-position: center" value="<?php echo $button_value; ?>">
		</form>
		<p>Would you like to <a href="./index.php?action=register">register</a> or <a href="./index.php?action=login"> login? </a></p>
	</div>

	<div id="organ_container">		
		<div id="tounge"></div>
		<div id="epi_target" > </div>
		<img id="esoph" src="images/esoph/esoph_000.png"/>
		<?php include 'images/epiglottis.svg'; ?>
		<img id="mouth" src="images/mouth/mouth_00.png"/>
		<?php include 'images/saliva_top.svg'; ?>
		<?php include 'images/saliva_bottom.svg'; ?>
		
		<div id="stomach_container">
			<div id="slider"></div>
			<img id="entering_food" src="images/entering_food.gif"/>
			<?php include 'images/handle.svg'; ?>	
			<?php include 'images/stomach.svg'; ?>
			<?php include 'images/hormone1.svg';?>	
			<?php include 'images/sphincter.svg';?>	
			<img id="chyme" src="images/chyme2/chyme2_02.png"/>
			<img id="enter_button" class="arrows" src="images/enter_button.gif" />
			<img id="space_bar" class="arrows" src="images/space_bar.gif" />

		</div>
		<div id="intestine_container">
			<img id="brush1" class="brush" src="images/brushes/brush1.gif"/>
			<img id ="brush2" class="brush" src="images/brushes/brush2.gif"/>
			<img id ="brush3" class="brush" src="images/brushes/brush3.gif"/>
			<img id ="brush4" class="brush" src="images/brushes/brush4.gif"/>
			<img id ="brush5" class="brush" src="images/brushes/brush5.gif"/>
			<img id ="brush6" class="brush" src="images/brushes/brush6.gif"/>
			<img id ="brush7" class="brush" src="images/brushes/brush7.gif"/>
			<img id ="brush8" class="brush" src="images/brushes/brush8.gif"/>
			<img id ="brush9" class="brush" src="images/brushes/brush9.gif"/>
			<img id ="brush10" class="brush" src="images/brushes/brush10.gif"/>
			<?php include 'images/smallintestine.svg' ; ?>
			<?php include 'images/other_organs.svg' ; ?>
			<?php include 'images/organ_buttons.svg'; ?>
			<?php include 'images/water_bottle.svg'; ?>
			<?php include 'images/info_intestines.svg'; ?>
			<img id="gallbladder_arrow" class="arrows" src="images/gallbladder_arrow.gif" />	
			<img id="pancreas_arrow" class="arrows" src="images/pancreas_arrow.gif" />
			<?php include 'images/brush_border_info.svg'; ?>
			<img id="magnifyn_arrow" class="arrows" src="images/magnifyn_arrow.gif"/>
		
			<div id="containment">
				<div id="circle_empty"></div>
				<img id="empty_magnifyn" src="images/magnifyn.svg"/>
				<img id="magnifyn_background" src="images/circle_magnifyn.svg"/>
			</div>
			<img id="select_brush_arrow" class="arrows" src="images/select_brush_arrow.gif" />
			<img id="brush2_arrow" class="arrows" src="images/brush2_arrow.gif" />
			<img id="brush3_arrow" class="arrows" src="images/brush3_arrow.gif" />
			<img id="brush4_arrow" class="arrows" src="images/brush4_arrow.gif" />
			<img id="brush5_arrow" class="arrows" src="images/brush5_arrow.gif" />
			<img id="brush7_arrow" class="arrows" src="images/brush2_arrow.gif" />
			<div id="jujun_container">
				<img id="bucket" src="images/bucket.png" />	
				<div id="bucket_target"> </div>
				<img id="bucket_arrow" class="arrows" src="images/bucket_arrow.gif" />
				<img id="sponge_arrow" class="arrows" src="images/sponge_arrow.gif" />
				<?php include 'images/sponge.svg'; ?>
				<img id="nutrient_protein" class= "nutrient" src ="images/nutrient_protein.svg"/>
				<img id="nutrient_sugar" class= "nutrient" src ="images/nutrient_sugar.svg"/>
				<img id="nutrient_fattyacid" class= "nutrient fatty_acid" src ="images/nutrient_fattyacid.svg"/>		
				<img id="nutrient_protein2" class= "nutrient" src ="images/nutrient_protein.svg"/>
				<img id="nutrient_sugar2" class= "nutrient" src ="images/nutrient_sugar.svg"/>
				<img id="nutrient_fattyacid2" class= "nutrient fatty_acid" src ="images/nutrient_fattyacid.svg"/>		
				<img id="nutrient_protein3" class= "nutrient" src ="images/nutrient_protein.svg"/>
				<img id="nutrient_sugar3" class= "nutrient" src ="images/nutrient_sugar.svg"/>
				<img id="nutrient_fattyacid3" class= "nutrient fatty_acid" src ="images/nutrient_fattyacid.svg"/>		
 				<img id="jujun_welcome" class="info" src="images/welcome_jujun.gif"/>
 				<?php include 'images/jujun_info.svg'; ?>
 				<img id="enter_large_int" class="arrows" src="images/enter_large.gif" />
 				<img id="large_int_welcome" class="info" src="images/welcome_large_int.gif"/>
		 		<img id="fan_instruction" src="images/fan_arrow.gif"/>
		 		<img id="fan1" class="fan" src="images/fan.png"/>
		 		<img id="fan2" class="fan" src="images/fan3.png"/>
		 		<img id="fan3" class="fan" src="images/fan2.png"/>
		 		<img id="fan4" class="fan" src="images/fan2.png"/>
		 		<img id="fan5" class="fan" src="images/fan3.png"/>
		 		<img id="fanStand1" class="fan" src="images/fan_stand.png"/>
		 		<img id="fanStand2" class="fan" src ="images/fan_stand2.png"/>
 	
			</div>
		</div>
	
		<!-- key instructions-->
		<img id="initial_click_arrow" class="arrows" src="images/initial_click_arrow.gif" />
		<img id="saliva_arrows" class="arrows" src="images/squeze_arrows.gif" />
		<img id="saliva_arrow_bottom" class="arrows" src="images/squeze_arrow_bottom.gif" />
		<img id="saliva_arrow_bottom2" class="arrows" src="images/squeze_arrow_bottom.gif" />
		<img id="epi_clicker" class="arrows" src="images/clicker.gif"/>
		<img id="key_buttons" src="images/key_button.gif"/>
		<img id="sphincter_arrow" src="images/sphinctor.gif"/>
		<img id="hormone_arrows" class="arrows" src="images/hormone_arrows.gif" />
		<img id="chyme_arrow" class="arrows" src="images/chyme_arrow.gif" />
		<img id="small_int_enter_button" class="arrows" src="images/small_int_enter_button.gif" />
		<!-- info -->
		
		<?php include 'images/teeth_info.svg'; ?>
		<?php include 'images/saliva_info.svg'; ?>
		<?php include 'images/epiglottis_info.svg'; ?>
		<?php include 'images/esoph_info.svg'; ?>
		<?php include 'images/sphincter_info.svg'; ?>
		<?php include 'images/stomach_info2.svg'; ?>
		<?php include 'images/hormone_info.svg'; ?>
		<?php include 'images/pepsin_info.svg'; ?>
		<?php include 'images/chyme_info.svg'; ?>
		<?php include 'images/acid_info.svg'; ?>
		<img id="stomach_info" class="info" src= "images/stomach_info.gif" />
 		<img id="small_int_welcome" class="info" src="images/welcome_sm_intestine.gif" />
 		

	</div>
	
	<img id="end" src="images/congratulations.png"/>
	<a href="quiz.php" > <img src="images/take_the_quiz.png" id="take_the_quiz" /></a>
	
	</div>
		

<script src="snap/dist/snap.svg-min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<!-- <script src="js/sketch.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


</body>

</html>