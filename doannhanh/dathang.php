<?php include('/xampp/htdocs/Hambaking/config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/dathang.css">

    
</head>
<body>
    
    <main>
    <!-- Navigation bar -->
    <header class="header">
        <!-- Logo -->
        <a href="index.html" class="logo">HamBaking.</a>

        <!-- Hamburger icon -->
        <input class="side-menu" type="checkbox" id="side-menu"/>
        <label class="hamburger" for="side-menu"><span class="hamburger-line"></span></label>

        <!-- Menu -->
        <nav class="nav">
            <ul class="menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="services.php">Thực đơn</a> </li>
                <li><a href="attorneys.php">Sáng Lập</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">Về HamBaking</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
        </nav>
    </header>

    <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM menudetail WHERE FoodID=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['Name'];
                $price = $row['Price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.HOMEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.HOMEURL);
        }
    ?>

    <section class="contact-page">

        <div class="contact-container">
            
            <h1>Đồ ăn đã chọn</h1>
            <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo HOMEURL; ?>doannhanh/images/food/<?php echo $image_name; ?>" style="width: 260px; height: 200px;">
                                <?php
                            }
                        
                        ?>
            <h2><?php echo $title; ?></h2>
            <input type="hidden" name="food" value="<?php echo $title; ?>">
            <p class="food-price">  <?php echo $price; ?>VND</p>
            <input type="hidden" name="price" value="<?php echo $price; ?>">
            <div class="order-label">Quantity</div>
            <input type="number" name="qty" placeholder="Số lượng" value="1" required>


            <h1>Thông tin mua hàng</h1>
            <form id="contact-form" action="#" method="post">
                
            <input type="text" name="full_name" placeholder="Tên người nhận" required>
            <input type="tel" name="CustomerID" placeholder="Số điện thoại người đặt" required>
            <input type="tel" name="contact" placeholder="Số điện thoại người nhận" required>
            <input type="text" name="address" placeholder="địa chỉ" required>
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary">
      
        </div>
        
        <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['CustomerID'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO orders SET 
                        food = '$food',
                        price = $price,
                        quantity = $qty,
                        total = $total,
                        OrderDate = '$order_date',
                        status = '$status',
                        CustomerName = '$customer_name',
                        contact = '$customer_contact',
                        address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.HOMEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.HOMEURL);
                    }

                }
            
            ?>
        

    </section>

    </main>


    <footer>
        <div class="container">
            <div>
                <p>HamBaking</p>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.html">Services</a> </li>
                    <li><a href="attorneys.html">Foundation</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <p>1900-1533</p>
                <p>Giao hàng tận nơi</p>
                <ul>
                    <li><a href="#">Chính sách và quy định chung</a></li>
                    <li><a href="#">Chính sách thanh toán khi đặt hàng</a></li>
                    <li><a href="#">Chính sách hoạt động</a></li>
                    <li><a href="#">Chính sách bảo mật thông tin</a></li>
                    <li><a href="#">Hướng dẫn đặt phần ăn</a></li>
                </ul>
            </div>

            <div>
                <p>Liên hệ</p>
                <span>39 Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Hà Nội</span>
                <ul>
                    <li><a href="#">+84 366-609-380</a></li>
                    <li><a href="#">+84 737-820-79</a></li>
                    <li><a href="#">nguyenvietson31102004@gmail.com</a></li>
                </ul>

                <div class="social">
                    <p>Kết nối</p>
                    <a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt=""></a>
                    <a href="https://www.instagram.com/" target="_blank"><img src="images/instagram.png" alt=""></a>
                    <a href="https://www.twitter.com/" target="_blank"><img src="images/twitter.png" alt=""></a>
                    <a href="https://www.linkedin.com/" target="_blank"><img src="images/linkedin.png" alt=""></a>
                </div>
            </div>
        </div>
        
        <p style="text-align: center; font-size: 17px; color:white; ">Copyright &copy; 2023 HamBaking Vietnam </p>
    </footer>