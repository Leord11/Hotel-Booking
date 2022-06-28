<?php
  $conn = mysqli_connect('localhost','leorde', 'root', 'hotelbooking_db');
  
  if(!$conn){
      echo 'Connection error:' . mysqli_connect_error();  
  }

?>