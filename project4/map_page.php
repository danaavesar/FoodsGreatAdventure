

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
	</div>

	<div id="map_container" class="container">
		<div>
			<h2> <span style="font-size:40px;"> digestion </span> is the journey food takes through your body <br><br>
			 This journey breaks down food into nutrients so that your body can get what it needs to function!</h2>
			<img id="treasure_chest" src="images/treasure_chest.png"/>
		</div>
		<div>
			<img id="map" src="images/map.png">
			<img id="map_arrow" src="images/map_arrow.gif">
		</div>
	</div>
		
<script>
$(window).load(function(){
	$(".container").show();
	$(".container").animate({
		marginTop: ["0px", "easeOutQuad"]
	}, 1000);
});

$("#map").click(function(){
	$(".container").animate({
	marginTop: ['-1000px', "easeOutQuad"]
	}, 1000);
	console.log("clicked");

	setTimeout(function(){
		window.location = "mouth_page.php";
	},500);
	
});


</script>
	

</body>
</html>