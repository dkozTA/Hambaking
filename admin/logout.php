<?php
    //get Homurl
    include('../config/constants.php');


    //destroy sesssion
    session_destroy(); //unset session['user']


    //back to login page
    header('location:'.HOMEURL.'admin/login.php');

?>