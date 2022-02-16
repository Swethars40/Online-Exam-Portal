<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Leaderboard</title>
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
        <h1 class='text-center bg-danger'>LeaderBoard</h1>
        <br>
        <?php
			$query="select reg_no,avg(score) marks from Result group by reg_no order by marks desc";
            $res=mysqli_query($con,$query);
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" cellpadding="2" cellspacing="2" class="table table-striped table-hover subtable">
        <tr>
            <th>RegNo</th>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
					$res1=mysqli_query($con,"select * from User_Registration where reg_no='$row[reg_no]'");
                    $row1=mysqli_fetch_assoc($res1);
                    $name=$row1['name'];
                    echo "<tr>";
                    echo "<td>".$row['reg_no']."</td>";
					echo "<td>".$name."</td>";
                    echo "<td>".$row['marks']."%</td>";
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