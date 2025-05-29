<?php 
     if(!isset($_SESSION['user']))
     {
        $_SESSION['no-login-message'] ="<div class='fail'>login to access admin panel</div>";       
        header('location:'.SITEURL.'admin/login.php');
     }
?>
