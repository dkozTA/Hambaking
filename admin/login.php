<?php include('../config/constants.php'); ?>



<html>
    <head>
        <title>Login - Hambaking Admin</title>
        <link rel="stylesheet" href="../doannhanh/css/admin.css">
    </head>


    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                
                if(isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br><br>

            <form action="" method="POST" class="text-center">
                UserName: <br>
                <input type="text" name="username" placeholder="Enter username"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter password">
                <br><br>

                <input type="submit" name="submit" value="logjn" class="btn-primary"><br><br>
            </form>

            <p class="text-center">Create By - 3Boys</p>

        </div>
    </body>
</html>


<?php 
    //checkk where submit button is clicked
    if(isset($_POST['submit'])) {
        //get data from login
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //check if user and pass exists or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1) {
            //if success go to home page and display success
            $_SESSION['login'] = "<div class='success'> Login Successfull.</div>";

            //check if user login or not, log out will unset it
            $_SESSION['user'] =  $username;

            //go to home page
            header('location:'.HOMEURL.'admin/');
        } else {
            //if fail display fail
            $_SESSION['login'] = "<div class='error text-center'> Password or Username does not match.</div>";
            header('location:'.HOMEURL.'admin/login.php');
        }




    }

?>