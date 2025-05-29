<?php include('Config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- navbar start-->
    <section class="navbar">
        <div class="container">
            <div class="con">
            <div class="logo">
                <img src="./images/LOGO1.png" alt="restaurant logo" class="img-res">
            </div>
            <div class="nav-left">
                <a href="<?php echo SITEURL ;?>">Home</a>
                <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                <a href="<?php echo SITEURL;?>foods.php">Food</a>
                <a href="<?php echo SITEURL;?>about.php">About Us</a>
            </div>
        </div>
        </div>
    </section>