<?php
function random_num($length) {

    $text = "";

    if($length < 5) {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i = 0 ; $i < $len; $i++) {

        $text .= rand(0,9);

    }
    return $text;
}


function check_login($conn){

    if(isset($_SESSION['user_id'])){

        if($_SESSION['role'] == 'user') {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            }

        } else {
            
            header("Location: ../login.php");
            die;
        }
    }
    
    if(isset($_SESSION['admin_id']) && isset($_SESSION['role'])){

        if($_SESSION['role'] == 'admin') {
        
        $id = $_SESSION['admin_id'];
        $query = "select * from admin where id = '$id' limit 1";
        
        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){

            $admin_data = mysqli_fetch_assoc($result);
            return $admin_data;
            }
        } else {
            
            header("Location: ../login.php");
            die;
        }

    }

    header("Location: ../login.php");
    die;
}

function check_role_user($role) {

    if($role != "user" ) {
        header("Location: ../login.php");
    }

}

function check_role_admin($role) {

    if($role != "admin" ) {
        header("Location: ../login.php");
    }
}