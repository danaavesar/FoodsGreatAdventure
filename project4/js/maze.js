var path = "M618,447c0,0,25,39,65,42s69,10,93-12s40-53,53-83s16-59,33-43s51,64,72,54s27-29,28-38s-10.4-48.6-11-67c-1-29,47-47,66,8c0,0,9,91,9,186s-19,159-34,175s-45,62-102,42s-143-94-195-89s-86,45-57,60s61-11,86,32s12,102-3,119s-80,64-142,63s-215-65-248-70s-68-10-96,0s-54,17-54,17",
  pathAnimator = new PathAnimator( path ),  // initiate a new pathAnimator object
  objToAnimate = document.getElementById("nutrient_protein"),  // The object that will move along the path
 //objToAnimate = $("#nutrient_protein"),
  speed = 6,      // seconds that will take going through the whole path
  reverse = false,  // go back of forward along the path
  startOffset = 0   // between 0% to 100%
  
pathAnimator.start( speed, step, reverse, startOffset, finish);

function step( point, angle ){
  // do something every "frame" with: point.x, point.y & angle
 objToAnimate.style.cssText = "top:" + point.y + "px;" +
                "left:" + point.x + 1000 + "px;" +
                "transform:rotate("+ angle +"deg);" +
                "-webkit-transform:rotate("+ angle +"deg);";
     /*           
    objToAnimate.css({
      "top:" + point.y + "px;" +
                "left:" + point.x + "px;" +
                "transform:rotate("+ angle +"deg);" +
                "-webkit-transform:rotate("+ angle +"deg);"
    }); */
}

function finish(){
  // do something when animation is done
}