<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Examination</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
    </head>
    <body>
        <?php
            include('header.php');
            include('styles.css');
            include('database.php');
            extract($_POST);
            if(isset($submit))
            {
                $res=mysqli_query($con,"select *from Admin_Login where user_name='$adminid' AND password='$adminpass'");
                if(mysqli_num_rows($res)==0)
                {
                    echo "<script>alert('Enter valid ID & Password')</script>";
                }
                else
                {
                    header("Location: admin.php");
                }
            }
        ?>
        <table class="admintab" align="center" border="0" >
            <form method="post" action="">
                <tr colspan="2" align="center">
                    <td><h3>Admin Login</h3></td>
                </tr>
                <tr>
                    <td class="arow">Login ID</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="arow"><input class="form-control" type="text" name="adminid" required></td>
                </tr>
                <tr>
                    <td class="arow">Password</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="arow"><input class="form-control" type="password" name="adminpass" required></td>
                </tr>
                <tr align="center">                    
                    <td><input class="btn btn-danger btn-lg" type="submit" name="submit" value="Login"></td>
                <tr>
            </form>
        </table>
    </body>
</html>