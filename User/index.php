<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Online Examination</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="styles.css"> -->
    </head>
    <body>
        <?php
            include('styles.css');
            include('header.php');
            include('database.php');
            extract($_POST);
            if(isset($submit))
            {
                $res=mysqli_query($con,"select * from User_Registration where reg_no='$id' AND password='$pw'");
                if(mysqli_num_rows($res)==0)
                { 
                    echo "<script>alert('Enter valid ID & Password')</script>";
                }
                else
                {
                    header("Location: login.php");
                }
            }
        ?>
        <blockquote>
            <p align="left" class="moving"><span><marquee><br>Welcome to Online examination portal. Enter your login credentials to start the exam.</marquee></span></p>
        </blockquote>
        <h2 class="bg-danger text-center">LOGIN PAGE</h2><br>
        <div class="image1"><img src="login_img.jpg" width="100" height="100"></div>
        <div class="display">
            <table align="center" border="0" >
                <form method="post" action="">
                    <tr>
                        <th class="text-primary">LOGIN ID </th>
                        <th><input class="form-control rows1" type="text" size="25" name="id" id="log_id" required autocomplete="off"/></th>
                    </tr>
                    <tr>
                        <th class="text-primary">ENTER PASSWORD</th>
                        <th><input class="form-control rows1" type="password" name="pw" id="log_pass" required autocomplete="off"/></th>
                    </tr>
                    <tr>
                        <th class="but1">
                            <a class="btn btn-success " href="signup.php">New user ? Click Here</a>
                        </th>
                        <th class="but2">
                            <input class="btn btn-danger" type="submit" name="submit" id="submit" Value="Login"/>
                        </th>
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>