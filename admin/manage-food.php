<?php include('partials/menu.php') ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
                <h1>FOOD</h1>

                <br /><br />


                        <?php
                                if (isset($_SESSION['add'])) {
                                        echo $_SESSION['add'];
                                        unset($_SESSION['add']);
                                }

                                if (isset($_SESSION['delete'])) {
                                        echo $_SESSION['delete'];
                                        unset($_SESSION['delete']);
                                }

                                if (isset($_SESSION['upload'])) {
                                        echo $_SESSION['upload'];
                                        unset($_SESSION['upload']);
                                }

                                if (isset($_SESSION['unauthorize'])) {
                                        echo $_SESSION['unauthorize'];
                                        unset($_SESSION['unauthorize']);
                                }
                                
                                if (isset($_SESSION['update'])) {
                                        echo $_SESSION['update'];
                                        unset($_SESSION['update']);
                                }

                        ?>


                                <br><br>

                        <!-- BUTTON TO ADD ADMIN -->
                        <a href="<?php echo HOMEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

                        <br /><br /><br />



                        <table class="tbl-full">
                                <tr>
                                        <th>S.N.</th>
                                        <th>Name: </th>
                                        <th>Price: </th>
                                        <th>Image: </th>
                                        <th>Featured: </th>
                                        <th>Active:</th>
                                        <th>Action: </th>
                                </tr>

                                <?php 
                                        //create sql query to get food
                                        $sql = "SELECT * FROM menudetail";
                                        $res = mysqli_query($conn, $sql);

                                        //count rows to check if we have data
                                        $count = mysqli_num_rows($res);


                                        //create serial number
                                        $sn = 1;
                                        if($count > 0) {
                                                //data added
                                                while($rows = mysqli_fetch_assoc($res)) {
                                                        $id = $rows['FoodID'];
                                                        $title = $rows['Name'];
                                                        $price = $rows['Price'];
                                                        $image_name = $rows['image_name'];
                                                        $featured = $rows['Featured'];
                                                        $active = $rows['active'];
                                                        ?>
                                                        <tr>
                                                                <td><?php echo $sn++; ?> </td>
                                                                <td><?php echo $title; ?></td>
                                                                <td><?php echo $price." VND"; ?></td>
                                                                <td>
                                                                        <?php 
                                                                                if($image_name == "") {
                                                                                        echo "<div class='error'>Image Not Added.</div>";
                                                                                } else {
                                                                                        ?>
                                                                                        <img src="<?php echo HOMEURL; ?>doannhanh/images/food/<?php echo $image_name; ?>" width="150px" >
                                                                                        <?php
                                                                                }
                                                                        ?>
                                                                </td>
                                                                <td><?php echo $featured; ?></td>
                                                                <td><?php echo $active; ?></td>
                                                                <td>
                                                                        <a href="<?php echo HOMEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                                                        <a href="<?php echo HOMEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete Food</a>
                                                                </td>
                                                        </tr>

                                                        <?php
                                                }
                                        } else {
                                                //data not added
                                                echo "<tr> <td colspan='7' class='error'>Food not Added Yet. </td> </tr>";
                                        }
                                ?>

                                
                                
                        </table>

            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('partials/footer.php') ?>