<?php include('partials/menu.php');?>

<div class="main">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <br>
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
        <br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Tile of the food" >
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Image_file:</td>
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
                                        $id=$row['id'];
                                        $title=$row['title'];
                                        ?>
                                          <option value="<?php echo $id; ?>"><?php echo $title;?></option>
                                        <?php
                                        
                                    }
                                }
                                else
                                {
                                    ?>
                                        <option value="0">No category found</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                         <input type="submit" name="submit" value="Add Food" class="btn-sec">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['submit']))
        {
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $category=$_POST['category'];
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

                if(isset($_FILES['image']['name']))
                {
                    $img_name=$_FILES['image']['name'];
                    $text=end(explode('.',$img_name));
                    $img_name="food_name_".rand(0000,9999).'.'.$text;
                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path="../images/food/".$img_name;

                    $upload=move_uploaded_file($source_path,$destination_path);
                    if($upload==FALSE)
                    {
                        $_SESSION['upload']="<div class='fail'>Failed to add image</div>";
                        header('loacation:'.SITEURL.'/admin/add-food.php');
                        die();
                    }
                }
                else
                {
                    $img_name="";
                }

                $sql_1 = "INSERT INTO food SET
                title='$title',
                description='$description',
                price=$price,
                img_name='$img_name',
                category_id=$category,
                featured='$featured',
                active='$active'
                ";

                $resolve_1 = mysqli_query($conn, $sql_1);

                if($resolve_1==TRUE)
                {
                    $_SESSION['add']="<div class='success'>Food added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['add']="<div class='fail'>Failed to add Food</div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                }

        }
        else
        {

        }
        ?>
    </div>
</div>
<?php include('partials/footer.php');?>