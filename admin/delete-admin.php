<?php

    include("../config/constants.php");



    //1. Get id of admin that going to be deleted.
    $id = $_GET['id'];

    //2. Create query to delete admin.
    $sql = "DELETE FROM admin WHERE id=$id";

    //do the query
    $res = mysqli_query($conn, $sql);

    //3. Return success or failed message
    if($res==TRUE) {
        //use session to display the message
        $_SESSION['delete'] = "<div class ='success'>Admin Deleted Successfully.</div>";
        
        //back to admin page
        header('location:'.HOMEURL.'admin/manage-admin.php');
    } else {
        $_SESSION['delete'] = "<div class='error>Admin Deleting Failed.</div>";

        //same
        header('loaction:'.HOMEURL.'admin/manage-admin.php');
    }

    

?>