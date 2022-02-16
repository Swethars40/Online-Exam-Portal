<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Questions</title>
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
            $val=mysqli_query($con,"select * from Question_Details where sub_id='$sid'");
            $num=mysqli_num_rows($val);
            mysqli_query($con,"update Subject_Details set tques='$num' where sub_id='$sid'");
        ?>
        <h1 class="text-center bg-danger">Questions</h1>
        <h3 class='text-center'><buttton type="button" class="btn btn-success">Total questions added <span class="badge"><?php echo "$num" ?></span></button></h3>
        <div class="butadd">
            <a href="question_add.php?<?php echo'sub_id='.$sid?>" class="btn btn-danger btn-lg">Add Questions</a>
        </div>
        <br>
        <?php
            $res=mysqli_query($con,"select *from Question_Details where sub_id='$sid'");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <br>
        <div class="">
        <table align="center" width="50%" cellpadding="2" cellspacing="2" class="table table-striped subtable">
        <tr>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Correct Option</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['q_id'];
                    $q=$row['question'];
                    $o1=$row['opt1'];
                    $o2=$row['opt2'];
                    $o3=$row['opt3'];
                    $o4=$row['opt4'];
                    $crt=$row['correct_ans'];
                    echo "<tr>";
                    echo "<td>".$row['question']."</td>";
                    echo "<td>".$row['opt1']."</td>";
                    echo "<td>".$row['opt2']."</td>";
                    echo "<td>".$row['opt3']."</td>";
                    echo "<td>".$row['opt4']."</td>";
                    echo "<td>".$row['correct_ans']."</td>";
                    echo "<td><a href='question_edit.php?sub_id=$sid&q_id=$id&question=$q&opt1=$o1&opt2=$o2&opt3=$o3&opt4=$o4&correct_ans=$crt'><span class='glyphicon glyphicon-edit'></span></a> </td>";
                    echo "<td><a href='question_del.php?q_id=$id&sub_id=$sid'><span class='glyphicon glyphicon-trash'></span></a> </td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        <div class="butadd">
            <a href="subjects.php" class="btn btn-warning">Back</a>
        </div>
        <br><br>
    </body>
</html>