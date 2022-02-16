<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Students</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles1.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("database.php");
            include("header1.php");
            $val=mysqli_query($con,"select * from User_Registration");
            $num=mysqli_num_rows($val);
        ?>
        <h1 class='text-center bg-danger'>Marks</h1>
        <br>
        <?php
            $res=mysqli_query($con,"select *from User_Registration");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" cellpadding="2" cellspacing="2" class="table table-striped table-hover subtable">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>View Score</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['reg_no'];
                    $name=$row['name'];
                    echo "<tr>";
                    echo "<td>".$row['reg_no']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td><a class='btn btn-info' href='score.php?reg_no=$id'><span class='glyphicon glyphicon-eye-open'></span></a> </td>";
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