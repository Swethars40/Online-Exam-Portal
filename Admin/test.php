<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
            $val=mysqli_query($con,"select * from Test_Details");
            $num=mysqli_num_rows($val);
        ?>
        <h1 class='text-center bg-danger'>Test Details</h1>
        <h3 class='text-center'><buttton type="button" class="btn btn-success">Total test added <span class="badge"><?php echo "$num" ?></span></button></h3>
        <div class="butadd">
            <a href="test_add.php" class="btn btn-danger btn-lg">Add Test</a>
        </div>
        <br>
        <?php
            $res=mysqli_query($con,"select *from Test_Details");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" width="50%" cellpadding="2" cellspacing="2" class="table table-striped subtable">
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Duration</th>
            <th>Total Questions</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['test_id'];
                    $name=$row['test_name'];
                    $date=$row['test_date'];
                    $dur=$row['test_duration'];
                    $sid=$row['sub_id'];
                    $val1=mysqli_query($con,"select * from Question_Details where sub_id='$sid'");
                    $num=mysqli_num_rows($val1);
                    echo "<tr>";
                    echo "<td>".$row['test_name']."</td>";
                    $timestamp = strtotime($date);
                    $ndate = date("d-m-Y", $timestamp);
                    echo "<td>".$ndate."</td>";  
                    // echo "<td>".$row['test_date']."</td>";  
                    echo "<td>".$dur." mins</td>";
                    echo "<td>".$num."</td>";
                    echo "<td><a href='test_edit.php?test_id=$id&test_name=$name&test_date=$date&test_duration=$dur&sub_id=$sid'><span class='glyphicon glyphicon-edit'></span></a> </td>";
                    echo "<td><a href='test_del.php?test_id=$id'><span class='glyphicon glyphicon-trash'></span></a> </td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        <div class="butadd">
            <a href="admin.php" class="btn btn-warning">Back</a>
        </div>
        <br><br>
    </body>
</html>