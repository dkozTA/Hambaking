<?php include('front/menu.php'); ?>
    

<section class="food-menu">
    <h2 class="text-center">Thực đơn của chúng tôi</h2>
        <div class="container">
            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM menudetail WHERE active='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $FoodID = $row['FoodID'];
                        $name = $row['Name'];
                        $description = $row['Description'];
                        $price = $row['Price'];
                        $categoryID = $row['CategoryID'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    //CHeck whether image available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo HOMEURL; ?>doannhanh/images/<?php echo $image_name; ?>">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $name; ?></h4>
                                <p class="food-price">$<?php echo $price . "đ"; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $FoodID; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
<?php include('front/footer.php'); ?>