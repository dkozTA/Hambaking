<?php include('partials/menu.php') ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
                <h1>CATEGORY</h1>

                <br><br>

                <?php 
                        if (isset($_SESSION['add'])) {
                                echo $_SESSION['add'];
                                unset($_SESSION['add']);
                        }

                        if (isset($_SESSION['remove'])) {
                                echo $_SESSION['remove'];
                                unset($_SESSION['remove']);
                        }

                        if (isset($_SESSION['delete'])) {
                                echo $_SESSION['delete'];
                                unset($_SESSION['delete']);
                        }

                        if (isset($_SESSION['no-category-found'])) {
                                echo $_SESSION['no-category-found'];
                                unset($_SESSION['no-category-found']);
                        }

                        if (isset($_SESSION['update'])) {
                                echo $_SESSION['update'];
                                unset($_SESSION['update']);
                        }

                        if (isset($_SESSION['upload'])) {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                        }

                        if (isset($_SESSION['failed-remove'])) {
                                echo $_SESSION['failed-remove'];
                                unset($_SESSION['failed-remove']);
                        }

                ?>

                <br><br>


                        <!-- BUTTON TO ADD ADMIN -->
                        <a href="<?php echo HOMEURL; ?>admin/add-category.php" class="btn-primary">Add Category </a>

                        <br /><br /><br />



                        <table class="tbl-full">
                                <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Featured</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                </tr>

                                <?php 
                                        //query to get all category from DB
                                        $sql = "SELECT * FROM categories";

                                        //execute the query
                                        $res = mysqli_query($conn, $sql);

                                        //count rows
                                        $count = mysqli_num_rows($res);


                                        //create number for table
                                        $sn = 1;

                                        //check if db have data
                                        if($count > 0) {
                                                //get the data and display it 
                                                while($row=mysqli_fetch_assoc($res)) {
                                                        //get id from db
                                                        $id = $row['CategoryID'];
                                                        $title = $row['Name'];
                                                        $image_name = $row['image_name'];
                                                        $featured = $row['Featured'];
                                                        $active = $row['active'];

                                                        ?>


                                                        <tr>
                                                                <td><?php echo $sn++; ?> </td>
                                                                <td><?php echo $title ?></td>
                                                                
                                                                <td>
                                                                        <?php 
                                                                                //check if image if avalible
                                                                                if($image_name != "") {
                                                                                        ?>
                                                                                        <img src="<?php echo HOMEURL; ?>doannhanh/images/category/<?php echo $image_name; ?>" width="150px" >
                                                                                        <?php
                                                                                } else {
                                                                                        echo "<div class='error'>No Image Added.</div>";
                                                                                }
                                                                        ?> 
                                                                </td>

                                                                <td><?php echo $featured ?></td>
                                                                <td><?php echo $active ?></td>
                                                                <td>
                                                                        <a href="<?php echo HOMEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                                                        <a href="<?php echo HOMEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-third">Delete Category</a>
                                                                </td>
                                                        </tr>




                                                        <?php


                                                }


                                        } else {
                                                //dislay no data message in the table
                                                ?>


                                                <tr>
                                                        <td><div class="error">No Category Added.</div></td>
                                                </tr>



                                                <?php
                                        }
                                
                                
                                ?>


                                
                                
                        </table>

            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('partials/footer.php') ?>