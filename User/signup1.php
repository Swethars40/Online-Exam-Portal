<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="online_exam/styles.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("styles.css");
            include("database.php");
            extract($_POST);
            $res=mysqli_query($con,"select * from User_Registration where reg_no='$reg_no'");
            if(mysqli_num_rows($res)>0)
            {
                echo "<h1 class=\"headf\">Login id \"$reg_no\" already exists</h1>";
                echo "<img class=\"reggif2\" src=\"https://cdn.dribbble.com/users/251873/screenshots/9388228/media/0d882a65a39bbdd294edc7fee5da59c6.gif\" width=\"200\" height=\"200\"></img>";
                echo "<a href='index.php'><input class='btn btn-primary btn-rounded but3' type='button' value='Click here to go to home page'></a>";
            }
            $query="insert into User_Registration(reg_no,name,dob,gender,email_id,password,phone_no,city) values('$reg_no','$name','$dob','$gender','$email_id','$password','$phone_no','$city')";
            $res=mysqli_query($con,$query)or die("");
        ?>
        <h1 class="headr">Registered Successfully</h1>
        <img class="reggif1" src="https://techctice.com/wp-content/uploads/2020/10/Checkmark.gif" width="300"></img>
        <table align="middle">
            <tr>
                <td><a href="index.php"><input class="btn btn-primary btn-rounded but3" type="button" value="Click here to go to home page"></a></td>
            </tr>
        </table>
    </body>
</html>