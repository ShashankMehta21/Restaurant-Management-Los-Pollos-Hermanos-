<?php include('../Config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/admin.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="logg">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <br>
        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter Username">
            <br>
            <br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter password">
            <br>
            <br>

            <input type="submit" name="submit" value="login" class="btn-primary">
        </form>
        <!-- <p class="text-center">yo yo yo</p> -->
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $resolve=mysqli_query($conn, $sql);

        $count=mysqli_num_rows($resolve);

        if($count==1)
        {
            
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user']=$username;
            header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['login'] = "<div class='fail'>Username or Password does't match.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>