
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
	<link rel="stylesheet" type="text/css" href="css/mouth.css">
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
		#organ_container{
			display: none;
		}
@media (max-width: 1005px){
  header {
    height: 120px;
  }
  #logo{
    float: none;
    margin: auto;
  }
  .container{
    margin-top: 60px;
  }
  #mouth_container{
  	margin-top: 160px;
  }
  #login_div{
    width: 500px;
    margin: auto;
    float: none;
  }
  p{
    position: static;
    margin: auto;
  }
  #login{
    margin-top: 5px;
  }
}

	</style>
</head>

<body>
	<header style =  "background-image: url('images/green_paper.jpg'); background-repeat: repeat-x; background-size: 1700px"> 
		<img id="logo" src="images/logo.png">
		<!-- <div id="register_php"> <?php echo $button_value; ?> </div> -->
		<div id="login_div">
					<p>Would you like to <a href="./index.php?action=register">register</a> or <a href="./index.php?action=login"> login? </a></p>

			<form id="login" action = "<?php echo $action_value; ?>" method="post">
				Username: <input type="text" name="username" value=""/>
				Password: <input type="password" name="password" value="" />
				       	<input type="hidden" name="submitted" value="1">
				        <input type="submit" style = "background-image: url('images/register_bg_pink.png'); background-position: center" value="<?php echo $button_value; ?>">
			</form>
		</div>
	</header>
	
	<div id="fridge_container" class="container">
		<img id="drag_drop_arrow" src="images/drag_drop_arrow2.png">
		<div id="fridge_stuff">
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
		</div>
	
	</div>
	<div id="mouth_container" class="container">
		<img id="move_mouth_arrow" src="images/move_mouth_arrows2.png"/>
		<div id="tounge"></div>
		<img id="mouth" src="images/mouth/mouth_00.png"/>
		<img id="click_continue" src="images/click_continue.png"/>
	</div>


	<div id="organ_container" class="container">		

		<div id="epi_target" > </div>
		<img id="esoph" src="images/esoph/esoph_000.png"/>
		<?php include 'images/epiglottis.svg'; ?>
		
		<?php include 'images/saliva_top.svg'; ?>
		<?php include 'images/saliva_bottom.svg'; ?>
		
		<div id="stomach_container">
			<div id="slider"></div>
			<img id="entering_food" src="images/entering_food.gif"/>
			<?php include 'images/handle.svg'; ?>	
			<?php include 'images/stomach.svg'; ?>
			<?php include 'images/hormone1.svg';?>	
			<?php include 'images/sphincter.svg';?>	
			<img id="chyme" src="images/chyme4/chyme2.png"/>
			<img id="enter_button" class="arrows" src="images/enter_button.gif" />
			<img id="space_bar" class="arrows" src="images/space_bar.gif" />
			<img id="sphinc_arrow2" class="arrows" src="images/sphinc_arrow2.gif"/>
			<div id="canvas"></div>
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
			<img id="water_bottleLeft" src="images/water/water_bottle_left/water_bottle_left_00.png"/>
			<img id="water_bottleRight" src="images/water/water_bottle_right/water_bottle_right_00.png"/>
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
		 		<img id="fan6" class="fan" src="images/fan2.png"/>
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
		<?php include 'images/parastalsis_info.svg'; ?>
		<?php include 'images/epiglottis_info.svg'; ?>
		<?php include 'images/esophogus_info.svg'; ?>
		<?php include 'images/sphincter_info.svg'; ?>
		<?php include 'images/stomach_info2.svg'; ?>
		<?php include 'images/hormone_info.svg'; ?>
		<?php include 'images/pepsin_info.svg'; ?>
		<?php include 'images/chyme_info.svg'; ?>
		<?php include 'images/acid_info.svg'; ?>
		<img id="stomach_info" class="info" src= "images/stomach_info.gif" />
 		<img id="small_int_welcome" class="info" src="images/welcome_sm_intestine.gif" />
 		

	</div>

	<div style="display: none">
	
	<img id="end" src="images/congratulations.png"/>
	<a href="quiz.php" > <img src="images/take_the_quiz.png" id="take_the_quiz" /></a>
	</div>
	

		

<script src="snap/dist/snap.svg-min.js"></script>
<script type="text/javascript" src="js/jquery.ui.rotatable.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/mouth.js"></script>
<script type="text/javascript" src="js/large_intestine.js"></script>
<script type="text/javascript" src="test/sketch.js"></script>
<script type="text/javascript" src="js/duo.js"></script>



<!-- <script src="js/sketch.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


</body>

</html>