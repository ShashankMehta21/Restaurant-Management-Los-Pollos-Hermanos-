<?php include('partials/menu.php');?>
<div class="main">
         <div class="wrapper">
            <h1>Manage Category</h1>
            <br>
            <br>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
        ?>
        <br>
            <a href="<?php echo SITEURL ;?>admin/add-category.php" class="btn-primary">Add Category</a>
            <br>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.no</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM category";

                    $resolve=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($resolve);

                    $sn=1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($resolve))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $img_name=$row['img_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];

                            ?>
                         

                              <tr>
                              <td><?php echo $sn++ ; ?></td>
                              <!-- <td><?php echo  $id ; ?></td> -->
                              <td><?php echo  $title ; ?></td>
                              <td>
                                <?php 
                                    if($img_name != "")
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $img_name ;?>"width="120px">

                                        <?php
                                    } 
                                    else
                                    {
                                        echo "<div class='fail'>No Image found</div>";
                                    }
                                ?>
                            </td>
                              <td><?php echo  $featured ; ?></td>
                              <td><?php echo  $active ; ?></td>
                              <td>
                                  <!-- <a href="" class="btn-sec">Update Category</a> -->
                                  <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?> &img_name=<?php echo $img_name;?>" class="btn-ter">Delete Category</a>
                              </td> 
                              </tr>
                              <?php
                        }
                    }
                    else
                    {
                      ?>

                       <tr>
                        <td colspan="6"><div class="fail">No category added</div></td>
                       </tr>

                      <?php
                    }
                ?>
                
                
            </table>

            <div class="clearfix"></div>
         </div>
    </div>
<?php include('partials/footer.php');?>