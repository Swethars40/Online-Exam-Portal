<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
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
        <h1 class='text-center bg-danger'>Student Details</h1><br>
        <?php
            $res=mysqli_query($con,"select reg_no,name,email_id,phone_no,city from User_Registration");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <table align="center" cellpadding="2" cellspacing="2" width="100%" class="table table-striped table-hover">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>City</th>
            <th></th>
        </tr>
        
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['reg_no'];
                    echo "<tr>";
                    echo "<td>".$row['reg_no']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email_id']."</td>";
                    echo "<td>".$row['phone_no']."</td>";
                    echo "<td>".$row['city']."</td>";
                    echo "<td><a class='btn btn-danger btn-sm' href='user_del.php?reg_no=$id'><span class='glyphicon glyphicon-trash'></span></a> </td>";
                    echo "</tr>";
                }
            }
        ?>
        
        </table>
        <div class="butadd">
            <a href="admin.php" class="btn btn-warning">Back</a>
        </div>
        <br><br>
    </body>
</html>