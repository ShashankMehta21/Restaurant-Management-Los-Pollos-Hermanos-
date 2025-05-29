<?php include('../Config/constants.php'); 

include('login-check.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurant-Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
   
    <div class="menu">
        <div class="wrapper">
            <div class="con">
              <div class="logo">
                  <img src="../images/LOGO1.png" alt="restaurant logo" class="img-res">
              </div>
              <div class="nav-left">
                <a href="index.php">Home</a>
                <a href="manage-admin.php">Admin</a>
                <a href="manage-category.php">Category</a>
                <a href="manage-food.php">Food</a>
                <a href="manage-order.php">Order</a>
                <a href="logout.php">Logout</a>
              </div>
           </div>
        </div>
    </div>
 