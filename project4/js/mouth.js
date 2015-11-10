$(window).load(function(){
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
				if($("#fridge_stuff").children().length < 13){
					console.log("what");
					$("#click_continue").show();
					 $("#drag_drop_arrow").hide();
				}	
				$("#move_mouth_arrow").show();
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

		$("#click_continue").click(function(){
			$("#move_mouth_arrow").hide();
			$("#click_continue").hide();
			$("#fridge_container").hide();
			$("#mouth_container").css({
				"position":"absolute",
				'left': "420px",
				'top': "40px"
			});
			// $("#mouth_container").animate({
			// 	left: ["430px", "easeOutQuad"],
			// 	top: "10px"
			// }, 1000)
				
			$("#organ_container").show();
			$("#organ_container").animate({
				left: ["10px", "easeOutQuad"],
			}, 1000);
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
	var heightOfImage = $("#mouth").height();
	var yLocInImage;
	var frameNumber = 0; //what pic youre on in the animation sequence
	var interval = heightOfImage/numberOfFrames; //ex: 340px image, so then every ten px changes to a new frame

	//move image when you hover over it
	var mY =0;
	var isMovingDown = false;
	var mouthMove = function(){			
		$("#mouth").mousemove(function(e){			
			yLocInImage = e.pageY - offset.top; //offset.top gives you the top coordinate measured previously with .offset(). this saying mouselocation x - x location of image. this is finding the distane of the mouse from the image
			frameNumber = parseInt(yLocInImage/interval);
			console.log(frameNumber);
			src = images[frameNumber]; //number in the array
			$(this).attr("src", src); //this = the object to which the code you are looking at right now applies which is mouth in this case

			//check if e.pageY is increasing (if mouse is moving down)
			if(e.pageY > mY){
				// console.log(e.pageY);
				isMovingDown=true;
				//play crunch sound
				if(frameNumber == 30) {
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
});