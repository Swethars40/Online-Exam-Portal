<?php
session_start();
extract($_SESSION);
include("database.php");
?>

<html>
    <head>
        <title></title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <!-- Font Awesome CSS -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
        <link href="quiz.css" rel="stylesheet"/>
        <script>
        function check()
        {
            var checkBox = document.getElementById("condn");
            if (checkBox.checked == true)
            {
                return true;
            } 
            else 
            {
                return false;
            }
        }   
        </script>
    </head>
    <body class="tb">
        <?php

            include('header.php');
            $tid=$_GET['test_id'];
            
            // $tname=$_GET['test_name'];
            // $dur=$_GET['test_duration'];
            // $tdate=$_GET['test_date'];
            $res=mysqli_query($con,"select *from Test_Details where test_id='$tid'");
            if(mysqli_num_rows($res)==1)
            {
                $row=mysqli_fetch_assoc($res);
                $sid=$row['sub_id'];
                $tname=$row['test_name'];

                $tdate=$row['test_date'];
                $timestamp = strtotime($tdate);
                $ndate = date("d-m-Y", $timestamp);

                $tdur=$row['test_duration'];
                $totq=$row['total_que'];
                
            }
        ?>
        <br><br><br>
        <div>  <h3 class="tesc"> <b> TERMS AND INSTRUCTIONS </b> </h3> </div>
        <div id="main"> 
            <div id="ff">
                <div class="caption">
                    <center>
                        <b><?php echo "No of Question : ".$row['total_que'] ?></b> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        <b><?php echo "Duration : ".$row['test_duration']." mins"; ?></b> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                        <b><?php echo "Total Marks : 100" ?></b>   
                    </center> 
                    <hr>       
                </div>
                <br>
                <div class="heading">
                <center><b>Please carefully read and agree to the below:</b></center>
                </div> 
                <br>
                <div class="tesp">
                   <br> 1. It is NOT advisable to attempt your test from a mobile phone. Use a laptop or desktop instead.</br>
                   <br> 2. Please ensure to load the test in the latest version of Google Chrome browser (above version 60) or latest version of Firefox.</br>
                   <br> 3. Please ensure third party cookies are enabled.</br>
                   <br> 4. The system should have uninterrupted internet connectivity.</br>
                   <br> 5. Please ensure that your system clock is set to (GMT +5:30) Mumbal, Kolkata, Chennai, New Delhi timezone.</br> 
                   <br> 6. No tab switches are allowed during the test. It may result in premature submission of the test.</br>
                   <br> 7. Any notifications or Pop-ups during the test will be counted as tab switches and may result in premature closure of your test. Please ensure that its turned off.</br>
                   <br> 8. Some Anti-virus software will prevent you from login and from taking the test. In such cases disable the anti-virus and try.</br>
                   <br> 
                    <center>
                       <form>
                            <input type="checkbox" id="condn" name="cb" value="conditions">
                            <label for="condn"> I have read and agree to the Terms and Conditions </label> 
                       </form>
                   </center>
                </div>
              </div>
              </div>
        <center>
        <div class="container">
            <a href="quiz.php?<?php echo 'testid='.$tid.'&subid='.$sid.'&tq='.$totq ?>" class="btn btn-primary" onclick="return check();">Start Test</a>
            <!-- <input type="submit" class="btn btn-primary"> -->
        </div>
        </center>
    </body>
</html>