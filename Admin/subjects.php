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
            $val=mysqli_query($con,"select * from Subject_Details");
            $num=mysqli_num_rows($val);
        ?>
        <h1 class='text-center bg-danger'>Subjects</h1>
        <h3 class='text-center'><buttton type="button" class="btn btn-success">Total subjects added <span class="badge"><?php echo "$num" ?></span></button></h3>
        <div class="butadd">
            <a href="subject_add.php" class="btn btn-danger btn-lg">Add Subject</a>
        </div>
        <br>
        <?php
            $res=mysqli_query($con,"select *from Subject_Details");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="sub">
        <table align="center" cellpadding="2" cellspacing="2" class="table table-striped table-hover subtable">
        <tr>
            <th>Subject ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Remove</th>
            <!-- <th>Add q</th> -->
            <th>Questions</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['sub_id'];
                    $name=$row['sub_name'];
                    echo "<tr>";
                    echo "<td>".$row['sub_id']."</td>";
                    echo "<td>".$row['sub_name']."</td>";
                    echo "<td><a href='subject_edit.php?sub_id=$id&sub_name=$name'><span class='glyphicon glyphicon-edit'></span></a> </td>";
                    echo "<td><a href='subject_del.php?sub_id=$id'><span class='glyphicon glyphicon-trash'></span></a> </td>";
                    // echo "<td><a href='question_add.php?sub_id=$id'><span class='glyphicon glyphicon-plus'></span></a> </td>";
                    echo "<td><a href='questions.php?sub_id=$id'><span class='glyphicon glyphicon-eye-open'></span></a> </td>";
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