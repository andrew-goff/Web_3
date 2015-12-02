<?php
  /*PHP to connect to MySQL database*/
  $db = mysqli_connect("mysql.ccacolchester.com","andrewg8460","1418460","andrewg8460");
  
  if ($db -> connect_errno)
  {
    echo "Failed to connect to the MySQL database: " . $db -> connect_errno;
  }
?>