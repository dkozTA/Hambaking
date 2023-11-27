<?php include('/xampp/htdocs/Hambaking/config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/services.css">
    <link rel="stylesheet" href="css/attorneys.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/categories.css">
    
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
                <li><a href="<?php echo HOMEURL; ?>doannhanh/index.php">Trang chủ</a></li>
                <li><a href="<?php echo HOMEURL; ?>doannhanh/services.php">Thực đơn</a> </li>
                <li><a href="<?php echo HOMEURL; ?>doannhanh/attorneys.php">Sáng Lập</a></li>
                <li><a href="<?php echo HOMEURL; ?>doannhanh/blog.php">Blog</a></li>
                <li><a href="<?php echo HOMEURL; ?>doannhanh/about.php">Về HamBaking</a></li>
                <li><a href="<?php echo HOMEURL; ?>doannhanh/contact.php">Liên hệ</a></li>
            </ul>
        </nav>
    </header>