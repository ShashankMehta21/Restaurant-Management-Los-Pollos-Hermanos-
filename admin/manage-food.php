<?php include('partials/menu.php');?>
<div class="main">
         <div class="wrapper">
            <h1>Manage Food</h1>
            <br>
            <br>
            <a href="<?php echo SITEURL ;?>admin/add-food.php" class="btn-primary">Add Food</a>;
            <br>
            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM food";

                    $resolve=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($resolve);

                    $sn=1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($resolve))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $img_name=$row['img_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            ?>
                            <tr>
                              <td><?php echo $sn++;?></td>
                              <td><?php echo $title;?></td>
                              <td><?php echo $price;?></td>
                              <td>
                                <?php 
                                
                                     if($img_name != " ")
                                     {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $img_name ;?>"width="120px">

                                        <?php
                                    }
                                    
                                     else
                                     {
                                        echo "<div class='fail'>No Image found</div>";
                                     }
                                 ?>
                              </td>
                              <td><?php echo $featured;?></td>
                              <td><?php echo $active;?></td>
                              
                                <td>
                                    <a href="<?php echo SITEURL ;?>admin/update-food.php?id=<?php echo $id ;?>" class="btn-sec">Update</a>
                                    <a href="<?php echo SITEURL ;?>admin/delete-food.php?id=<?php echo $id ;?>&img_name=<?php echo $img_name;?>" class="btn-ter">Delete food</a>
                                </td>
                            </tr>
                            <?php

                   
                        }
                    }
                    else
                    {
                      ?>

                       <tr>
                        <td colspan="6"><div class="fail">No Food added</div></td>
                       </tr>

                      <?php
                    }
                    ?>
                
                
            </table>

            <div class="clearfix"></div>
         </div>
    </div>
<?php include('partials/footer.php');?>