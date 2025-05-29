<?php include('partials/menu.php'); ?>

<div class="main">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <br>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br>
        <!-- enctype for uploading file -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="category title"></td>
                </tr>
                <tr>
                    <td>Image_file:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes" >Yes
                        <input type="radio" name="featured" value="no" >No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="yes"> Yes
                        <input type="radio" name="active" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                         <input type="submit" name="submit" value="Add category" class="btn-sec">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                // echo "clicked";
                $title=$_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];             
                }
                else
                {
                    $featured="No";
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];               
                }
                else
                {
                    $active="No";
                }

                // print_r($_FILES['image']);
                // die();
                if(isset($_FILES['image']['name']))
                {
                    $img_name=$_FILES['image']['name'];

                    $ext=end(explode('.',$img_name));

                    $img_name="food_variety_".rand(0000,9999).'.'.$ext;

                    $source_path=$_FILES['image']['tmp_name'];

                    $destination_path="../images/category/".$img_name;

                    $upload = move_uploaded_file($source_path,$destination_path);

                    if($upload==FALSE)
                    {
                        $_SESSION['upload']="<div class='fail'>Failed to add image</div>";
                        header('location:'.SITEURL.'/admin/add-category.php');
                        die();
                    }
                }
                else
                {
                    $img_name="";
                }

                $sql = "INSERT INTO category SET
                title='$title',
                img_name='$img_name',
                featured='$featured',
                active='$active'
                ";

                $resolve = mysqli_query($conn, $sql);

                if($resolve==TRUE)
                {
                    $_SESSION['add']="<div class='success'>Category added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['add']="<div class='fail'>Failed to add category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
           
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>
