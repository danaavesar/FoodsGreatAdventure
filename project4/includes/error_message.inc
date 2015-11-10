<?php echo
"<!DOCTYPE HTML>
<html>
   <head>
      <meta charset='utf-8'>
      <title>Error</title>
      <link rel='stylesheet' href='css/normalize.css'>
      <link rel='stylesheet' href='css/style.css'>
      <link rel='stylesheet' href='css/error-message.css'>
   </head>
   <body>
      <h1>Error!</h1>
      <p>It’s possible that your script could not connect to the database. Check that MySQL is turned on, that the database exists, and that the credentials you’ve listed in <span class='teletype'><b>config.php</b></span> (listed below) are correct.</p>
      <ul>
         <li>Host: <span class='highlight'> " . DBHOST . " </span> </li>
         <li>Database name: <span class='highlight'> " . DBNAME . " </span> </li>
         <li>Database user: <span class='highlight'> " . DBUSER . " </span> </li>
         <li>Database password: <span class='highlight'> " . DBPASS . " </span> </li>
      </ul>
      <p>The generated error message is...</p>
      <blockquote class='teletype highlight larger-typeface extra-padding'>{$e->getMessage()}</blockquote>
      <p><strong>!! DO NOT USE THIS ERROR MESSAGE ON A PRODUCTION SERVER !!</strong></p>
   </body>
</html>
";
