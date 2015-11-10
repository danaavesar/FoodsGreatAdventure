var scissors_left;
var scissors_right;
var diameter = 100; 
var ballPosX = 0 + diameter/2;
var ballPosY = 0 + diameter/2;
var ballVelX = 5; //this affects position
var ballVelY = 5;
var accX = 1; //this affects velocity
var accY = .5;
var scissors_array = [];


var bounciness = .5;

function preload(){
	// img = loadImage("food.png");
	scissors_left = loadImage("test/scissors_left_small.png");
	scissors_right = loadImage("test/scissors_right_small.png");


}
function setup(){
	var myCanvas = createCanvas(600,700);
  myCanvas.parent('canvas');
  angleMode(degrees);

}

function draw(){

 // velX  += accX;
 // ballVelY += accY;
	ballPosX += ballVelX;
	 ballPosY += ballVelY;
	if(ballPosX + diameter/2 > windowWidth){
		ballPosX = windowWidth - diameter/2; //reset the position to the edge
		ballVelX *= -bounciness;
	}

	if(ballPosX - diameter/2 <0){
		ballPosX = diameter/2;
		ballVelX *= -bounciness;
	}

	if(ballPosY+ diameter/2 > windowHeight){
		ballPosY = windowHeight - diameter/2;
		ballVelY *= -bounciness;
	}
	if(ballPosY + diameter/2 <0){
		ballPosY = 0 - diameter/2;
		ballVelY *= -bounciness;
	}
	ellipse(ballPosX, ballPosY, diameter, diameter);

	//draw scissors
	//if(scissors_array.length != 0){
		for(var i =0; i < scissors_array.length; i++){
			scissors_array[i].update();
			scissors_array[i].create();
			
		}
	//}
		
  	

}

function mouseReleased(){
	 for(var i =0; i < 3; i++ ){
  		var tempScissors = new Scissors(mouseX, mouseY);
  		scissors_array.push(tempScissors);
  	}
}

function Scissors(_mouseX, _mouseY){
	//variables
	var pos = new p5.Vector(_mouseX, _mouseY);
	var frc = new p5.Vector(0,0);
	var vel = new p5.Vector(random(-3.9,3.9),random(-3.9,3.9));
	var drag = random(.85, .998);
	var angle = random(0,360);
	
	this.create = function(){
		push();
			translate(pos.x, pos.y);
			rotate(angle);
			image(scissors_left, 0, 0);
		pop();
		push();
			translate(pos.x, pos.y);
			rotate(angle);
			image(scissors_right, 0, 0);		

		pop();

	}

	this.update = function(){
		//reset force
		frc.x = 0;
		frc.y = 0;
		var diff = new p5.Vector();
		//the acceleration is the ballposition minus the position of the scissors
		frc.x = ballPosX - pos.x;
		frc.y = ballPosY - pos.y;
		frc.normalize(0,1);// we disregard how close it actually is and make it all in ascale of 1
		
		vel.x *= drag;
		vel.y *= drag;

		vel.x += frc.x *.8 ;
		vel.y += frc.y *.8;

  		pos.x += vel.x;
		pos.y += vel.y;
		

	
	}
}