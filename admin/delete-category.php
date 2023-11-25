<?php
    include("../config/constants.php");


    //check if id and image_name is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])) {
        //get the value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];


        //remove image if avalible
        if($image_name != "") {
            $path = "../doannhanh/images/category/".$image_name;
            $remove = unlink($path);


            //if failed then add error message
            if($remove==FALSE) {
                $_SESSION['remove'] = "<div class ='error'>Failed to remove category because of picture.</div>";
        
                //back to manage page
                header('location:'.HOMEURL.'admin/manage-category.php');
                die();
            }


        }
        
        $sql = "DELETE FROM categories WHERE CategoryID=$id";

        $res = mysqli_query($conn, $sql);

        //check if data is delete
        if($res==TRUE) {
            $_SESSION['delete'] = "<div class ='success'>Remove Category Successfully.</div>";
        
            //back to manage page
            header('location:'.HOMEURL.'admin/manage-category.php');
        } else {
            $_SESSION['delete'] = "<div class ='error'>Failed to remove category.</div>";
        
            //back to manage page
            header('location:'.HOMEURL.'admin/manage-category.php');
        }




    } else {
        //return to manage category page
        header('loaction:'.HOMEURL.'admin/manage-category.php');
    }

?>