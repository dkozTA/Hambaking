<?php
    //session
    session_start();


    define('HOMEURL', 'http://localhost/Hambaking/');
    
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', ''); 
    define('DB_NAME', 'fastfood'); 

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

?>