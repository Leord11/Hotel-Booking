<?php
session_start();


include ('https://github.com/Leord11/Hotel-Booking/blob/main/config/db.php');
include('https://github.com/Leord11/Hotel-Booking/blob/main/functions.php');
// include 'config/db.php';
// include 'functions.php';
    
if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
    }
if(isset($_SESSION['admin_id'])){
        unset($_SESSION['admin_id']);
    }
if(isset($_SESSION['role'])) {
    unset($_SESSION['role']);
}    

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username)){

        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $query2 = "SELECT * FROM admin WHERE username = '$adminUsername' LIMIT 1";

        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        if($result)  {

            if($result && mysqli_num_rows($result) > 0){

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password) {
                    
                    if($user_data['role'] === "user"){
                        $_SESSION['role'] = 'user';
                        $_SESSION['user_id'] = $user_data['user_id'];
                        mysqli_free_result($result);
                        mysqli_close($conn);
                        header("Location: https://github.com/Leord11/Hotel-Booking/blob/main/user/index.php");
                        die;     
                    }                  
                    
                } else {
                    echo "Incorrect username or password";
                }
            }

        } 
        if($result2)  {

            if($result2 && mysqli_num_rows($result2) > 0){

                $admin_data = mysqli_fetch_assoc($result2);
                
                if($admin_data['password'] === $adminPassword) {
                    
                    if($admin_data['role'] === "admin"){

                        $_SESSION['role'] = 'admin';
                        $_SESSION['admin_id'] = $admin_data['id'];
                        mysqli_free_result($result2);
                        mysqli_close($conn);
                        header("Location: admin/index.php");
                        die;     
                    }
                    
                    
                } else {
                    echo "Incorrect username or password";
                }
            }

        }
        
        
        else {

            echo 'user does not exist!';
        }
        
} else {
    echo "please enter some valid information!";
}
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="./js/script.js" defer></script>
    <script src="./js/scroll.js" defer></script>
    <script src="./js/nav-indicator.js" defer></script>
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/style-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
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
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                    <!-- <li><a >About</a></li> -->
                    <li><a href="./login.php">Login</a></li>
                </ul>
            </div>
            
        </nav>
    </div> 
<section>
        <div class="imgBx">
            <img src="./img/bg.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form  method="POST">
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="username">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox">Remember me?</label>
                    </div>
                    <div class="inputBx">
                
                     <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </div>
                    <div class="inputBx">
                        <p>Don't have an account? <a href="register.php">Sign up</a></p>    
                    </div>
                </form>
                <!-- <h3>Login with social media</h3>
                <ul class="sci">
                    <li> <i class="fab fa-facebook-f"></i></li>
                    <li><i class="fab fa-twitter"></i></li>
                    <li> <i class="fab fa-google"></i></li>
                </ul> -->
            </div>
        </div>
    </section>
    
</body>
</html>
