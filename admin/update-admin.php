<?php include('partials/menu.php'); ?>

<div class="main">
    <div class="wrapper">
        <h1>Update Admin page</h1>
        <?php 
        $id=$_GET['id'];

        $sql = "SELECT * FROM tbl_admin WHERE id=$id";

        $resolve=mysqli_query($conn,$sql);

        if($resolve==TRUE)
        {
            $count=mysqli_num_rows($resolve);

            if($count==1)
            {
                $row=mysqli_fetch_assoc($resolve);
                $full_name=$row['full_name'];
                $username=$row['username'];

            }
            else
            {
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        ?>
        <br>
        <br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ;?>" id="inp"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="user_name" value="<?php echo $username ;?>" id="inp"></td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="submit" value="update admin" class="btn-sec">
                    </td>
                </tr>
               
            </table>

        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

       $sql = "UPDATE tbl_admin SET 
       full_name='$full_name',
       username='$username' 
       WHERE id ='$id'
       ";

       $resolve=mysqli_query($conn,$sql);

       if($resolve==TRUE)
       {
        $_SESSION['update']="<div class='success'>Admin updated successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
       }
       else
       {
        $_SESSION['update']="<div class='success'>Update failed.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
       }
    }
?>

<?php include('partials/footer.php'); ?>