
<?php
session_start();

if(isset($_SESSION['msg'])) {
    unset($_SESSION['msg']);
   
    
    header("Location: contact.php");
    
}