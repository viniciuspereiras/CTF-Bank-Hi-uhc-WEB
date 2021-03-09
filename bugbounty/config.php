<?php
$server='127.0.0.1';
$dbuser='root';
$dbpass="rootbig0us";
$dbname="login";


$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno()) {
    die ("database connection failed"
      . mysqli_connect_error());
  }

// mysqli_close($conn);
 ?>