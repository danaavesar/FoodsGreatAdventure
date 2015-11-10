// $('body').bind('keyup', function(){
//   console.log('hello');
// });
 var scrollLeftAmount = 500;
 var scrollTopAmount = 400;
<!--//mouth-->
//$(window).load(function(){
    // drag and drop food
    var dropped = false;
    var whichDropped;
    var whichDropped; 
    var overMouth = false;
    var targetPosX;
    var targetPosY;

    $(function(){
      $('li').draggable({ 
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

    //mouth
    var pp= "images/mouth/mouth_";
    var images = new Array();
    var unWindBacktoZero = false;


    //load images into array
    for(var i=0; i<35; i++){
      if(i<10){
      images.push(pp+'0'+i+'.png');
      src = images[i];
      }
      else{
        images.push(pp+ i +'.png');
        src = images[i];
      }
    }

    //make a million unnecissary variables
    var offset = $("#mouth").offset(); //.offset = retrieve pos relative to doc
    // console.log(offset);
    var numberOfFrames = images.length; //34
    var heightOfImage = $("#mouth").height();
    console.log(heightOfImage);
    var yLocInImage;
    var frameNumber = 0; //what pic youre on in the animation sequence
    var interval = heightOfImage/numberOfFrames; //ex: 340px image, so then every ten px changes to a new frame

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
        // console.log(e.pageY);
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
      });
    };


<!--//Saliva-->
  
      //saliva svg group
      var saliva_top = Snap.select('#saliva_top');
      var saliva_bottom= Snap.select('#saliva_bottom');
      //select glands
      var top_gland = saliva_top.select('#top_gland');
      var bottom_gland= saliva_bottom.select('#bottom_gland');
      var bottom_rightGland = saliva_bottom.select('#bottom_rightGland');
      //select masks
      var saliva_maskTop = saliva_top.select("#saliva_maskTop");
      var saliva_maskBottom = saliva_bottom.select("#saliva_maskBottom");
      //slect saliva and apply masks
      var salivaTop = saliva_top.select("#salivaTop");
      var salivaBottom = saliva_bottom.select("#salivaBottom");
      var len=saliva_maskTop.getTotalLength();
      var len2=saliva_maskBottom.getTotalLength();
      salivaBottom.attr({ mask: saliva_maskBottom});
      salivaTop.attr({ mask: saliva_maskTop }); 

      
      //top gland
      function squeeze_top_gland() {
        top_gland.animate({d:"M257.2,80.5c0.6-5.9-0.2-11.3-2.1-15.6c1.3-3.6,2.3-7.4,2.7-11.5c2.1-19.8-8.4-37.1-23.4-38.7c-0.9-0.1-1.7-0.1-2.6-0.1c-1.7-7.4-6.4-12.9-12.6-13.6c-7.4-0.8-14.3,5.7-16.7,15c-13.7,0.4-25.7,12.8-27.5,29.3c-0.3,2.4-0.3,4.7-0.1,6.9c-6.7,2.6-12,9.8-12.9,18.8c-0.2,2.4-0.2,4.6,0.2,6.8c-6.8-0.5-13,6.5-14,15.8c-1,9.5,3.8,17.7,10.6,18.5c1.9,0.2,3.8-0.2,5.5-1.1c-0.7,1.9-1.2,3.9-1.4,6.1c-1.2,11.5,5.9,21.7,15.9,22.8c0,0,0.1,0,0.1,0c-0.1,8.5,4.7,15.6,11.3,16.3c7.1,0.8,13.6-6.1,14.8-15.3c0.5,0.2,1.1,0.4,1.7,0.4c5.9,0.6,11.6-7.2,12.7-17.5c0.2-1.4,0.2-2.8,0.2-4.2c1.9,2.4,4.1,3.9,6.7,4.1c7.5,0.8,14.9-9.1,17.2-22.7C250.2,99.9,256,91.4,257.2,80.5z"}, 500, mina.easeout); 
      }

      function release_top_gland(){
          top_gland.animate({d:"M274.6,81.5c0.5-5.9-0.8-11.4-3.5-15.7c1.6-3.5,2.7-7.4,3-11.5c1.8-19.8-12.7-37.3-32.5-39.2c-1.1-0.1-2.3-0.2-3.4-0.1C235.6,7.6,229.1,2,221,1.2c-9.7-0.9-18.5,5.5-21.3,14.8c-18.1,0.2-33.2,12.5-34.7,29c-0.2,2.4-0.1,4.7,0.2,7c-8.7,2.5-15.3,9.7-16.1,18.7c-0.2,2.4,0,4.7,0.5,6.8c-8.9-0.6-16.8,6.3-17.7,15.7c-0.9,9.5,5.8,17.9,14.8,18.7c2.5,0.2,4.9-0.2,7.2-1c-0.9,1.9-1.4,3.9-1.6,6.1c-1.1,11.5,8.8,21.9,22,23.1c0.1,0,0.1,0,0.2,0c0.3,8.5,6.9,15.7,15.6,16.5c9.3,0.9,17.6-5.9,18.7-15.1c0.7,0.2,1.5,0.4,2.2,0.5c7.8,0.7,15-7,15.9-17.4c0.1-1.4,0.1-2.8,0-4.2c2.6,2.4,5.6,3.9,9,4.3c9.9,0.9,19.1-8.9,21.5-22.5C266.3,100.9,273.6,92.4,274.6,81.5z" }, 500, mina.easein); 
      }

      $("#top_gland").mousedown(function(){
        console.log("gland has been clicked");
        squeeze_top_gland();
        squirt_topSaliva();
        $('#saliva_arrows').hide();
        $('#saliva_arrow_bottom').show();
        $('#saliva_info').show("slow", "swing");
        ion.sound.play("squirt_water");
        $('html,body').animate({scrollTop: 100},800);

      });
      
      $("#top_gland").mouseup(function(){
        console.log("gland has been released");
        release_top_gland();
      });

      //bottom gland
      function squeeze_bottom_gland() {
        bottom_gland.animate({d:"M76.7,285.5c-1.5,1.7-2.8,3.4-4.3,4.7c-5.8,5.4-12.2,6.7-19.1,3.8c-1.5-0.6-2.6-0.6-4,0.3c-3.8,2.4-7.4,1.8-10.9-1.2c-1.1-1-2.6-1.7-4-1.8c-10.4-0.4-17.6-11.6-14.4-23c0.8-2.7,2.6-4.9,3.8-7.4c0.5-1,1-2.4,0.8-3.4c-2-9.7-0.2-18.2,6.1-24.7c6.4-6.7,13.9-7.7,21.8-4.5c1.5,0.6,3,1.4,4.3,2.1c2.1-4,3.8-8.3,6.4-11.7c6.7-8.7,15.2-11.2,24.5-8c9.2,3.1,15,10.6,16.6,22.2c0.4,3,1.3,4.1,3.9,4.6c6.2,1.2,10.7,5.4,12.4,13c0.7,3,2.4,3.3,4.2,3.9c11.3,4.3,15.8,20.4,8.6,31.3c-5.9,9.1-17,11.2-24.7,4.2c-2.6-2.3-4.1-2.2-6.6,0c-7,6.1-16,5.3-22.6-1.5C78.7,287.5,77.8,286.6,76.7,285.5z"}, 500, mina.easeout);  
      }


      function release_bottom_gland(){
          bottom_gland.animate({d: "M79.9,286.5c-1.9,1.7-3.4,3.4-5.2,4.7c-7,5.4-14.8,6.7-23.1,3.8c-1.8-0.6-3.2-0.6-4.9,0.3c-4.6,2.4-9,1.8-13.2-1.2c-1.4-1-3.2-1.7-4.8-1.8c-12.6-0.4-21.4-11.6-17.5-23c0.9-2.7,3.2-4.9,4.6-7.4c0.6-1,1.2-2.4,1-3.4c-2.4-9.7-0.2-18.2,7.4-24.7c7.8-6.7,16.8-7.7,26.4-4.5c1.8,0.6,3.6,1.4,5.2,2.1c2.6-4,4.7-8.3,7.8-11.7c8.1-8.7,18.4-11.2,29.7-8c11.2,3.1,18.2,10.6,20.2,22.2c0.5,3,1.6,4.1,4.7,4.6c7.5,1.2,13,5.4,15,13c0.8,3,2.9,3.3,5.1,3.9c13.7,4.3,19.1,20.4,10.5,31.3c-7.2,9.1-20.6,11.2-29.9,4.2c-3.1-2.3-5-2.2-8,0c-8.5,6.1-19.4,5.3-27.5-1.5C82.3,288.5,81.2,287.6,79.9,286.5z" }, 500, mina.easein); 
      }

      $("#bottom_gland").mousedown(function(){
        console.log("gland has been clicked");
        squeeze_bottom_gland();
        squirt_bottomSaliva();
        $('#saliva_arrow_bottom2').hide();
        $('#saliva_info').show("slow", "swing");
        $('#epi_clicker').show("slow", "swing");
        ion.sound.play("squirt_water");
      });
      
      $("#bottom_gland").mouseup(function(){
        console.log("gland has been released");
        release_bottom_gland();
        $('#saliva_info').hide("slow", "swing");
      });

      $("#bottom_rightGland").mousedown(function(){
        $('#saliva_arrow_bottom').hide();
        $('#saliva_arrow_bottom2').show();
      });

      //bottom right gland
      function squeeze_bottomRight_gland() {
        bottom_rightGland.animate({d:"M276.8,175.2c-0.3,0-0.5,0-0.8,0c-3.7-10.2-13.7-17.6-25.5-17.6c-13.3,0-24.4,9.4-26.6,21.8c-1.8-0.3-3.7-0.5-5.7-0.5c-16.2,0-29.2,11.2-29.2,25.1c0,13.9,13.1,25.1,29.2,25.1c7,0,13.4-2.1,18.4-5.6c3.9,2.7,9,4.4,14.6,4.4c11.3,0,20.6-6.7,21.7-15.4c1.2,0.2,2.5,0.3,3.8,0.3c12,0,21.7-8.4,21.7-18.8S288.8,175.2,276.8,175.2z"}, 500, mina.easeout); 
      }


      function release_bottomRight_gland(){
          bottom_rightGland.animate({d:"M276.8,170.7c-0.3,0-0.5,0-0.8,0c-3.7-12.2-13.7-21-25.5-21c-13.3,0-24.4,11.3-26.6,26.1c-1.8-0.4-3.7-0.6-5.7-0.6c-16.2,0-29.2,13.4-29.2,30c0,16.6,13.1,30,29.2,30c7,0,13.4-2.5,18.4-6.7c3.9,3.2,9,5.2,14.6,5.2c11.3,0,20.6-8.1,21.7-18.4c1.2,0.2,2.5,0.4,3.8,0.4c12,0,21.7-10.1,21.7-22.5S288.8,170.7,276.8,170.7z" }, 500, mina.easein); 
      }

      $("#bottom_rightGland").mousedown(function(){
        console.log("gland has been clicked");
        squeeze_bottomRight_gland();
        squirt_bottomSaliva();
        ion.sound.play("squirt_water");
    
      });
      
      $("#bottom_rightGland").mouseup(function(){
        console.log("gland has been released");
        release_bottomRight_gland();
      });


      function squirt_topSaliva(){
        saliva_maskTop.attr({
          stroke: '#fff',
          "stroke-dasharray": len,
          "stroke-dashoffset": len
        }).animate({"stroke-dashoffset": "0"}, 800, mina.easeout);
        

      }

      function squirt_bottomSaliva(){
        saliva_maskBottom.attr({
          stroke: '#fff',
          "stroke-dasharray": len2,
          "stroke-dashoffset": len2
        }).animate({"stroke-dashoffset": "0"}, 1000, mina.easeout);
        

      }



<!--//esoph -->

  	var epiglottisSvg = Snap.select('#epiglottisSvg');
  	var epiglottis = epiglottisSvg.select('#epiglottis');
  	var sphincterSVG = Snap.select('#sphincterSVG');
    var sphincter = sphincterSVG.select('#sphincter');
    var sph_toggled = true;
  	//epiglottis
  	$("#epi_target").click(function(){
  		//animate
  		  	epiglottis.animate({
  				transform: "r180,80,120"
  			}, 5, mina.elastic);
        //play sound
  			ion.sound.play("gate_open");
        //show key buttons
  			var src = $("#key_buttons").attr('src');
		  	$("#key_buttons").attr("src", src.replace('.gif', '_animated.gif'));
		  	src = $("#esoph").attr('src');
		  	$("#esoph").attr("src", src.replace('esoph_000.png', 'esoph_03.png'));
		  	console.log(src);
        $('#epi_clicker').hide();
        $('#epiglottis_info').show("slow", "swing");
        $('#key_buttons').show();
        //scroll_left
        $('html,body').animate({
          scrollLeft: scrollLeftAmount
        },2000);
  	});
   

    $("#sphincterSVG").click(function(){
      if(sph_toggled) {
        sphincter.animate({
          transform: "r-30, 270, 300"
        }, 5, mina.elastic);
        ion.sound.play("gate_open");
        $("#sphincter_arrow").hide();
        $("#sphincter_info").show("slow", "swing");
      }

      else {
        sphincter.animate({
          transform: "r1, 270, 300"
        }, 5, mina.elastic);
        ion.sound.play("gate_open");
        $("#sphincter_info").hide("slow", "swing");
        $("#stomach_info").show("slow", "swing");
        setTimeout(function(){ 
          $("#stomach_info").hide(); 
          $("#stomach_info2").show();
          $("#hormone_arrows").show();
        }, 3000);
      }
      sph_toggled = !sph_toggled;
    }); 

    

  	//esophogus
  	var pp= "images/esoph/esoph_";
	var eImages = new Array();
	var unWindBacktoZero = false;
	

	//load images into array
	for(var i=0; i<59; i++){
		if(i<10){
			eImages.push(pp+'0'+i+'.png');
			src = eImages[i];
			//$("#esoph").attr("src", src); //finds the attribute src and replaces it with the var src
		}
		else{
			eImages.push(pp+ i +'.png');
			src = eImages[i];
			//$("#esoph").attr("src", src);
		}
	}

	//make a million unnecissary variables
	var eOffset = $("#esoph").offset(); //.offset = retrieve pos relative to doc
	var eNumberOfFrames = eImages.length;
	var eHeight = $("#esoph").height();
	var dTriggered = 0;
	var c = 0;
	var frameNumber = 0; //what pic youre on in the animation sequence
	var interval = eHeight/eNumberOfFrames; //ex: 340px image, so then every ten px changes to a new frame */

	//animate when down arrow pressed
	$('body').keydown(function(e){
    /*$('body').scrollTop(dTriggered*400)*/
		//every time i press d src runs four frames
		if(event.which == 68){
			e.preventDefault();
      console.log('keydown');
		 	c = dTriggered*4;
		 	dTriggered++;
      //show info at certain points
      if(dTriggered == 1) {
        $('#epiglottis_info').hide("slow", "swing");
      }
      if(dTriggered == 10) {
        $('#esoph_info').show("slow", "swing");
      }

      if(dTriggered == 15){
         $('#sphincter_arrow').show();
      }
      //play sound on swallow
      if(dTriggered % 2 !== 0){
        console.log('even');
        ion.sound.play("swallow");
      }
		 	console.log(dTriggered);
			for(i=c; i<c+4; i++){
				src=eImages[i];
				$("#esoph").attr("src", src);
				
			}	
      //scroll
      if(dTriggered < 5){
        scrollLeftAmount += 20;
        $('html,body').animate({scrollLeft: scrollLeftAmount},800);
      }
      if(dTriggered > 5){
        scrollTopAmount += 80;
         $('html,body').animate({scrollTop: scrollTopAmount},800);
      }
		}
		
		/*function increaseDBy1(){
			c++;
		}*/
	});


<!--//stomach-->

  	//make variables
  	var mouseX;
  	var mouseY;
  	var toggled = true;
    var container_pos = $('#organ_container').offset();
    var hormone_width = $('.hormone').width();
    var hormone_height = $('.hormone').height(); 

    var spaceBarPushed=0;
    var enterPushed = 0;
    var pepsinArray = new Array();
    var numberOfPepsins = pepsinArray.length;
    var pepsin = new Image();
    pepsin.src = 'images/scissors.gif';
    $(pepsin).addClass("pepsin");
    var pepsinClone;
    var mouseXofSpaceBar;
    var mouseYofSpaceBar;
     var clicked = 0;

  	//click
  	$(".hormone").on('click', function(c){
      var hormone = $(this);
      clicked ++;
      console.log(clicked);
  		//follow mouse
  		if(toggled) {
      			//get mouse position when over the stomach and move mouse
      			$("#stomach").mousemove(function(e){
      				mouseX = e.pageX;
      				mouseY = e.pageY;	
      				//follow
        				$(hormone).css({
        					"top":mouseY - container_pos.top - hormone_height,
        					"left":mouseX - container_pos.left - hormone_width
      				  }); 
      			//}); //this is where the mousemove function ended

            });// NEW END mousemove

        $("#hormone_arrows").hide();
        $("#stomach_info2").hide("slow", "swing");
        if (clicked == 1){
          $("#hormone_info").show("slow", "swing");
          $("#space_bar").show();
        }
      }
      else { // if toggle is false
            var currentLocX = c.pageX;
            var currentLocY = c.pageY;
             console.log(currentLocX);
            $("#stomach").mousemove(function(){
              $(hormone).css({
                //either last location, or location of click
                  "top": currentLocY - container_pos.top - hormone_height,
                  "left": currentLocX - container_pos.left - hormone_width
              });
            });

      }
      toggled = !toggled
    }); 
  	
//press sspace
$('body').keydown(function(k){

    k.preventDefault();
    k.stopPropagation();
    if(event.which == 32){ //space bar
      spaceBarPushed++;
      console.log('press');
      shootPepsin(mouseX, mouseY);
      if(spaceBarPushed == 1){
        $("#pepsin_info").show("slow", "swing");
        $("#hormone_info").hide("slow", "swing");
      }

      if(spaceBarPushed == 6) {
        $("#enter_button").show();
        $("#pepsin_info").hide("slow", "swing");
        $("#space_bar").hide();
      }
    }

    if(event.which == 13){ //enter
      enterPushed ++;
      event.preventDefault();
      shootAcid(mouseX, mouseY);

      $("#pepsin_info").hide("slow", "swing");
      $("#acid_info").show("slow", "swing");
      $("#space_bar").hide();

      if(enterPushed == 6){
        $("#chyme_arrow").show();
        $("#enter_button").hide();
      }
    }
              //every time i press space
  
}); //end keydown

 //function shootPepsin(){
 function shootPepsin(posX, posY){
        console.log("mouseX = " + posX);
        //make pepsin clone every time you press space
        //load pepsin image in an array
        pepsinClone = $(pepsin).clone(true);
        
        $(pepsinClone).appendTo($("#organ_container"));
        var random = Math.random() * (360 - 0) + 0;
        $(pepsinClone).css({
              // "top": c.pageX, 
              // "left": c.pageY
              "position":"absolute",
              "top": posY, 
              "left": posX,
              "z-index":"10",
               "-ms-transform": 'rotate(' + random + 'deg)',
               "-webkit-transform": 'rotate(' + random + 'deg)', 
               "transform:" : 'rotate(' + random + 'deg)'
        });
        pepsinArray.push(pepsinClone);
        //get location of mouse at space bar keydown
        
        //set this location of the pepsin that was just cloned
         console.log(spaceBarPushed);
          
  }
var acidArray = new Array ();
var acid = new Image();
    acid.src = 'images/pacman.gif';
    $(acid).addClass("acid");
var acidClone;

function shootAcid (posX, posY){
        //make pepsin clone every time you press space
        //load pepsin image in an array
        acidClone = $(acid).clone(true);
        
        $(acidClone).appendTo($("#organ_container"));
        var random = Math.random() * (360 - 0) + 0;
        $(acid).css({
              // "top": c.pageX, 
              // "left": c.pageY
              "position":"absolute",
              "top": posY, 
              "left": posX,
              "z-index":"10",
               "-ms-transform": 'rotate(' + random + 'deg)',
               "-webkit-transform": 'rotate(' + random + 'deg)', 
               "transform:" : 'rotate(' + random + 'deg)'
        });
        acidArray.push(acidClone);

}

  <!--//handle//-->

  
  var ppC= "images/chyme2/chyme2_";
  var cImages = new Array();
  
  //load images into array
  for(var i=1; i<87; i++){
    if(i<10){
      cImages.push(ppC+'0'+i+'.png');
      src = cImages[i];
      
    }
    else{
      cImages.push(ppC+ i +'.png');
      src = cImages[i];
     
    }
  }

  //make a million variables
  var cNumberOfFrames = 20;
  var handleHeight = $('#handleSVG').height();
  var interval = cNumberOfFrames/handleHeight;
  var location;
  var count = 0;
  var cframeNumber = 0;
  

  /*$('#handle').mousedown(function(e){
      for(i=0; i<cNumberOfFrames; i++){
        src=cImages[i];
        $("#chyme").attr("src", src);
      }
  }); */


  //rotate handle 
$('#stomach').mousemove(function(e){
 
 $('#handle').draggable({
    drag: function(event, ui){
      var rotateCSS = 'rotate(' + event.pageY + 'deg)';
      //degree rotated which is the location of the mouse
     
      count ++;
    
      $(this).css({
        '-moz-transform': rotateCSS,
        '-webkit-transform': rotateCSS,
        '-moz-transform-origin': '0% 0%',
        '-webkit-transform-origin': '0% 0%'
      });

     cframeNumber = parseInt((count)/interval);
     
     if (cframeNumber < 21) {
        src = cImages[cframeNumber];
        $("#chyme").attr("src", src);
        console.log(cframeNumber);
      }
     $("#chyme_info").show("slow", "swing");
     $("#acid_info").hide("slow","swing");
    $("#small_int_enter_button").show();

      $("chyme_arrow").hide();
     
    }
  });
   
});

// brushes


//make a million variables



//if you clicked on any brush
$(".brush").click(function(e){
  //get id of the one you clicked on
  var brush = $(this);
  var src = brush.attr('src');
  var b = 0;
  $("#select_brush_arrow").hide();
  $("#brush_border_info").hide("slow", "swing");
  console.log(event.target.id);
  if(src.indexOf('_animated.gif') === -1) {
      switch (event.target.id) {
        case "brush1":
          b=26;                   
          myLoop();                      
          function myLoop () {           
            setTimeout(function () { 
              // console.log(b);         
               b++;                     
                if ( b < 32) {          
                  $("#chyme").attr("src", cImages[b]);
                   myLoop(); 
                   console.log(b);         
                }                       
            }, 100)
          }
        break;

        case "brush2":
           b=32;                   
          myLoop2();                      
          function myLoop2 () {           
            setTimeout(function () { 
              // console.log(b);  
              console.log(b);       
               b++;                     
                if ( b < 42) {          
                  $("#chyme").attr("src", cImages[b]);
                   myLoop2();             //  ..  again which will trigger another 
                }                       
            }, 100)
          }
        break;

        case "brush3":
           b=42;                   
          myLoop3();                      
          function myLoop3 () {           
            setTimeout(function () { 
              // console.log(b);  
              console.log(b);       
               b++;                     
                if ( b < 61) {          
                  $("#chyme").attr("src", cImages[b]);
                   myLoop3();             //  ..  again which will trigger another 
                }                       
            }, 100)
          }
        break;

       case "brush4":
         b=61;                   
        myLoop4();                      
        function myLoop4 () {           
          setTimeout(function () { 
            // console.log(b);  
            console.log(b);       
             b++;                     
              if ( b < 70) {          
                $("#chyme").attr("src", cImages[b]);
                 myLoop4();             //  ..  again which will trigger another 
              }                       
          }, 100)
        }
      break;

      case "brush5":
       b=70;                   
        myLoop5();                      
        function myLoop5 () {           
          setTimeout(function () { 
          // console.log(b);  
          console.log(b);       
           b++;                     
            if ( b < 78) {          
              $("#chyme").attr("src", cImages[b]);
               myLoop5();             //  ..  again which will trigger another 
            }                       
          }, 100)
        }
      break;

      case "brush8":
       b=78;                   
        myLoop8();                      
        function myLoop8 () {           
          setTimeout(function () { 
          // console.log(b);  
          console.log(b);       
           b++;                     
            if ( b < 81) {          
              $("#chyme").attr("src", cImages[b]);
               myLoop8();             //  ..  again which will trigger another 
            }                       
          }, 100)
        }
      break;

      case "brush10":
       b=81;                   
        myLoop10();                      
        function myLoop10 () {           
          setTimeout(function () { 
          // console.log(b);  
          console.log(b);       
           b++;                     
            if ( b < 86) {          
              $("#chyme").attr("src", cImages[b]);
               myLoop10();             //  ..  again which will trigger another 
            }                       
          }, 100)
        }
      $("#bucket_arrow").show();     
    }
  }
  if(src.indexOf('_animated.gif') === -1) {
    src = src.replace('.gif', '_animated.gif');                    
    // myLoop();                      
    // function myLoop () {           
    //   setTimeout(function () {    
    //    // console.log('loop'); 
    //     console.log(cImages[b]);         
    //     b++;                     
    //     if (b < 37) {          
    //        $("#chyme").attr("src", cImages[b]);
    //        myLoop();             //  ..  again which will trigger another 
    //     }                       
    //   }, 100)
    // }
  }                 

  else {
    src = src.replace('_animated.gif', '.gif');
  }
  brush.attr('src', src);

});

// bucket

$("#bucket_target").click(function(){
    var src = $("#bucket").attr('src');
    if(src.indexOf('.gif') === -1) {
      src = src.replace('.png', '.gif'); 
    }
    $("#bucket").attr('src', src);
    $("#chyme").attr("src", cImages[2]);
    setTimeout(function(){
      $(".walker").show();
      $("#jujun_welcome").show("slow", "swing");
    }, 1000);
    $("#bucket_arrow").hide();
    
     setTimeout(function(){
      $("#jujun_info").show("slow", "swing");
      $("#jujun_welcome").hide("slow", "swing");
      $("#sponge_arrow").show();
    }, 6000);

});

$("#small_int_enter_button").click(function(e){
  var b=21;                   
    myLoop();                      
    function myLoop () {           
      setTimeout(function () { 
       // console.log(b);         
        b++;                     
        if ( b < 26) {          
           $("#chyme").attr("src", cImages[b]);
           myLoop();             //  ..  again which will trigger another 
        }                       
      }, 100)
    }
  $(this).hide();
  $("#small_int_welcome").show("slow", "swing");
  $("#chyme_info").hide("slow", "swing");
  setTimeout(function(){
    $("#duo_info").show("slow", "swing");
    $("#small_int_welcome").hide("slow", "swing");
  }, 5000)
});

$("#duo_info").click(function(e){
  $(this).hide("slow", "swing");
  $("#gall_panc_info").show("slow", "swing");
  $("#pancreas_arrow").show();
  $("#gallbladder_arrow").show();
 
});

<!--// other organs // -->
var gallbladderSVG = Snap.select('#gallbladderSVG');
var gallbladder = gallbladderSVG.select('#gallbladder');

var other_organs = Snap.select('#other_organs');
var splat_mask = other_organs.select('#splat_mask');
var splat = other_organs.select('#splat');
var splat_len = splat_mask.getTotalLength();
splat.attr({ mask: splat_mask});



  $('#gallbladder').mousedown(function(){
    gallbladderSqueeze();
    bladderJuiceShoot();
    $("#gallbladder_arrow").hide();
    $("#gall_panc_info").hide("slow", "swing");
  });

  $('#gallbladder').mouseup(function(){
    gallbladderRelease();
      $("#brush_border_info").show("slow", "swing");
      $("#select_brush_arrow").show();
  });

function gallbladderSqueeze(){
  gallbladder.animate({d:"M154.2,178.3c-1.2-20.5-2.8-36.3-5.5-38c-4.9-3.3-39.4-9.9-49.3,1.7c-14.2,8.9-36.4,55.9-49.5,65.7s-26.4,19.9-35.6,11.9c-9.9-13.2-6.8-27.3,0.5-37.3c11-15.1,38.5-38.6,56.6-41.9c18-3.3,29.8-8.4,47.9-18.2c18-9.9,32.8-14.7,29.6-37.7c-3.3-23-13.2-41.1-23-52.5S106.1,5.7,114.3,5.7s32.8,36.1,32.8,36.1s6.5-34.4,13.2-37.7c6.6-3.3,11.5-4.9,9.9,4.9c-1.6,9.9-11.6,34.3-9.9,47.5c1.7,13.2,4.9,100.1,6.5,113.2c0.3,2,0.4,4.1,0.6,6.5L154.2,178.3z"
  }, 500, mina.easeout)
}

function gallbladderRelease(){
  gallbladder.animate({d:"M158.1,177c-1.2-21.1-2.9-37.2-5.6-39c-5.1-3.3-40.4-10.1-50.5,1.7C91.9,151.5,66.7,202,53.2,212s-33.6,26.9-43.6,13.4c-10.1-13.5-15.1-37,0-48.8c15.1-11.8,43.7-38.7,62.3-42.1c18.5-3.3,32-5.1,50.5-15.1c18.5-10.1,33.7-15.1,30.3-38.7s-13.5-42.1-23.5-53.9c-10-11.8-20.4-26.9-12-26.9s33.7,37,33.7,37s6.7-35.3,13.5-38.7c6.8-3.3,11.8-5.1,10.1,5.1s-11.9,35.2-10.1,48.7c1.7,13.5,5.1,102.7,6.7,116.1c0.3,2,0.4,4.2,0.6,6.7L158.1,177z"
  }, 500, mina.easein)
}

function bladderJuiceShoot(){
  setTimeout(function(){
    $('#1bubble').show();
  },100);

 setTimeout(function(){
    $('#2bubble').show();
  },200);
   
 setTimeout(function(){
    $('#3bubble').show();
  },300);

  setTimeout(function(){
    $('#4bubble').show();
  },400);

  setTimeout(function(){
    $('#5bubble').show();
  },500);

   setTimeout(function(){
    $('#6bubble').show();
  },600);

   setTimeout(function(){
    $('#7bubble').show();
  },700);
}

$('#pancreas_button').mousedown(function(){
  squirt_juice();
  $("#gall_panc_info").hide("slow", "swing");
  $("#pancreas_arrow").hide();

});
 
function squirt_juice(){
  splat_mask.attr({
    stroke: '#fff',
    "stroke-dasharray": splat_len,
    "stroke-dashoffset": splat_len
  }).animate({"stroke-dashoffset": "0"}, 800, mina.easeout);

}


 $(function() {
    $("#spongeSVG").draggable();
    $(".walker").droppable({
      drop: function (event, ui) {
        tolerance: "touch: 500px";
        $(this).toggle("highlight");
        spongeUp();
      }
    });
  });



/*
 $("#sponge").mousedown(function(){
  var src = $("#sponge").attr("src");
  src = src.replace(".svg", "_pressed.svg");
  $("#sponge").attr("src", src);
  });

 
 $("#sponge").mouseup(function(){
  var src = $("#sponge").attr("src");
  src = src.replace("_pressed.svg", ".svg");
  $("#sponge").attr("src", src);
  });
*/
   var countSponge =0;
var spongeSVG = Snap.select("#spongeSVG")
var spongePath = spongeSVG.select("#spongePath")
 $("#spongeSVG").mousedown(function(){
     $("#jujun_info").hide("slow", "swing");
     $("#bucket_target").hide();
     countSponge ++;
     if(countSponge == 5) {
      $("#enter_large_int").show();
     }
    //transform="scale(0,.5)"
     spongePath.animate({d:"M1168.4,506.1c3.2,0,6.4,0.4,9.1,1.3v-26.8l-9.3,2.4L846.4,352.8L46.6,521.3l-7-3.8l0,5.3l-4.2,0.9l4.2,2.3l-1,129c0,0,5.4,4.8,14.5,12.3c5.9-13.2,19.3-22.8,34.3-22.8c20.9,0,38,17.1,38,38.2c0,12.3-5.9,23.3-14.5,29.9c13.4,9.7,26.8,19.3,38.6,26.8c1.1,0.4,2.1,1.3,2.7,1.8c0.5-11.4,8-20.2,17.7-20.2c9.6,0,17.7,9.7,17.7,22c0,5.7-1.6,11-4.8,14.9c10.2,4.8,21.4,10.1,32.7,15.4c3.2-7,11.2-11.9,20.9-11.9c12.3,0,22,8.3,22,18c0,4-1.6,7.5-4.3,10.5c11.2,4.8,22.5,9.2,32.7,13.6c1.1-4,2.7-7,5.9-10.1c-4.8-3.5-7.5-8.8-7.5-14.5c0-11,10.7-20.2,24.6-20.2c13.4,0,24.6,8.8,24.6,20.2c0,5.7-2.7,10.5-7.5,14.5c3.8,4,6.4,9.2,6.4,14.9c0,4.4-1.6,8.8-3.8,12.3c8.6,3.5,13.9,5.3,13.9,5.3l10.8-132.3l0.2,0l-11,132.8c0,0,17.7-2.6,46.6-6.6c-0.5-2.2-1.1-4-1.1-6.1c0-12.3,10.7-22,23.6-22c12.9,0,23,9.7,23,21.5c31.6-4.8,68.6-10.5,107.1-16.7c-4.3-4-7-9.7-7-15.8c0-12.3,10.7-22,23.6-22c12.9,0,23.6,9.7,23.6,22c0,3.5-1.1,6.6-2.1,9.7c16.6-2.6,33.2-5.7,49.3-8.3c1.1-11.4,10.7-20.2,23-20.2c9.1,0,17.1,4.8,20.9,12.3c35.9-6.6,69.1-13.6,95.9-19.8c-4.8-3.5-7.5-8.8-7.5-14.5c0-11,10.7-20.2,24.6-20.2s24.6,8.8,24.6,20.2c0,1.3,0,2.6-0.5,3.5c44.5-12.3,99.1-29.9,152.7-47.9c-2.7-4.4-3.8-9.7-3.8-14.9c0-20.2,20.4-36.9,45-36.9c19.3,0,35.4,9.7,41.8,23.7c73.4-25.5,129.6-45.7,129.6-45.7v-7.9c-11.2-1.3-19.3-8.3-19.3-16.7c0-8.8,8-15.8,18.8-16.3l0.5-28.6c-2.7,0.4-5.4,1.3-8,1.3c-16.1,0-28.9-10.5-28.9-23.7C1139.5,516.7,1152.3,506.1,1168.4,506.1z"}, 500, mina.easein);
     $("#sponge_arrow").hide();
     $("#jejun_info").hide("slow", "swing");
    
  });
$("#spongeSVG").mouseup(function(){
    //transform="scale(0,.5)"
    spongeUp();
    
    console.log(count);
  });
    function spongeUp() {
     spongePath.animate({d:"M1168.4,491.8c3.2,0,6.4,0.5,9.1,1.6v-32.7l-9.3,2.9L846.4,304.8L46.6,510.3l-7-4.6l0,6.4l-4.2,1.1l4.2,2.8l-1,157.4c0,0,5.4,5.9,14.5,15c5.9-16.1,19.3-27.9,34.3-27.9c20.9,0,38,20.9,38,46.6c0,15-5.9,28.4-14.5,36.4c13.4,11.8,26.8,23.6,38.6,32.7c1.1,0.5,2.1,1.6,2.7,2.1c0.5-13.9,8-24.6,17.7-24.6c9.6,0,17.7,11.8,17.7,26.8c0,7-1.6,13.4-4.8,18.2c10.2,5.9,21.4,12.3,32.7,18.8c3.2-8.6,11.2-14.5,20.9-14.5c12.3,0,22,10.2,22,22c0,4.8-1.6,9.1-4.3,12.9c11.2,5.9,22.5,11.2,32.7,16.6c1.1-4.8,2.7-8.6,5.9-12.3c-4.8-4.3-7.5-10.7-7.5-17.7c0-13.4,10.7-24.6,24.6-24.6c13.4,0,24.6,10.7,24.6,24.6c0,7-2.7,12.9-7.5,17.7c3.8,4.8,6.4,11.2,6.4,18.2c0,5.4-1.6,10.7-3.8,15c8.6,4.3,13.9,6.4,13.9,6.4l10.8-161.4l0.2-0.1l-11,162c0,0,17.7-3.2,46.6-8c-0.5-2.7-1.1-4.8-1.1-7.5c0-15,10.7-26.8,23.6-26.8c12.9,0,23,11.8,23,26.2c31.6-5.9,68.6-12.9,107.1-20.4c-4.3-4.8-7-11.8-7-19.3c0-15,10.7-26.8,23.6-26.8c12.9,0,23.6,11.8,23.6,26.8c0,4.3-1.1,8-2.1,11.8c16.6-3.2,33.2-7,49.3-10.2c1.1-13.9,10.7-24.6,23-24.6c9.1,0,17.1,5.9,20.9,15c35.9-8,69.1-16.6,95.9-24.1c-4.8-4.3-7.5-10.7-7.5-17.7c0-13.4,10.7-24.6,24.6-24.6s24.6,10.7,24.6,24.6c0,1.6,0,3.2-0.5,4.3c44.5-15,99.1-36.4,152.7-58.4c-2.7-5.4-3.8-11.8-3.8-18.2c0-24.6,20.4-45,45-45c19.3,0,35.4,11.8,41.8,28.9c73.4-31.1,129.6-55.7,129.6-55.7V623c-11.2-1.6-19.3-10.2-19.3-20.4c0-10.7,8-19.3,18.8-19.8l0.5-34.8c-2.7,0.5-5.4,1.6-8,1.6c-16.1,0-28.9-12.9-28.9-28.9C1139.5,504.6,1152.3,491.8,1168.4,491.8z"}, 200, mina.easein);
   }

// info

$('#teeth_info').click(function(){
  $(this).fadeToggle("slow", "swing");
  $('#saliva_arrows').show();
  $('#initial_click_arrow').hide();
  $('html,body').animate({scrollLeft: 100},800);
});

var fanCount=0;
$(".fan").click(function(f){
  fanCount ++;
  console.log(fanCount);
  if (fanCount == 1) {
    $("#large_int_welcome").hide();
    $("#large_intesine_info").show();
  }
  var fan = $(this);
  var src = fan.attr('src');
  if(src.indexOf('_animated.gif') === -1) {
    src = src.replace('.png', '_animated.gif');                    
  }           

  else {
    src = src.replace('_animated.gif', '.png');
  }
  fan.attr('src', src);

 
});

$("#enter_large_int").click(function(){
  $(this).hide();

  $("#large_int_welcome").show("swing", "slow");
 
});


$("#large_int_welcome").click(function(){
    $("#fan_instruction").show();
});

