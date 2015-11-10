$(window).load(function(){
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

    var pp = "images/water/water_bottle_left/water_bottle_left_";
    var pp2 = "images/water/water_bottle_right/water_bottle_right_";
    var imagesWaterBottleLeft = new Array();
    var imagesWaterBottleRight = new Array();
    //load images into array
    for(var i=0; i<39; i++){
      if(i<10){
        imagesWaterBottleLeft.push(pp+'0'+i+'.png');
      }
      else{
        imagesWaterBottleLeft.push(pp+ i +'.png');
      }
    }
     for(var i=0; i<37; i++){
      if(i<10){
        imagesWaterBottleRight.push(pp2+'0'+i+'.png');
      }
      else{
        imagesWaterBottleRight.push(pp2+ i +'.png');
      }
    }

  $(".fan").click(function(e){
    switch (e.target.id){
      case "fan3":
        var i = 0;
        setInterval(function(){
          if(i < 10){
            i++;
            $('#water_bottleLeft').attr('src', imagesWaterBottleLeft[i]);
          }
        },42);
      break;

      case "fan2":
        i=10;
        setInterval(function(){
          if(i < 20){
            i++;
            $('#water_bottleLeft').attr('src', imagesWaterBottleLeft[i]);
          }
        },42);
      break;

      case "fan4":
        i=20;
        setInterval(function(){
          if(i < 30){
            i++;
            $('#water_bottleLeft').attr('src', imagesWaterBottleLeft[i]);
          }
        },42);
      break;

      case "fanStand2":
        i=30;
        setInterval(function(){
          if(i < 39){
            i++;
            $('#water_bottleLeft').attr('src', imagesWaterBottleLeft[i]);
          }
        },42);
      break;

      //right water bottle
      case "fanStand2":
        i = 0;
        setInterval(function(){
          if(i < 10){
            i++;
            $('#water_bottle_right').attr('src', imagesWaterBottleRight[i]);
          }
        },42);
      break;

      case "fanStand1":
        i = 0;
        setInterval(function(){
          if(i < 7){
            i++;
            $('#water_bottle_right').attr('src', imagesWaterBottleRight[i]);
          }
        },42);
      break;

      case "fan6":
        i = 7;
        setInterval(function(){
          if(i < 15){
            i++;
            $('#water_bottle_right').attr('src', imagesWaterBottleRight[i]);
          }
        },42);
      break;

      case "fan5":
        i = 15;
        setInterval(function(){
          if(i < 23){
            i++;
            $('#water_bottle_right').attr('src', imagesWaterBottleRight[i]);
          }
        },42);
      break;

      case "fan1":
        i = 23;
        setInterval(function(){
          if(i < 36){
            i++;
            $('#water_bottle_right').attr('src', imagesWaterBottleRight[i]);
          }
        },42);
      break;
    }

  
  });




  $("#enter_large_int").click(function(){
    $(this).hide();

    $("#large_int_welcome").show("swing", "slow");
   
  });


  $("#large_int_welcome").click(function(){
      $("#fan_instruction").show();
  });

  $('.fan').draggable();
});