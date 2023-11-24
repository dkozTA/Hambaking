<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <?php 
            // get id
            $id=$_GET['id'];

            //query to get the info
            $sql = "SELECT * FROM admin WHERE id=$id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //check if the query are executed or not
            if($res==TRUE) {

                $count = mysqli_num_rows($res);

                //check whether we have any data
                if($count==1) {
                    //get the detail
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                } else {
                    //back to manage admin page
                    header('location:'.HOMEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>" >
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>" >
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>





            </table>
        </form>
    </div>
</div>

<?php

    //check the submit button
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];


        //Update admin
        $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";


        //execute the query
        $res = mysqli_query($conn, $sql);

        if($res==TRUE) {
            $_SESSION['update'] = "<div class='success'> Admin Updated Success.</div>";
            //back to manage admin page
            header('location:'.HOMEURL.'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "<div class='error'> Admin Updated Failed.</div>";
            //back to manage admin page
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }

    }

?>






<?php include('partials/footer.php') ?>