<?php include("partials/menu.php"); ?>

<?php
    //check if id are save
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM menudetail WHERE FoodID=$id";
        $res2 = mysqli_query($conn, $sql2);

        //get rows
        $row2 = mysqli_fetch_assoc($res2);



        $title = $row2['Name'];
        $description = $row2['Description'];
        $price = $row2['Price'];
        $current_image = $row2['image_name'];
        $current_catagory = $row2['CategoryID'];
        $featured = $row2['Featured'];
        $active = $row2['active'];


    } else {
        //back to location
        header('location'.HOMEURL.'admin/manage-food.php');
    }
?>






<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
               
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="10"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                            if($current_image == "") {
                                echo "<div class='error'>Image Not Avalible.</div>";
                            } else {
                                ?>
                                <img src="<?php echo HOMEURL; ?>doannhanh/images/food/<?php echo $current_image; ?>" alt="<?php echo $title; ?>" width="500px">
                                <?php
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                                //query to get active category
                                $sql = "SELECT * FROM categories WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                //check if category avalible or not
                                if($count > 0) {
                                    while($rows=mysqli_fetch_assoc($res)) {
                                        $category_name = $rows['Name'];
                                        $category_id = $rows['CategoryID'];

                                        //this can display html on php but i dont like to use it
                                        //echo "<option value='$category_id'>$category_name</option>";
                                        ?>
                                        <option <?php if($current_catagory==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                                        <?php
                                    }
                                } else {
                                    echo "<option value='0'>Category No Avalible.</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?>  type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>


                
            </table>


        </form>


        <?php

            if(isset($_POST['submit'])) {
                //get all details
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];



                // upload the image
                if(isset($_FILES['image']['name'])) {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "") {
                        $ext = explode('.', $image_name);
                        $tmp = end($ext);
                        $image_name = "Food-Name".rand(0000, 9999).'.'.$tmp; //renmae image

                        //get src path and dest path
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../doannhanh/images/food/".$image_name;

                        //upload the image here
                        $upload = move_uploaded_file($src_path, $dest_path);
                        if($upload==FALSE) {
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image.</div>";
                            header('location:'.HOMEURL.'admin/manage-food.php');
                            //stop
                            die();
                        }

                        //remove current image if it have one
                        if($current_image != "") {
                            $remove_path = "../doannhanh/images/food".$current_image;
                            $remove = unlink($remove_path);

                            //check if removed
                            if($remove==FALSE) {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed To Remove Image.</div>";
                                header('location:'.HOMEURL.'admin/manage-food.php');
                                die();
                            }
                        }

                        
                    } else { //keep the image the same if user not change the image
                        $image_name = $current_image;
                    }

                } else {
                    $image_name = $current_image;
                }


                // update the image in the database
                $sql3 = "UPDATE menudetail SET
                    Name = '$title',
                    Description = '$description',
                    Price = $price,
                    image_name = '$image_name',
                    CategoryID = '$category',
                    Featured = '$featured',
                    active = '$active'
                    WHERE FoodID=$id
                ";

                $res3 = mysqli_query($conn, $sql3);
                if($res3==TRUE) {
                    //success
                    $_SESSION['update'] = "<div class='success'>Update Success.</div>";
                    header('location:'.HOMEURL.'admin/manage-food.php');
                } else {
                    //failed
                    $_SESSION['update'] = "<div class='error'>Failed To Update.</div>";
                    header('location:'.HOMEURL.'admin/manage-food.php');
                }
            }


        ?>




        

    </div>
</div>





<?php include("partials/footer.php"); ?>