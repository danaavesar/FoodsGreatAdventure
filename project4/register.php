<?php

include "includes/main.php";

// If the variable “submitted” was sent in the form,
if( isset( $_POST["submitted"] ) )
   // and, it’s equal to 1, meaning that it was actually submitted,
   if( $_POST["submitted"] == 1 )
      // and, every variable that is part of the form was actually received by
      // this file, meaning that the form was not hi- or side-jacked,
      if( white_list() )
         // and, both the username and password contain at least one character
         // (this is a redundancy check, since each form variable is marked
         // as “required”),
         if( strlen( $_POST['username'] ) > 0 && strlen( $_POST['password'] ) > 0 ) {
            // then proceed to process the username and password.

            // 1. Remove whitespace surrounding the username.
            // 2. Convert <, >, ', and " to their respective HTML entities
            // 3. Handle HTML5 code
            // 4. Use the UTF-8 character set
            $username = htmlentities( trim( $_POST['username'] ), ENT_QUOTES | 'ENT_HTML5', "UTF-8" );

            // Remove whitespace surrounding the password, then assign the result to the $password variable
            $password = trim( $_POST['password'] );

            // If the username does not exist in our database
            if( !does_user_exist( $username ) ) {

               // register her/him
               register_new_user( $username, $password );

               // Display the code in the file “register_sucess.inc”
               require_once "includes/register_success.inc";

               // Wait 5 seconds, then redirect the user back to the login
               // version of the home page.
               header( "Refresh: 5; ./mouth_dragdrop2.php?action=login");
            }
            else {
               // The user does not exist, so display the code in the file
               // “register_error.inc”
               require_once "includes/register_error.inc";

               // Wait 4 seconds, then redirect the user back to the
               // registration version of the home page.
               header( "Refresh: 4; ./mouth_dragdrop2.php?action=register");
            }
         }
