<?php include('front/menu.php'); ?>
    

    <section class="landing">
        <h3><span>Đồ ăn ngon </span>Cho bạn</h3>
        <p>Không ngon đền tiền!</p>
        <button class="btn">Vào thực đơn</button>
    </section>
    
    <section class="services">
        <h1 style="font-size: 50px; color: white;">Loại Đồ Ăn Nổi bật</h1>


        <?php
            //Lấy những món ăn được nổi bật
            $sql = "SELECT * FROM categories WHERE active='Yes' AND Featured='Yes' LIMIT 3";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    //lấy id của món ăn r in ra
                    $id = $rows['CategoryID'];
                    $title= $rows['Name'];
                    $image_name = $rows['image_name'];
                    ?>
                    <div class="services-container">

                        <a href="services.php"  class="box-3">
                            <div>
                                <?php
                                    //lấy ảnh
                                    if($image_name =="") {
                                        echo "<div class='error'>Image Not Avalible</div>";
                                    } else {
                                        ?>
                                        <img src="<?php echo HOMEURL; ?>/doannhanh/images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>

                                <h2 class><?php echo $title; ?></h2>
                            </div>
                        </a>
                        
                    </div>
                    <?php
                }
            }
        ?>


    </section>

    
        
    </main>


<?php include('front/footer.php'); ?>