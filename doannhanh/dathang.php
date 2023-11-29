<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/contact.css">

    
</head>
<body>
    
    <main>
    <!-- Navigation bar -->
    <header class="header">
        <!-- Logo -->
        <a href="index.php" class="logo">HamBaking.</a>

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


    <section class="contact-page">

        <div class="contact-container">
            <h1>Thông tin mua hàng</h1>
            <form id="contact-form" action="#" method="post">
            <input type="text" id="name" name="name" placeholder="Tên người nhận" required>
            <input type="email" id="email" name="email" placeholder="E-mail" required>
            <input type="phone" id="phone" name="phone" placeholder="Số điện thoại" required>
            <input type="phone" id="phone" name="phone" placeholder="Tin nhắn" required>
            <button class="btn" type="submit" id="submit" name="submit">GỬI</button>
      </form>
        </div>

    </section>

    </main>


    <footer>
        <div class="container">
            <div>
                <p>HamBaking</p>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a> </li>
                    <li><a href="attorneys.php">Foundation</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
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