<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HomePage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <style>
            .zoom {
        
        
                transition: transform .2s; /* Animation */
                
                margin: 0 auto;
                }

            .zoom:hover {
            transform: scale(1.1); /* (150% zoom)*/
            }



            .list{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:rgb(30, 90, 150);
            margin-top: 10px;
            }
            
            li{
                float: right;
            }
            
            li a{
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            
            li a:hover{
                background-color: white;
            }

        </style>
    </head>
    <body class="bg-info">
        <?php
        include("header.php");
        include("database.php");

        ?>
        <ul class="list">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a></li>
            <li><a href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Home</a></li>
        </ul>
      

        <div class="container">
  
        <br><br>
 
        <div class="row">
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="user_details.php">
                <img src="stud.jpg" alt="Lights" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>STUDENT DETAILS</b></p>
                </div>
                </a>
            </div>
            </div>
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="subjects.php">
                <img src="images/sub.jpg" alt="Nature" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>SUBJECTS</b></p>
                </div>
                </a>
            </div>
            </div>
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="test.php">
                <img src="images/test.jpg" alt="Fjords" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>TEST</b></p>
                </div>
                </a>
            </div>
            </div>
        </div>
        <br><br>


        <div class="row">
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="marks.php">
                <img src="images/score.jpg" alt="Lights" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>MARKS</b></p>
                </div>
                </a>
            </div>
            </div>
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="leaderboard.php">
                <img src="images/lead.jpg" alt="Nature" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>LEADERBOARD</b></p>
                </div>
                </a>
            </div>
            </div>
            <div class="col-md-4">
            <div class="thumbnail zoom">
                <a href="feedbacks.php">
                <img src="images/feedback.jpg" alt="Fjords" style="width:100%; height:200px">
                <div class="caption">
                    <p><b>FEEDBACK</b></p>
                </div>
                </a>
            </div>
            </div>
        </div>
        <br><br>
        </div>
    </body>
</html>