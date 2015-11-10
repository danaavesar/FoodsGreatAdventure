$(document).ready(function(){
  var link= "images/chyme4/chyme";
  var cImages = new Array();
  //load images into array
  for(var i=1; i<87; i++){
      cImages.push(link+ i+'.png');
      src = cImages[i];
  }

  $(".brush").click(function(e){

    var brush = $(this);
    var src = brush.attr('src');
    if(src.indexOf('_animated.gif') === -1) {
      src = src.replace('.gif', '_animated.gif');                    
    }else {
      src = src.replace('_animated.gif', '.gif');
    }
    brush.attr('src', src);

    //hide magnifyn and info
    $("#containment").hide();
    $("#brush_border_info").hide();
    $("#select_brush_arrow").hide();
    $("#brush_border_info").hide("slow", "swing");
    //show arrow for bucket
    //get id of the one you clicked on
    if(src.indexOf('_animated.gif') != -1){
      switch(e.target.id){
        case "brush1":
          var i=26;
          setInterval(function(){
            if(i <32){
              i++;
              console.log(i);
              $("#chyme").attr('src', cImages[i])
            }
          },20);
        break;

        case "brush2":
          i = 32;
          setInterval(function(){
            if(i <42){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
          $("#brush2_arrow").hide();
        break;

        case "brush3":
          i = 42;
          setInterval(function(){
            if(i <62){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
          $("#brush3_arrow").hide(); 
          $("#brush4_arrow").show(); 
        break;

        case "brush4":
          i=61;
          setInterval(function(){
            if(i <70){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
          $("#brush5_arrow").hide(); 
          $("#brush7_arrow").show(); 
        break;

        case "brush5":
          i=70;
          setInterval(function(){
            if(i <78){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
        break;

        case "brush6":
          $("#brush4_arrow").hide(); 
          $("#brush5_arrow").show();
        break;

        case "brush8":
          i=78;
          setInterval(function(){
            if(i <81){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
        break;

        case "brush10":
          i=81;
          setInterval(function(){
            if(i <86){
              i++;
              $("#chyme").attr('src', cImages[i])
            }
          },20);
          $("#bucket_arrow").show();  
          $("#brush7_arrow").hide();   
          $('html,body').animate({scrollTop: 3200},800);
          $('html,body').animate({scrollLeft: 500},800);
        break;

      }
    }

  });

  <!--//handle//-->
    var cNumberOfFrames = 20;
    var handleHeight = $('#handleSVG').height();
    var interval = cNumberOfFrames/handleHeight;
    var location;
    var count = 0;
    var cframeNumber = 0;
    $('#stomach').mousemove(function(e){
   
   // $('#handle').draggable({
   //    drag: function(event, ui){
   //      var rotateCSS = 'rotate(' + e.pageY + 'deg)';
   //      //degree rotated which is the location of the mouse
       
   //      count ++;
      
   //      $(this).css({
   //        '-moz-transform': rotateCSS,
   //        '-webkit-transform': rotateCSS,
   //        '-moz-transform-origin': '0% 0%',
   //        '-webkit-transform-origin': '0% 0%'
   //      });

   //     cframeNumber = parseInt((count)/interval);
       
   //     if (cframeNumber < 21) {
   //        src = cImages[cframeNumber];
   //        $("#chyme").attr("src", src);
   //        console.log(cframeNumber);
   //      }
   //     $("#chyme_info").show("slow", "swing");
   //     $("#acid_info").hide("slow","swing");
   //      $("#small_int_enter_button").show();

   //      $("chyme_arrow").hide();
       
   //    },
   //    stop: function(event,ui){
   //      $('html,body').animate({scrollLeft: 400},800);
   //    }
   //  });
    //  $('#handle').draggable({
    //   drag: function(event, ui){
    //     var rotateCSS = 'rotate(' + e.pageY + 'deg)';
    //     //degree rotated which is the location of the mouse
       
    //     count ++;
      
    //     $(this).css({
    //       '-moz-transform': rotateCSS,
    //       '-webkit-transform': rotateCSS,
    //       '-moz-transform-origin': '0% 0%',
    //       '-webkit-transform-origin': '0% 0%'
    //     });

    //    cframeNumber = parseInt((count)/interval);
       
    //    if (cframeNumber < 21) {
    //       src = cImages[cframeNumber];
    //       $("#chyme").attr("src", src);
    //       console.log(cframeNumber);
    //     }
    //    $("#chyme_info").show("slow", "swing");
    //    $("#acid_info").hide("slow","swing");
    //     $("#small_int_enter_button").show();

    //     $("chyme_arrow").hide();
       
    //   },
    //   stop: function(event,ui){
    //     $('html,body').animate({scrollLeft: 400},800);
    //   }
    // });
    var params = {
      start: function(event, ui){

      },

      stop: function(event, ui){
        $('html,body').animate({scrollLeft: 400},800);
      },
      rotationCenterX: 25.0, 
      rotationCenterY: 75.0
    }

    $('#handleSVG').rotatable(params);
  });

    

});