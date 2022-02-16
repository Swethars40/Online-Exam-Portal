<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Scores</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
            $id=$_GET['reg_no'];
        ?>
        <h1 class='text-center bg-danger'>Marks</h1>
        <h1 class='text-center bg-success'><?php echo $id; ?></h1>
        <?php
            $res=mysqli_query($con,"select *from result where reg_no='$id'");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" cellpadding="2" cellspacing="2" class="table table-striped table-hover subtable">
        <tr>
            <th>Test Name</th>
            <th>Date</th>
            <th>Marks</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['reg_no'];
                    $tid=$row['test_id'];
                    $date=$row['test_date'];
                    $timestamp = strtotime($date);
                    $ndate = date("d-m-Y", $timestamp);
                    $res1=mysqli_query($con,"select * from Test_Details where test_id='$tid'");
                    $row1=mysqli_fetch_assoc($res1);
                    $name=$row1['test_name'];
                    echo "<tr>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$ndate."</td>";
                    echo "<td>".$row['score']."</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        <div class="butadd">
            <a href="marks.php" class="btn btn-warning">Back</a>
        </div>
        <br><br>
    </body>
</html>