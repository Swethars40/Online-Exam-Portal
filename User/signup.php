<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="online_exam/styles.css">
        <script>
        function verifyPassword()
        {
            var pw1=document.getElementById("p1").value;
            var pw2=document.getElementById("p2").value;
            if(pw1!=pw2)
            {
                alert("Password & Confirm Password must be same");
                return false;
            }
        }   
        </script>
    </head>
    <body class="bg-info">
        <?php
            include("header.php");
            include("database.php");
            include("styles.css");
        ?>
        <h1 class="text-center bg-primary">REGISTRATION PAGE</h1>
        <img class="imageup" src="https://i0.wp.com/gigoloindiapvt.com/wp-content/uploads/2020/07/Register-Now-NYSCATE1.png" width="500">
        <form action="signup1.php" method="post"  onsubmit="return verifyPassword();">
            <div class="tab">
            <table align="center" border="0" cellpadding="2" cellspacing="2" class="table table-striped">
                <tr>
                    <td class="style1">REGISTER NUMBER</td>
                    <td><input class="form-control rows" type="text" name="reg_no" size="10" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="style1">NAME</td>
                    <td><input class="form-control rows" type="text" name="name" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="style1">DATE OF BIRTH</td>
                    <td><input class="form-control rows" type="date" name="dob" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="style1">GENDER</td>
                    <td>
                        <select class="form-control rows" name="gender">
                            <option>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="style1">EMAIL ID</td>
                    <td><input class="form-control rows" type="email" name="email_id" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="style1" >PASSWORD</td>
                    <td><input class="form-control rows" type="password" name="password" id="p1" required minlength="6"></td>
                </tr>
                <tr>
                    <td class="style1">CONFIRM PASSWORD</td>
                    <td><input class="form-control rows" type="password" name="cpassword" id="p2" required minlength="6"></td>
                </tr>
                <tr>
                    <td class="style1">PHONE NUMBER</td>
                    <td><input class="form-control rows" type="text" name="phone_no" required minlength="10" maxlength="10" autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="style1">CITY</td>
                    <td><input class="form-control rows" type="text" name="city" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <input class="btn btn-primary rows" type="submit">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="btn btn-primary rows" type="reset">
                    </td>
                </tr>
            </table>
            </div>
        </form>
    </body>
</html>