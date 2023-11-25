<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>


        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>

        <br><br>


        <!-- Them vao loai muc do an -->
        <form action="" method="POST" enctype="multipart/form-data">
            
            <table class="tbl-30">
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="title" placeholder="category name">
                    </td>
                </tr>

                <tr>
                    <td>Image: </td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">

                    </td>
                </tr>


            </table>

        </form>
        <!-- Them vao loai muc do an -->
        <?php 
        
            //check whether submit is click or not
            if(isset($_POST['submit'])) {
                //echo "clicked";

                $title = $_POST['title'];
                
                //check if admin press the yes or no box
                if(isset($_POST['featured'])) {
                    $featured = $_POST['featured'];
                } else {
                    $featured = "No";
                }


                //check if admin press the yes or no box
                if(isset($_POST['active'])) {
                    $active = $_POST['active'];
                } else {
                    $active = "No";
                }



                //check if image selected or not and save the image name
                //print_r($_FILES['image']);
                if(isset($_FILES['image']['name'])) {
                    //upload the image
                    //and get source path and destination path and image name
                    $image_name = $_FILES['image']['name'];

                    //Upload image if image is selected
                    if($image_name != "") {

                        //Auto rename the image (asdasd.png -> Burger.png)
                        //Get the extention of the image (ipg, png, ...)
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
                            header('location:'.HOMEURL.'admin/add-category.php');
                            die();
                        }
                    
                    }

                } else {
                    //not uploading the image and set the name to blank
                    $image_name = "";
                }



                $sql = "INSERT INTO categories SET
                    Name='$title',
                    image_name='$image_name',
                    Featured='$featured',
                    active='$active'
                ";



                //execute the query
                $res = mysqli_query($conn, $sql);

                if($res==TRUE) {
                    // back to manage category if add successfully
                    $_SESSION['add'] = "<div class='success'> Category Added.</div>";
                    header('location:'.HOMEURL.'admin/manage-category.php');
                } else {
                    // back to manage category if add failed
                    $_SESSION['add'] = "<div class='error'> Failed To Add Category.</div>";
                    header('location:'.HOMEURL.'admin/manage-category.php');
                }

            }
        ?>






    </div>
</div>


<?php include("partials/footer.php"); ?>