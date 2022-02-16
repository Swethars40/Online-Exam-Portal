<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Subject Edit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
            $id=$_GET['sub_id'];
            $name=$_GET['sub_name'];
        ?>
        <form action="" method="post">
            <table align="center">
                <tr>
                    <td align="left" class="addrow1">NAME</td>
                    <td align="right"><input type="text" class="form-control addrow" name="sub_name" value="<?php echo "$name" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" class="btn btn-warning addrow" name="Update" value="Update">
                        <a href="subjects.php" class="btn btn-danger addrow">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            extract($_POST);
            if(isset($Update))
            {
                mysqli_query($con,"update Subject_Details set sub_name='$sub_name' where sub_id='$id'");
                header("Location: subjects.php");
            }
        ?>
    </body>
</html>