<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Subjects</title>
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
        <h1 class='text-center bg-danger'>Feedbacks</h1>
        <br>
        <?php
            $res=mysqli_query($con,"select *from feedback");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" cellpadding="2" cellspacing="2" class="table table-striped table-hover subtable">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Rating</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $n=$row['rating'];
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email_id']."</td>";
                    echo "<td>".$row['gender']."</td>";
                    echo "<td>";
                    $i=1;
                    while($n>=$i)
                    {
                        echo "<span class='glyphicon glyphicon-star'></span>&nbsp;";
                        $i=$i+1;
                    }
                    echo "</td>";
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