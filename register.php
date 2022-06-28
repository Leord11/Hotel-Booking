<?php

session_start();

include 'config/db.php';
include 'functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user_id = $user_id = random_num(20);

    $query1 = "SELECT * FROM users";
    $result = mysqli_query($conn, $query1);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    foreach($users as $user) {
    if(!empty($username) && !empty($email) && !empty($password)) {
        if($user['username'] != $username){
            if($user['email'] != $email) {
                $query2 = " INSERT INTO users (user_id, firstname, lastname, email, username, password) 
                VALUES ('$user_id','$firstname','$lastname','$email','$username','$password')";

                if(mysqli_query($conn, $query2)){  
                                
                mysqli_close($conn);
                header ("Location: login.php");    

                } else {
                echo 'query error '. mysqli_error($conn);
                }
                
            } else {
                echo "email already taken";
                break;
            }
        } else {
            echo "username already exists";
            break;
        }        
    }
    

    else {

        echo "<h4>". "Please complete necessary information" . "</h4>";   
        break;
        
    }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="./js/script.js" defer></script>
    <script src="./js/scroll.js" defer></script>
    <link rel="stylesheet" href="./css/style-login.css">
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
                    <!-- <li><a href="#">About</a></li> -->
                    <li><a href="login.php" class="active">Login</a></li>
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
                <h2>Register</h2>
                <form  method="POST">
                    <div class="inputBxRg">
                        <span>First name</span>
                        <input type="text" name="firstname" required>
                    </div>
                    <div class="inputBxRg">
                        <span>Last name</span>
                        <input type="text" name="lastname" >
                    </div>
                    <div class="inputBxRg">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    <div class="inputBxRg">
                        <span>Username</span>
                        <input type="text" name="username">
                    </div>
                    <div class="inputBxRg">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="inputBxRg">
                        <span>Confirm Password</span>
                        <input type="password" name="confirmPassword">
                    </div>
                  
                    <div class="inputBx">
                
                     <input type="submit" name="submit"  value="Register">
                    </div>
                    <div class="inputBx">
                        <p>Already have an account? <a href="login.php">Sign in</a></p>    
                    </div>
                </form>
                <!-- <h3>Login with social media</h3>
                <ul class="sci">
                    <li><img src="facebook.png"></li>
                    <li><img src="twitter.png"></li>
                    <li><img src="instagram.png"></li>
                </ul> -->
            </div>
        </div>
    </section>
    <script src="./js/nav-indicator.js"></script>
</body>
</html>