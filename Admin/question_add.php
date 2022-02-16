<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Questions</title>
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
        ?>
        <form action="" method="post">
            <table align="center" class="table table-striped">

                <tr>
                    <td class="addrow1">Question</td>
                    <td><input type="text" class="form-control" name="question" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 1</td>
                    <td><input type="text" class="form-control" name="opt1" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 2</td>
                    <td><input type="text" class="form-control" name="opt2" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 3</td>
                    <td><input type="text" class="form-control" name="opt3" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 4</td>
                    <td><input type="text" class="form-control" name="opt4" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Correct Option</td>
                    <td><input type="text" class="form-control" name="correct_ans" required required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" class="btn btn-warning addrow" name="ADD"/>
                        <a href="questions.php?<?php echo 'sub_id='.$sid ?>" class="btn btn-danger addrow">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            extract($_POST);
            if(isset($ADD))
            {
                $query="insert into Question_Details(sub_id,question, opt1, opt2, opt3, opt4,correct_ans) values('$sid','$question', '$opt1', '$opt2', '$opt3', '$opt4','$correct_ans')";
                $res=mysqli_query($con,$query) or die("");
                echo "<script>alert('Question added successfully')</script>";
            }
        ?>
    </body>
</html>