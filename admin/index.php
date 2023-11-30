

<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Start -->
        <div class="main-content">
        <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>


                <?php 
                    if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>

                <br><br>


                <div class="col-4 text-center">
                    <?php
                        $sql_catagory = "SELECT * FROM categories";
                        $res_catagory = mysqli_query($conn, $sql_catagory);
                        $count_catagory = mysqli_num_rows($res_catagory);
                    ?>

                    <h1><?php echo $count_catagory; ?></h1>
                    <br>
                    Số loại đồ ăn
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql_food = "SELECT * FROM menudetail";
                        $res_food = mysqli_query($conn, $sql_food);
                        $count_food = mysqli_num_rows($res_food);
                    ?>

                    <h1><?php echo $count_food; ?></h1>
                    <br>
                    Số món ăn
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql_order = "SELECT * FROM orders";
                        $res_order = mysqli_query($conn, $sql_order);
                        $count_order = mysqli_num_rows($res_order);
                    ?>

                    <h1><?php echo $count_order; ?></h1>
                    <br>
                    Tổng đơn hàng
                </div>

                <div class="col-4 text-center">
                    <?php
                        $sql_total = "SELECT SUM(total) as Total FROM orders";
                        $res_total = mysqli_query($conn, $sql_total);
                        $row_total = mysqli_fetch_assoc($res_total);
                        $total = $row_total['Total'];
                    ?>

                    <h1><?php echo $total; ?></h1>
                    <br>
                    Tiền đã kiếm(VNĐ)
                </div>

                <div class="clearfix"></div>


            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('partials/footer.php') ?>
