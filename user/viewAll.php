<?php



session_start();

    $_SESSION;

    include ('../config/db.php');
    include ('../functions.php');

    $user_data = check_login($conn);
    check_role_user($_SESSION['role']);

if(isset($_GET['type'])){
    $type = mysqli_real_escape_string($conn, $_GET['type']);

    $sql = "SELECT * FROM suites WHERE type = '$type' AND status='available'";

    $result = mysqli_query($conn, $sql);

    $suites = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
}
?>

<html lang="en">

<?php include '../templates/header.php' ;?>


<div class="label-container">    
    <h1>Available Rooms</h1> 
</div>
<div class="flex-container">   
        <div class="grid">
            <?php  foreach($suites as $suite) {  ?>
            <div class="grid-item"> 
                <div class="card">
                    <img src="../img/<?php  echo $suite['type'] . '.jpg';?> " class="card-img">
                    <div class="card-content">
                        <h5 class="card-header"><?php  echo str_replace("_", " ",$suite['type']);?></h5>
                        <p class="card-text"> Room <?php echo $suite['roomid'];?></p>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="../user/booking.php?id=<?php echo $suite['id'];?>" class="card-btn">Book</a>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
</div>
    



<?php include('../templates/footer.php'); ?>
</html>