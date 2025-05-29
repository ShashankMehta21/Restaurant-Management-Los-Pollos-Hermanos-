<?php include('partials/menu.php'); ?>

<div class="main">
    <div class="wrapper">
        <h1>Chang Password</h1>
        <br>
        <br>
        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }    
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password</td>
                    <td><input type="password" name="current_password" placeholder="current password"></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" name="new_password" placeholder="New password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="confirm_password" placeholder="confirm password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-sec">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['submit']))
    {
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
    }

    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password ='$current_password'";

    $resolve=mysqli_query($conn,$sql);

    if($resolve==TRUE)
    {
        $count=mysqli_num_rows($resolve);
        if($count==1)
        {
            echo "user found";
        }
        else
        {
            // $_SESSION['user-not-found'] = "<div class='fail'> User not found.</div>";
            // header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?> 

<?php include('partials/footer.php'); ?>