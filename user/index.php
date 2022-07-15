<?php

session_start();

    $_SESSION;

include ('https://github.com/Leord11/Hotel-Booking/blob/main/config/db.php');
include('https://github.com/Leord11/Hotel-Booking/blob/main/functions.php');

    $user_data = check_login($conn);
    check_role_user($_SESSION['role']);

?>



<html>

<?php   include ('../templates/header.php'); ?>

<!-- navbar end -->
    <!-- <h1>Hello <?php  echo $user_data['username'];?></h1>
<br>
    
    <br>
    <h2> Types of suites</h2>
    <hr> -->

    <div class="label-container">
        <h1>Our Suites</h1>
    </div>
    <div class="flex-container" id="suites" >
        <div class="grid">
            <div class="grid-item">
                <div class="card">
                    <img src="../img/Junior_Suite.jpg"  class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Junior Suite</h5>
                        <p class="card-text">Junior suites are perfect for travelers, who just like to taste the feeling of luxury hotel suites. If you have never ever booked a hotel suite before, may you try junior suite first.</p>
                        <a href="../user/viewAll.php?type=Junior_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="../img/Deluxe_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Deluxe Suite</h5>
                        <p class="card-text">A classical minimalist style suite with high quality materials. Deluxe suites are recommended for people who like spacious accommodation in reasonable price.</p>
                        <a href="../user/viewAll.php?type=Deluxe_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">     
                <div class="card">
                    <img src="../img/Executive_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Executive Suite</h5>
                        <p class="card-text">Executive suite is perfect suite type for top managers, business men and women or company’s CEO, CFO, COO, CTO etc.</p>
                        <a href="../user/viewAll.php?type=Executive_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="../img/Terrace_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Terrace Suite</h5>
                        <p class="card-text">If you like big terraces with wonderful view and you like to spend most of your time outside instead of inside in your vacation, terrace suite will be perfect for you.</p>
                        <a href="../user/viewAll.php?type=Terrace_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">                
                <div class="card">
                    <img src="../img/Penthouse_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Penthouse Suite</h5>
                        <p class="card-text">Almost every luxury hotel in a city has a special suite on the top floor. Usually, this suite is the penthouse suite; for everyone who wants to enjoy the magnificent view from the spacious suite or from the roof terrace with family, friends, colleagues or business partners.</p>
                        <a href="../user/viewAll.php?type=Penthouse_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="../img/Presidential_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Presidential Suite</h5>
                        <p class="card-text"> A suite for presidents, owners of companies, hedge fund managers, A-list celebrities or anyone how can afford it to pay the highest price for a suite. </p>
                        <a href="../user/viewAll.php?type=Presidential_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card">
                    <img src="../img/Royal_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Royal Suite</h5>
                        <p class="card-text">If you want to live like a king during your vacation with your family, you have your own butler and you like the opulence in every detail, royal suite can be  perfect for you.</p>
                        <a href="../user/viewAll.php?type=Royal_Suite" class="card-btn">See All <span>&rarr;</span></a>
                    </div>
                </div>
            </div>
          
        </div>
    </div>

   
    <?php include('../templates/footer.php'); ?>
</html>
