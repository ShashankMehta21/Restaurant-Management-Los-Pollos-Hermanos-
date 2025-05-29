<?php include('partials/menu.php');?>

    <!-- Main content start-->
    <div class="main">
         <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            <br>
            <?php 
            // add
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                // delete
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br>
            <br>
            <a href="<?php echo SITEURL ;?>admin/add-admin.php" class="btn-primary">Add Admin</a>
            <br>
            <br>
            <table class="tbl-full">
                <tr>
                    <th>S.no</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $resolve = mysqli_query($conn,$sql);

                    if($resolve==TRUE)
                    {
                        $count = mysqli_num_rows($resolve);
                        $sn=1;
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($resolve))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <br>
                                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">change password</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-sec">Update</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-ter">Delete</a>
                                    </td>
                                </tr> 
                                <?php
                            }
                        }
                        else
                        {

                        }
                    }
                ?>

            </table>

            
         </div>
    </div>
    <!-- Main content end-->
<?php include('partials/footer.php');?>