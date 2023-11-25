<?php 
    //
    //Check whether the user is logged in or not
    if(!isset($_SESSION['user'])) {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin panel. </div>";
        //go to loign panel
        header('location:'.HOMEURL.'admin/login.php');
    }
?>