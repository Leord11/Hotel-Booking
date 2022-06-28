<?php

session_start();

    $_SESSION;

    include ('../config/db.php');
    include ('../functions.php');

    $user_data = check_login($conn);
    check_role_user($_SESSION['role']);
    
    $user_id = $user_data['id'];
    
    $sql_all = "SELECT reservations.* ,suites.type,suites.roomid  from reservations 
    INNER JOIN suites ON reservations.suite_id = suites.id ";
    $result_all = mysqli_query($conn, $sql_all);
    if($result_all) {
        $show_all = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    } else {
        echo 'query error' . mysqli_error($conn);
    }
    mysqli_free_result($result_all);
    mysqli_close($conn);

?>


<html>

<?php   include ('../templates/header.php'); ?>

            <?php if(isset($_SESSION['msg'])): ?>
                <div class="message-container">
               
            <div class="success-message">
                <h2><?php echo  $_SESSION['msg']; ?><a href="../user/reservations.php"> x</a></h2>
                <?php unset($_SESSION['msg']); ?>
            </div>
            </div> 
            <?php endif; ?> 
   <!-- show pending  -->
   <div class="label-container">       
        <h1 id="viewPending">Pending</h1>
    </div>
    <div class="flex-container">   
        
        <div class="grid">    
            <?php  $count1 = 0 ; ?>
            <?php  foreach($show_all as $pending) {  ?>
            <?php   if($pending['user_id'] == $user_id && $pending['status'] == 'pending'):    ?>
            <?php $count1++; ?>
            <div class="grid-item"> 
                <div class="card">
                    <img src="../img/<?php  echo $pending['type'] . '.jpg';?> " class="card-img">
                    <div class="card-content">
                        <h5 class="card-header"><?php  echo str_replace("_", " ",$pending['type']);?></h5>
                        <p class="card-text"> Pending Request . . .</p>
                        <p class="card-text"> Room <?php echo $pending['roomid'];?></p>
                        <p class="card-text"> Check In: <?php echo $pending['check_in'];?></p>
                        <p class="card-text"> Check Out: <?php echo $pending['check_out'];?></p>
                        <p class="card-text"> Guess: <?php echo $pending['number_of_people'];?></p>
                        <p class="card-text"> Price: <?php echo $ph = "₱" . number_format($pending['final_price'], 0, ".", ",");  ?></p>
                        <form action="../user/cancel.php" method="POST"> 
                            <input type="hidden" name="pending_id" value="<?php echo $pending['id'];?>">
                            <input type="hidden" name="room_id" value="<?php echo $pending['roomid'];?>">
                            <input type="submit" name="cancel" value="Cancel" class="cancel-btn">
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>            
            <?php } ?>
            <?php  if($count1 < 1) { ?>
            <div class="label-container">   
            <h1 class="error_message">No Pending Reservations</h1>
            </div>
            <?php }  ?>
        </div>    
    </div>
    <!-- end show pending -->   
   

    <div class="label-container">
        <h1 id="viewAll">All Reservations</h1>
    </div>
    
        
               
        
       
        
    <div class="flex-container">        
    <div class="grid">          
    <?php $count2 = 0 ; ?> 
        <?php  foreach($show_all as $all) {  ?>    
        <?php   if($all['user_id'] == $user_id ):    ?>
            <?php $count2++; ?>
            <div class="grid-item"> 
                <div class="card">
                    <img src="../img/<?php  echo $all['type'] . '.jpg';?> " class="card-img">
                    <div class="card-content">
                        <h5 class="card-header"><?php  echo str_replace("_", " ",$all['type']);?></h5>
                        <p class="card-text"> Room <?php echo $all['roomid'];?></p>
                        <p class="card-text"> Status: <?php echo $all['status'];?></p>
                        <p class="card-text"> Check In: <?php echo $all['check_in'];?></p>
                        <p class="card-text"> Check Out: <?php echo $all['check_out'];?></p>
                        <p class="card-text"> Guess: <?php echo $all['number_of_people'];?></p>
                        <p class="card-text"> Price: <?php echo $ph = "₱" . number_format($all['final_price'], 0, ".", ",");  ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>            
        <?php } ?>
        <?php  if($count2 < 1) { ?>
            <div class="label-container">   
            <h1 class="error_message">No Reservations Yet</h1>
            </div>
         <?php }  ?>
    </div>
    </div>

    
    <!-- end show all             -->
  
     <!-- show cancellations -->
    
    <div class="label-container">
        <h1 id="viewCancel">Cancellations</h1>
    </div>
    <div class="flex-container" >    
        <div class="grid">    
            <?php $count = 0;?>
            <?php  foreach($show_all as $all) {  ?>
                
            <?php   if($all['user_id'] == $user_id && $all['status'] == 'cancelled'):    ?>
            <?php $count ++;?>   
            <div class="grid-item"> 
                <div class="card">
                    <img src="../img/<?php  echo $all['type'] . '.jpg';?> " class="card-img">
                    <div class="card-content">
                        <h5 class="card-header"><?php  echo str_replace("_", " ",$all['type']);?></h5>
                        <p class="card-text"> Cancelled</p>
                        <p class="card-text"> Room <?php echo $all['roomid'];?></p>
                        <p class="card-text"> Check In: <?php echo $all['check_in'];?></p>
                        <p class="card-text"> Check Out: <?php echo $all['check_out'];?></p>
                        <p class="card-text"> Guess: <?php echo $all['number_of_people'];?></p>
                        <p class="card-text"> Price: <?php echo $ph = "₱" . number_format($all['final_price'], 0, ".", ",");  ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>            
            <?php } ?>
            <?php  if($count < 1) { ?>
            <div class="label-container">   
            <h1 class="error_message">No Cancelled Reservations</h1>
            </div>
            <?php }  ?>
        </div>    
    </div>



<?php include('../templates/footer.php'); ?>
</html>