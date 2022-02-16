<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Submission</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="online_exam/styles.css">
    </head>
    <body>
        <?php
            include("header.php");
            include("styles.css");
            include("database.php");
        ?>
        <h1 class="headr">Submitted Successfully</h1>
        <img class="reggif1" src="https://techctice.com/wp-content/uploads/2020/10/Checkmark.gif" width="300"></img>
        <table align="middle">
            <tr>
                <td><a href="login.php"><input class="btn btn-primary btn-rounded but3" type="button" value="Click here to go to home page"></a></td>
            </tr>
        </table>
    </body>
</html>