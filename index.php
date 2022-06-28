<?php

session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
}
if(isset($_SESSION['admin_id'])){
    unset($_SESSION['admin_id']);
}

?>


<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Hotel</title>
    <script src="./js/carousel.js" defer></script>
    <script src="./js/carousel-slide.js" defer></script>
    <script src="./js/script.js" defer></script>
    <script src="./js/scroll.js" defer></script>
    <link rel="stylesheet" href="./css/style-index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/active.css">

</head>
<body>

    <div class="container">
        <nav class="navbar">
            <div class="brand-title">Luxury Suites</div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                    <!-- <li><a>About</a></li> -->
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            
        </nav>
    </div> 

<section aria-label="Newest Photos">
    <div class="carousel" data-carousel>
      <div class="carousel-msg"><h3>Looking for a place to stay <br/> &nbsp&nbsp&nbsp&nbsp&nbsp during vacation?</h3></div>
      <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
      <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
      <ul data-slides>
        <li class="slide" data-active>
          <img name="slides" src="./img/carousel-3.jpg" id="slide-1">
        </li>
        <li class="slide">
          <img src="./img/carousel-2.jpg" id="slide-2">
        </li>
        <li class="slide">
          <img src="./img/carousel-1.jpg" id="slide-3">
        </li>
        <!-- <li class="slide">
          <img src="./img/carousel-4.jpg">
        </li> -->
        <li class="slide">
          <img src="./img/carousel-5.jpg" id="slide-4">
        </li>
      </ul>
    </div>
</section>
<div class="space">

 <h1>Suites</h1>
</div>

<div class="flex-container" id="suites" >
        <div class="grid">
            <div class="grid-item">
                <div class="card">
                    <img src="./img/Junior_Suite.jpg"  class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Junior Suite</h5>
                        <p class="card-text">Junior suites are perfect for travelers, who just like to taste the feeling of luxury hotel suites. If you have never ever booked a hotel suite before, may you try junior suite first.</p>

                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="./img/Deluxe_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Deluxe Suite</h5>
                        <p class="card-text">A classical minimalist style suite with high quality materials. Deluxe suites are recommended for people who like spacious accommodation in reasonable price.</p>

                    </div>
                </div>
            </div>
            <div class="grid-item">     
                <div class="card">
                    <img src="./img/Executive_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Executive Suite</h5>
                        <p class="card-text">Executive suite is perfect suite type for top managers, business men and women or company’s CEO, CFO, COO, CTO etc.</p>

                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="./img/Terrace_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Terrace Suite</h5>
                        <p class="card-text">If you like big terraces with wonderful view and you like to spend most of your time outside instead of inside in your vacation, terrace suite will be perfect for you.</p>

                    </div>
                </div>
            </div>
            <div class="grid-item">                
                <div class="card">
                    <img src="./img/Penthouse_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Penthouse Suite</h5>
                        <p class="card-text">Almost every luxury hotel in a city has a special suite on the top floor. Usually, this suite is the penthouse suite; for everyone who wants to enjoy the magnificent view from the spacious suite or from the roof terrace with family, friends, colleagues or business partners.</p>

                    </div>
                </div>
            </div>
            <div class="grid-item">    
                <div class="card">
                    <img src="./img/Presidential_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Presidential Suite</h5>
                        <p class="card-text"> A suite for presidents, owners of companies, hedge fund managers, A-list celebrities or anyone how can afford it to pay the highest price for a suite. </p>

                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div class="card">
                    <img src="./img/Royal_Suite.jpg" class="card-img">
                    <div class="card-content">
                        <h5 class="card-header">Royal Suite</h5>
                        <p class="card-text">If you want to live like a king during your vacation with your family, you have your own butler and you like the opulence in every detail, royal suite can be  perfect for you.</p>

                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <script src="./js/nav-indicator.js" defer></script>

<?php include('./templates/footer.php'); ?>

</html>