<?php include('partials/menu.php');?>
<?php
    if(isset($_GET['id']))
    {
        $id= $_GET['id'];

        $sql2 = "SELECT * FROM food WHERE id=$id";

        $resolve2=mysqli_query($conn,$sql2);

        $row2=mysqli_fetch_assoc($resolve2);
        
      
        $title=$row2['title'];
        $description=$row2['description'];
        $price=$row2['price'];
        $current_img=$row2['img_name'];
        $current_category=$row2['category_id'];
        $featured=$row2['featured'];
        $active=$row2['active'];
    }
    else
    {
        //  $_SESSION['add']="<div class='success'>Food added successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>

<div class="main">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>
        <br>
        <form action=""method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>" >
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" ><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Current_image:</td>
                    <td>
                        <?php 
                            if($current_img == "")
                            {
                                echo "<div class='fail'>Image not available</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL ; ?>images/food/<?php echo $current_img;?> " width="120px" >
                                <?php
                                
                            }
                        ?>
                    </td>
                    
                </tr>
                <tr>
                    <td>New_Img:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                                $sql="SELECT * FROM category WHERE active='Yes'";

                                $resolve=mysqli_query($conn,$sql);

                                $count = mysqli_num_rows($resolve);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($resolve))
                                    {
                                        $category_title=$row['title'];
                                        $category_id=$row['id'];
                                        ?>
                                          <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title;?></option>
                                        <?php
                                        
                                    }
                                }
                                else
                                {
                                    ?>
                                        <option value="0">Category not available</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($active=="Yes") {echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No") {echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="current_img" value="<?php echo $current_img;?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-sec">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_img=$_POST['current_img'];
                $category=$_POST['category'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $img_name=$_FILES['image']['name'];
                    if($img_name != "")
                    {
                        $ext=end(explode('.',$img_name));
                        $img_name="food_name_".rand(0000,9999).'.'.$ext;
                        $src_path=$_FILES['image']['tmp_name'];
                        $dest_path="../images/food/".$img_name;
                        $upload=move_uploaded_file($src_path,$dest_path);
                        if($upload==FALSE)  
                        {
                            $_SESSION['upload']="<div class='fail'>Failed to add image</div>";
                            header('loacation:'.SITEURL.'/admin/manage-food.php');
                            die();
                        }
                        if($current_img != "")
                        {
                            $path="../images/food/".$current_img;
                            $remove = unlink($path);

                            if($remove==FALSE)
                            {
                                $_SESSION['remove'] ="<div class='fail'>Fail to remove image.</div>";
                                header('location:'.SITEURL.'admin/manage-food.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $img_name=$current_img;
                    }
                }
                else
                {
                    $img_name=$current_img;
                }
                $sql3 = "UPDATE food SET
                   title='$title',
                   description='$description',
                   price=$price,
                   img_name='$img_name',
                   category_id='$category',
                   featured='$featured',
                   active='$active'
                   WHERE id=$id
                ";

                $resolve3=mysqli_query($conn,$sql3);

                if($resolve3==TRUE)
                {
                    $_SESSION['update'] ="<div class='success'>Updated successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['update'] ="<div class='success'>Failed to update file.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }

        ?>
    </div>
</div>
<?php include('partials/footer.php');?>