<?php
/* ===================================================================
   SELECT
   ================================================================ */
function select ( $field, $table, $query_field, $query )
{
   try {
      require_once "config.php";

      $db = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER, DBPASS );//connection to the database

      $statement = $db->prepare("SELECT $field FROM $table WHERE $query_field = :q");

      $statement->execute( array( 'q' => $query ) );
// 
      $row = $statement->fetch();

      $statement = null;

      return $row[$field];
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   UPDATE
   ================================================================ */
function update( $table, $field, $new_field_value, $field_of_interest, $field_of_interest_value )
{
   try {
      require_once "config.php";

      $db = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER, DBPASS );

      $statement = $db->prepare("UPDATE $table SET $field = :new_field_value WHERE $field_of_interest = :field_of_interest_value");

      $statement->execute( array(
         'new_field_value' => $new_field_value,
         'field_of_interest_value' => $field_of_interest_value ) );

      $statement = null;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   DELETE
   ================================================================ */
function delete( $table, $field, $query )
{
   try {
      require_once "config.php";

      $db = new PDO("mysql:host=".DBHOST."; dbname=".DBNAME, DBUSER, DBPASS );

      $statement = $db->prepare("DELETE FROM $table WHERE $field = :query");

      $statement->execute( array( 'query' => $query ) );

      $statement = null;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   DELETE FILE
   ================================================================ */
function delete_file( $filepath )
{
   unlink( $filepath );
}

/* ===================================================================
   GET ALL FILE LINKS FOR
   ================================================================ */
function get_all_file_links_for( $username )
{
   try {
      require_once "config.php";
      
      $db = new PDO( "mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS );
      $statement = $db->prepare("SELECT path, name FROM file WHERE username = :username");
      $statement->execute( array( 'username' => $username ) );

      $index = 0;

      while( $row = $statement->fetch() )
         $links[ $index++ ] = $row['name'];

      $statement = null;

      if( !isset( $links ) )
         $links = 0;

      return $links;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/* ===================================================================
   INSERT 
   ================================================================ */
function insert_s(){
echo 'insert_s';
}

/* ===================================================================
   INSERT 
   ================================================================ */
function insert_score( $username, $score )
{
   echo ' insert_score';
   try {
      require_once "config.php";

      $connection = new PDO( "mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS );
      $statement = $connection -> prepare( "INSERT INTO score (username,score) VALUES (:username,:score)" );
      $statement -> execute( array(
         'username' => $username,
         'score'    => $score ) );

      $statement = null;
   }
   catch( PDOException $e ) {
      include "error_message.inc";
      exit;
   }
}

/*if(mysqli_connect_errno()) {
	die("Database connection failed: " .
		mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
	);
}
 ?> */