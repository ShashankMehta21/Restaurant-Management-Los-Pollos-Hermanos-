<!-- <link rel="stylesheet" href="../css/admin.css"> -->
<?php
    include('../Config/constants.php');
    // get the id of admin to be delete
    $id = $_GET['id'];

    // create SQL Query for deleting
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    // execute
    $resolve = mysqli_query($conn,$sql);

    // check exec or not
    if($resolve==TRUE)
    {
        // successfull
        // echo "Admin deleted";
        $_SESSION['delete'] ="<div class='success'>Admin deleted successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        // echo "Failed to delete";
        $_SESSION['delete'] ="<div class='fail'>Faild to delete.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    // redirect to M-AP
    
    ?>