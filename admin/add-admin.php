<?php include('partials/menu.php');?>

<div class="main">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" name="fullname" placeholder="Enter the Name" id="inp"></td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" placeholder="Enter the Username" id="inp"></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter the Password" id="inp"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-sec">
                        </td>
                    </tr>
                </table>
            </form>
           
        </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 

    if(isset($_POST['submit']))
    {  
        $fullname = $_POST['fullname'];

        $username = $_POST['username'];

        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET
            full_name = '$fullname',
            username = '$username',
            password = '$password'
        ";

        // echo $sql;
        // localhost,root,password

        $resolve = mysqli_query($conn,$sql) or die(mysqli_error());

        if($resolve==TRUE)
        {
            // echo "Data inserted";
            // display
            $_SESSION['add']='<div class="success">Admin added successfully.</div>';
            // redirect to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            // echo "Data does't inserted";
            $_SESSION['add']='Failed to add admin';
            // redirect to manage admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
   
?>
