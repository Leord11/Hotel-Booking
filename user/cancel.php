<?php 


session_start();


    include ('../config/db.php');
    


    if(isset($_POST['cancel'])) {
     $id =   $_POST['pending_id'];
     $room_id = $_POST['room_id'];
     $sql = "UPDATE reservations SET status = 'cancelled' WHERE id = '$id'";
        
     if(mysqli_query($conn, $sql)) { 
        
        $query = "UPDATE suites SET status = 'available' WHERE roomid = '$room_id' ";
        if(mysqli_query($conn,$query)) {
            mysqli_close($conn);
            header('Location: ../user/reservations.php');

        } else  {
            echo 'query error' . mysqli_error($conn);
        }
     } else  {
        echo 'query error' . mysqli_error($conn);
    }
    } 
