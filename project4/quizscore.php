<?php
session_start();
include "includes/main.php";
require_once "includes/db.php";

// if( isset( $_POST["submitted"] ) )
//      if( $_POST["submitted"] == 1 ){
$username = select( "username", "user", "username", $_SESSION['username'] );
 // $last_score = select("score", "score", "username", $_SESSION['username'] );

    $answer1 = $_POST['a'];
    $answer2 = $_POST['b'];
    $answer3 = $_POST['c'];
    $answer4 = $_POST['d'];
    $answer5 = $_POST['e'];
    $answer6 = $_POST['f'];

    $score = 0;

    if ($answer1 == "hormone") { 
        $score++; 
    }
    if ($answer2 == "brush") { 
        $score++; 
    }   
    if ($answer3 == "pepsin") { 
        $score++; 
    }
    if ($answer4 == "acid") { 
        $score++; 
    }

    if ($answer5 == "jujunom") { 
        $score++; 
    }

    if ($answer5 == "large_intestine") { 
        $score++; 
    }

// }
echo $score;
echo $username;

echo ' before';
delete("score", "username", $username);
insert_score($username, $score);

echo ' after';

header( "Location: ./quiz.php" );

