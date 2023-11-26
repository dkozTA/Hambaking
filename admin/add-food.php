<?php include("partials/menu.php"); ?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>


        <?php 
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>



        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="title" placeholder="Name of the food">
                    </td>
                </tr>



                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Descrition of the food"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" placeholder="Enter the food price">
                    </td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php 
                                //create php code to display categories from database
                                $sql = "SELECT * FROM categories WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                //count the rows to see if it have categories
                                $count = mysqli_num_rows($res);
                                if($count>0) {
                                    //get and display categories from database
                                    while($rows = mysqli_fetch_assoc($res)) {
                                        //get details of categories
                                        $id = $rows['CategoryID'];
                                        $title = $rows['Name'];

                                        ?>
                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value="0">No Category found</option>
                                    <?php
                                }
                            ?>




                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


        <?php 

            //Here give data added to the table
            if(isset($_POST['submit'])) {
                //echo "clicked";


                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check if radio button are checked or not
                if(isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }

                if(isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }


                //upload image if selected
                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    //check if a image is selected and only upload it when selected
                    if($image_name != "") {
                        //destroy image name
                        $ext = explode('.', $image_name);
                        $tmp = end($ext);

                        //rename the image
                        $image_name = "Food-Name-".rand(0000,9999).".".$tmp; //rename to "Food-Name-2323.png"


                        //get source path
                        $scr = $_FILES['image']['tmp_name'];

                        //destination path for image
                        $dst = "../doannhanh/images/food/".$image_name;

                        //upload image
                        $upload = move_uploaded_file($scr, $dst);
                        if($upload == FALSE) {
                            //if failed then stop the progress and display error message
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image.</div>";
                            header('location:'.HOMEURL.'admin/add-food.php');
                            die();
                        }
                    }

                } else {
                    $image_name = "";
                }

                //Insert into Database
                $sql2 = "INSERT INTO menudetail SET
                    Name = '$title',
                    Description = '$description',
                    Price = $price,
                    CategoryID = '$category',
                    image_name = '$image_name',
                    Featured = '$featured',
                    active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);


                if($res2 == true) {
                    $_SESSION['add'] = "<div class = 'success'>Food Added. </div>";
                    header('location:'.HOMEURL.'admin/manage-food.php');
                } else {
                    $_SESSION['add'] = "<div class = 'error'>Food Adding Failed. </div>";
                    header('location:'.HOMEURL.'admin/manage-food.php');
                }

            }




        ?>




    </div>
</div>















<?php include("partials/footer.php"); ?>