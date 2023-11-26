<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>


        <?php
            //check if id is set or not
            if(isset($_GET['id'])) {

                //get id
                $id = $_GET['id'];

                //create query
                $sql = "SELECT * FROM categories WHERE CategoryID=$id";

                //querying
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                if($count==1) {
                    //get data
                    $rows = mysqli_fetch_assoc($res);
                    $title = $rows['Name'];
                    $current_image = $rows['image_name'];
                    $featured = $rows['Featured'];
                    $active = $rows['active'];
                } else {
                    $_SESSION['no-category-found'] = "<div class='error'>No Category Found.</div>";
                    header('location:'.HOMEURL.'admin/manage-category.php');
                }
            } else {
                //back
                header('location:'.HOMEURL.'admin/manage-category.php');
            }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                        <?php 
                            if($current_image != "") {
                                //dispaly image
                                ?>

                                <img src="<?php echo HOMEURL; ?>doannhanh/images/category/<?php echo $current_image; ?>" width="500px" >

                                <?php

                                
                            } else {
                                //return error message
                                echo "<div class='error'> Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>


                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>



        <?php 
            if(isset($_POST['submit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //check image is selected
                if(isset($_FILES['image']['name'])) {

                    //get image details
                    $image_name = $_FILES['image']['name'];

                    //check image is avalible
                    if($image_name != "") {

                        //Upload new image and remove current image
                        $ext = explode('.', $image_name);
                        $tmp = end($ext);
                        $image_name = "Food_Category_".rand(000, 999).'.'.$tmp;


                        $source_path = $_FILES['image']['tmp_name'];


                        $destination_path = "../doannhanh/images/category/".$image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check if image if uploaded or not
                        if($upload==FALSE) {
                            //stop the progress and return with error message
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image.</div>";
                            header('location:'.HOMEURL.'admin/manage-category.php');
                            die();
                        }

                        //remove current image here.
                        if($current_image != "") {
                            $remove_path = "../doannhanh/images/category/".$current_image;

                            $remove = unlink($remove_path);

                            //check if image is remove or not
                            if($remove==FALSE) {
                                $_SESSION['failed-remove'] = "<div class='error'> Failed To Remove Current Image.</div>";
                                header('location:'.HOMEURL.'admin/manage-category.php');
                                die();
                            }
                        }
                        

                    } else { //keep the image the same if user not change the image
                        $image_name = $current_image;
                    }



                } else {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE categories SET
                    Name = '$title',
                    image_name = '$image_name',
                    Featured = '$featured',
                    active = '$active'
                    WHERE CategoryID=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==TRUE) {
                    $_SESSION['update'] = "<div class='success'> Category Update Sucessfully.</div>";
                    //head back
                    header('location:'.HOMEURL.'admin/manage-category.php');
                } else {
                    $_SESSION['update'] = "<div class='failed'> Failed To Update Category.</div>";
                    //head back
                    header('location:'.HOMEURL.'admin/manage-category.php');
                }

            }
        ?>


    </div>
</div>

<?php include('partials/footer.php') ?>