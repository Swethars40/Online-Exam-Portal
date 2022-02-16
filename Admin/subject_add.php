<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Subject</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
        ?>
        <form action="" method="post">
            <table align="center">
                <tr>
                    <td align="left" class="addrow1">SUBJECT ID</td>
                    <td align="right"><input type="text" class="form-control addrow" name="sub_id" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td align="left" class="addrow1">NAME</td>
                    <td align="right"><input type="text" class="form-control addrow" name="sub_name" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" class="btn btn-warning addrow" name="ADD">
                        <a href="subjects.php" class="btn btn-danger addrow">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            extract($_POST);
            if(isset($ADD))
            {
                $res=mysqli_query($con,"select *from Subject_Details where sub_id='$sub_id'");
                if(mysqli_num_rows($res)>0)
                {
                    echo "<script>alert('Subject ID already exists')</script>";
                    exit;
                }
                else
                {
                    $query="insert into Subject_Details(sub_id,sub_name) values('$sub_id','$sub_name')";
                    $res=mysqli_query($con,$query) or die("");
                    echo "<script>alert('Subject added successfully')</script>";
                }
            }
        ?>
    </body>
</html>