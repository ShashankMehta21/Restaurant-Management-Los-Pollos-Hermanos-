<?php
    include('../Config/constants.php');
    
    if(isset($_GET['id']) AND isset($_GET['img_name']))
    {
        $id = $_GET['id'];
        $img_name = $_GET['img_name'];

        if($img_name !='')
        {
            $path="../images/food/".$img_name;
            $remove = unlink($path);

            if($remove==FALSE)
            {
                $_SESSION['remove'] ="<div class='success'>Fail to remove image.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }
        $sql = "DELETE FROM food WHERE id = $id ";      
        $resolve = mysqli_query($conn,$sql); 

        if($resolve==TRUE)
        {
            
            $_SESSION['delete'] ="<div class='success'>Category deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            // echo "Failed to delete";
            $_SESSION['delete'] ="<div class='fail'>Faild to delete food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
       
    }
    else
    {
       

        header('location:'.SITEURL.'admin/manage-food.php');
    }
  
    
    ?>