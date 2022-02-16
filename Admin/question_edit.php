<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Question Edit</title>
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
            $id=$_GET['q_id'];
            $q=$_GET['question'];
            $o1=$_GET['opt1'];
            $o2=$_GET['opt2'];
            $o3=$_GET['opt3'];
            $o4=$_GET['opt4'];
            $crt=$_GET['correct_ans'];
        ?>
        <form action="" method="post">
            <table align="center" class="table table-striped">
                <tr>
                    <td class="addrow1">Question</td>
                    <td><input type="text" class="form-control" name="question" value="<?php echo "$q" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 1</td>
                    <td><input type="text" class="form-control" name="opt1" value="<?php echo "$o1" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 2</td>
                    <td><input type="text" class="form-control" name="opt2" value="<?php echo "$o2" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 3</td>
                    <td><input type="text" class="form-control" name="opt3" value="<?php echo "$o3" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Option 4</td>
                    <td><input type="text" class="form-control" name="opt4" value="<?php echo "$o4" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="addrow1">Correct Option</td>
                    <td><input type="text" class="form-control" name="correct_ans" value="<?php echo "$crt" ?>" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" class="btn btn-warning addrow" name="UPDATE" value="Update"/>
                        <a href="questions.php?<?php echo 'sub_id='.$sid ?>" class="btn btn-danger addrow">Back</a>
                    </td>
                </tr>
            </table>
        </form>
        <?php
            extract($_POST);
            if(isset($UPDATE))
            {
                $query="update Question_Details set question='$question', opt1='$opt1', opt2='$opt2', opt3='$opt3', opt4='$opt4', correct_ans='$correct_ans' where q_id='$id'";
                $res=mysqli_query($con,$query) or die("");
                header("Location: questions.php?sub_id=".$sid);
            }
        ?>
    </body>
</html>