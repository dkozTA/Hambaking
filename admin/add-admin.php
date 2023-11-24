<?php include("partials/menu.php"); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full_Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your Name" id="">
                    </td>
                </tr>

                <tr>
                    <td>UserName: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username" id="">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password" id="">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>

            </table>
        </form>
    </div>

</div>





<?php include("partials/footer.php"); ?>


<?php 
    //give to database

    //check submit button wherenether it submit or not
    if(isset($_POST['submit'])) {
        //echo "Clicked";
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //endify encryption with MDS

        //save Database in to db
        $sql = "INSERT INTO admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        
        

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));


        // check if inserted in to the db or not
        if($res==TRUE) {
            //success
            $_SESSION['add'] = "Admin Added Successfuly";
            header("Location:".HOMEURL.'admin/manage-admin.php');
        } else {
            //failed
            $_SESSION['add'] = "Failed";
            header("Location:".HOMEURL.'admin/manage-admin.php');
        }

    }
?>