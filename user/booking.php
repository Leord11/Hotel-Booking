<?php

session_start();

    $_SESSION;

include ('https://github.com/Leord11/Hotel-Booking/blob/main/config/db.php');
include('https://github.com/Leord11/Hotel-Booking/blob/main/functions.php');

    $user_data = check_login($conn);
    check_role_user($_SESSION['role']);
    

        if(isset($_GET['id'])){
            
            $id = mysqli_real_escape_string($conn, $_GET['id']);
           
            $sql = "SELECT * FROM suites WHERE id = '$id' ";
        
            $result = mysqli_query($conn, $sql);
            $suite = mysqli_fetch_assoc($result);

     
        }
    

    if(isset($_POST['submit'])){

        $user_id = $user_data['id'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $date1 = strtotime(date('Y-m-d', strtotime($check_in)));
        $date2 = strtotime(date('Y-m-d', strtotime($check_out)));
        $number_of_people = mysqli_real_escape_string($conn,$_POST['number_of_people']);
        $secs = $date2 - $date1;
        $days = $secs/ 86400;
        $multiplier = $days < 1 ? 1 : $days;      
        $suite_id = $suite['id'] ?? '';
        $suite_price = $suite['price'];
        $final_price = $suite_price * $multiplier ?? '';
        $status = "pending";

        $query = "INSERT INTO reservations  (user_id, status, suite_id, check_in, check_out, number_of_people, final_price) 
        VALUES ('$user_id','$status','$suite_id','$check_in','$check_out','$number_of_people','$final_price') ";

        if(mysqli_query($conn, $query)){
            $_SESSION['msg'] = "  Booking Request Sent";
            $query_update = "UPDATE suites SET status = 'pending' WHERE id = '$suite_id' ";
            if(mysqli_query($conn, $query_update)) {
                mysqli_close($conn);
                header('Location: ../user/reservations.php');
            } else {
                echo 'query error:' . mysqli_error($conn);
            }
        } else {
            echo 'query error:' . mysqli_error($conn);
        }    

    }


?>




<html lang="en">

<?php include '../templates/header.php' ;?>
<div class="container-booking">
    <div class="booking-box">   
      
        <div class="left"> 
            <div class="card">
                <img src="../img/<?php  echo $suite['type'] . '.jpg';?> " class="card-img">
                <div class="card-content">
                    <h5 class="card-header"><?php  echo str_replace("_", " ",$suite['type']);?></h5>
                    <p class="card-text"> Room <?php echo htmlspecialchars($suite['roomid']);?></p>
                    <p class="card-text"> Price: <?php echo $ph = "₱" . number_format($suite['price'], 0, ".", ",");  ?></p>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="right">

            <form  method="POST">      
            <label style="font-size:1.7rem;">Check In</label><br>
            <input required class="field" type="date" name="check_in" min="<?php echo date('Y-m-d'); ?>">
            <label style="font-size:1.7rem;">Check Out</label><br>
            <input required  class="field"  type="date" name="check_out" min="<?php echo date('Y-m-d'); ?>">
            <label style="font-size:1.7rem;">Guess</label><br>
            <input class="field" type="text" placeholder="No. of Guess" name="number_of_people">
            
            <input class="btn" type="submit" name="submit" value="Submit">
            
            </form>
        </div>
    </div>    
</div>

<?php include('../templates/footer.php'); ?>
</html>
