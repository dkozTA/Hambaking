<?php 
    include("../config/constants.php");


    if(isset($_GET['id']) && isset($_GET['image_name'])) {
        //get image Name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove if avalible
        if($image_name != "") {
            //have image and remove it from folder
            $path = "../doannhanh/images/food/".$image_name;
            
            $remove = unlink($path);

            //check if removed
            if($remove==FALSE) {
                $_SESSION['upload'] = "<div class='error'>Fail to remove Image.</div>";
                header('loaction:'.HOMEURL.'admin/manage-food.php');
                //stop the progress
                die();
            }

        }


        //delete from database
        $sql = "DELETE FROM menudetail WHERE FoodID=$id";

        $res = mysqli_query($conn, $sql);

        if($res == TRUE) {
            $_SESSION['delete'] = "<div class='success'>Food Deleted.</div>";
            header('location:'.HOMEURL.'admin/manage-food.php');
        } else {
            $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
            header('location:'.HOMEURL.'admin/manage-food.php');
        }

    } else {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('loaction:'.HOMEURL.'admin/manage-food.php');
    }
?>