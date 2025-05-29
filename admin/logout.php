<?php 
    include('../Config/constants.php');
    session_destroy();
    header('location:'.SITEURL.'admin/login.php');
;?>