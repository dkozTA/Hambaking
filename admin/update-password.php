<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">

                <tr>
                    <td>Currrent Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New password">
                    </td>
                </tr>
                

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="Change password" class="btn-secondary">
                    </td>
                </tr>


            </table>
        </form>
    </div>
</div>


<?php 
    //check if submit is clicked
    if(isset($_POST['submit'])) {
        //get data
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        
        //check if password exist
        $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if ($res==TRUE) {
            $count = mysqli_num_rows($res);

            if($count==1) {
                //change password
                if($new_password==$confirm_password) {
                    $sql2 = "UPDATE admin SET
                    password='$new_password'
                    WHERE id=$id
                    ";

                    $res = mysqli_query($conn, $sql);

                    //check is change success or not
                    if($res==TRUE) {
                        $_SESSION['change-pass'] = "<div class='success'> Password changed success .</div>";
                        //head back
                        header('location:'.HOMEURL.'admin/manage-admin.php');
                    } else {
                        $_SESSION['change-pass'] = "<div class='error'> Failed to change password .</div>";
                        //head back
                        header('location:'.HOMEURL.'admin/manage-admin.php');
                    }
                } else {
                    $_SESSION['pass-not-match'] = "<div class='error'> Password is not match .</div>";
                    //head back
                    header('location:'.HOMEURL.'admin/manage-admin.php');
                }
            } else {
                $_SESSION['user-not-found'] = "<div class='error'> User not found .</div>";
                //head back
                header('location:'.HOMEURL.'admin/manage-admin.php');
            }
        }


        //check if curr and comf are match
    }

?>



<?php include('partials/footer.php') ?>