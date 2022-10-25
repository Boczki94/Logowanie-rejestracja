<?php
    $conn = mysqli_connect('localhost','root','','users');
    // $conn = mysqli_connect('localhost','root','','users');
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
      

?>