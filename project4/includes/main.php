<?php
/* ===================================================================
   WHITE LIST
   ================================================================ */
function white_list()
{
   $state = false;
   $count = 0;
   $whitelist = array( "username", "password", "submitted" );

   if( isset( $_POST ) )
      foreach( $_POST as $key => $value )
         if( in_array( $key, $whitelist ) )
            $count++;

   if( $count == count( $_POST ) )
      $state = true;

   return $state;
}

/* ===================================================================
   DOES USER EXIST
   ================================================================ */
function does_user_exist( $username )
{
   try {
      require_once "config.php";

      $user_exists = FALSE;

      $db = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER, DBPASS );

      $statement = $db->prepare("SELECT username FROM user WHERE username = :username");
      $statement->execute( array( 'username' => $username ) );

      while( $row = $statement->fetch() ) {
         if( $row['username'] == $username ) {
            $user_exists = TRUE;
            break;
         }
      }

      $statement = null;

      return $user_exists;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   AUTHENTICATE USER
   ================================================================ */
function authenticate_user( $username, $password )
{
   try {
      require_once "config.php";
      
      $db = new PDO( "mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS );
      $statement = $db->prepare("SELECT password, salt FROM user WHERE username=:username");
      $statement->execute( array( 'username' => $username ) );
      $row = $statement->fetch();
      $statement = null;

      if( md5( $password . $row['salt'] ) == $row['password'] )
         $state = TRUE;
      else
         $state = FALSE;

      return $state;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   INSERT NEW FILE
   ================================================================ */
function insert_new_file( $username, $path, $name, $type )
{
   try {
      require_once "config.php";

      $connection = new PDO( "mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS );
      $statement = $connection -> prepare( "INSERT INTO file (username,path,name,format) VALUES (:username,:path,:name,:format)" );
      $statement -> execute( array(
         'username' => $username,
         'path'     => $path,
         'name'     => $name,
         'format'   => $type ) );

      $statement = null;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   REGISTER NEW USER
   ================================================================ */
function register_new_user( $username, $password )
{
   try {
      require_once "includes/config.php";

      $salt = substr( md5( rand( 0, 65536 ) ), 0, 8 );

      $connection = new PDO( "mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS );

      $statement = $connection->prepare( "INSERT INTO user (username,salt,password) VALUES (:username,:salt,:password)" );

      $statement->execute(
         array( 'username' => $username,
                'salt'     => $salt,
                'password' => md5( $password . $salt ))
      );

      $statement = null;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}
