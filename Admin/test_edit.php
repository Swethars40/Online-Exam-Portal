<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
            $sid=$_GET['sub_id'];
            $id=$_GET['test_id'];
            $name=$_GET['test_name'];
            $date=$_GET['test_date'];
            $dur=$_GET['test_duration'];
        ?>
        <form action="" method="post">
            <table align="center" class="table table-striped">
                <tr>
                    <td class="text-center" colspan="2"><b>Enter Test Details<b></td>
                </tr>
                <tr>
                    <td class="addrow1">Test Name</td>
                    <td><input type="text" class="form-control" name="tname" value="<?php echo "$name" ?>" required autocomplete="off"></td>
                </tr>
                <!-- <tr>
                    <td class="addrow1">Subject</td>
                    <td>
                        <select name="tsid" class="form-control">
                            <option>--select--</option>
                    <?php
                        $res=mysqli_query($con,"select * from Subject_Details");
                        if(mysqli_num_rows($res)>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                echo "<option value='".$row['sub_id']."'>".$row['sub_name']."</option>";
                            }
                        }
                    ?>
                        </select>
                    </td>
                    
                </tr> -->
                <tr>
                    <td class="addrow1">Date</td>
                    <td><input type="date" class="form-control" name="tdate" value="<?php echo "$date" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Duration</td>
                    <td><input type="number" class="form-control" name="tdur" value="<?php echo "$dur" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="UPDATE" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="test.php" class="btn btn-primary">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            extract($_POST);
            if(isset($UPDATE))
            {
                $query="update Test_Details set test_name='$tname', test_date='$tdate', test_duration='$tdur' where test_id='$id'";
                $res=mysqli_query($con,$query) or die("");
                header("Location: test.php");
            }
        ?>
    </body>
</html>