<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Start -->
        <div class="main-content">
                <div class="wrapper">
                        <h1>MANAGE ADMIN</h1>

                        <br /><br />

                        <?php 
                                if(isset($_SESSION['add'])) {
                                        echo $_SESSION['add'];
                                        unset($_SESSION['add']);
                                }

                                if(isset($_SESSION['delete'])) {
                                        echo $_SESSION['delete'];
                                        unset($_SESSION['delete']);
                                }

                                if (isset($_SESSION['update'])) {
                                        echo $_SESSION['update'];
                                        unset($_SESSION['update']);
                                }


                                if (isset($_SESSION['user-not-found'])) {
                                        echo $_SESSION['user-not-found'];
                                        unset($_SESSION['user-not-found']);
                                }

                                if (isset($_SESSION['pass-not-found'])) {
                                        echo $_SESSION['pass-not-found'];
                                        unset($_SESSION['pass-not-found']);
                                }


                                if (isset($_SESSION['change-pass'])) {
                                        echo $_SESSION['change-pass'];
                                        unset($_SESSION['change-pass']);
                                }

                        ?>
                        <br><br><br>

                        <!-- BUTTON TO ADD ADMIN -->
                        <a href="add-admin.php" class="btn-primary">Add admin</a>

                        <br /><br /><br />



                        <table class="tbl-full">
                                <tr>
                                        <th>S.N.</th>
                                        <th>Full Name</th>
                                        <th>UserName</th>
                                        <th>Action</th>
                                </tr>

                                <?php
                                        $sql = "SELECT * FROM admin";
                                        $res = mysqli_query($conn, $sql);

                                        if($res==TRUE)
                                        {
                                                $count = mysqli_num_rows($res); //get row in database

                                                $sn = 1;

                                                //check number of rows
                                                if($count > 0) {
                                                        while($rows = mysqli_fetch_assoc($res)) { 

                                                                //get data
                                                                $id = $rows['id'];
                                                                $full_name = $rows['full_name'];
                                                                $username = $rows['username'];

                                                                //display the vaules in the table
                                                                ?>

                                                                        <tr>
                                                                                <td><?php echo $sn++ ?> </td>
                                                                                <td><?php echo $full_name ?> </td>
                                                                                <td><?php echo $username ?> </td>
                                                                                <td>
                                                                                        <a href="<?php echo HOMEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                                                                                        <a href="<?php echo HOMEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                                                        <a href="<?php echo HOMEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-third">Delete Admin</a>
                                                                                </td>
                                                                        </tr>




                                                                <?php
                                                        }
                                                } else {
                                                        
                                                }
                                        }
                                ?>

                                
                        </table>

            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('partials/footer.php') ?>