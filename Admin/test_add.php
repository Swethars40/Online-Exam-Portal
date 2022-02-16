<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body class="bg-info">
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
        ?>
        <br><br>
        <div class="sub">
        <form action="" method="post">
            <table align="center" class="table table-striped table-hover">
                <tr>
                    <td class="text-center" colspan="2"><b>Enter Test Details<b></td>
                </tr>
                <tr>
                    <td class="addrow1">Test Name</td>
                    <td><input type="text" class="form-control" name="test_name" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Subject</td>
                    <td>
                        <select name="sub_id" class="form-control">
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
                    
                </tr>
                <tr>
                    <td class="addrow1">Date</td>
                    <td><input type="date" class="form-control" name="test_date" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Duration</td>
                    <td><input type="number" class="form-control" name="test_duration" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="btn btn-primary" name="ADD">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="test.php" class="btn btn-primary">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        </div>
        <?php
            extract($_POST);
            if(isset($ADD))
            {
                $query1="insert into Test_Details(sub_id,test_name,test_date,test_duration) values('$sub_id','$test_name', '$test_date', '$test_duration')";
                $res=mysqli_query($con,$query1);
                $query2=mysqli_query($con,"select * from Question_Details where sub_id='$sub_id'");
                $val=mysqli_num_rows($query2);
                $res1=mysqli_query($con,"update Test_Details set total_que='$val' where sub_id='$sub_id'");
                header("Location: test.php");
            }
        ?>
    </body>
</html>