<?php
session_start();

include "includes/main.php";

if( isset( $_POST["submitted"] ) )
   if( $_POST["submitted"] == 1 )
      if( white_list() )
         if( strlen( $_POST['username'] ) > 0 && strlen( $_POST['password'] ) > 0 ) {
            $username = htmlentities( trim( $_POST['username'] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" );
            $password = trim( $_POST['password'] );

            if( authenticate_user( $username, $password ) ) {
               $_SESSION['valid'] = TRUE;
               $_SESSION['username'] = $username;
               header( "Location: quiz.php");
            }
            else {
               require_once "includes/login_error.inc";
               header( "Refresh: 5; ./quiz_login.php?action=login");
            }
         }
