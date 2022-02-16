<?php
session_start();
?>
<?php
    include("header.php");
    include("database.php");
?>
<html>
    <head>
        <title>Examination Portal</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <style>
            .zoom {
        
    
                transition: transform .2s; /* Animation */
                
                margin: 0 auto;
                }

            .zoom:hover {
            transform: scale(1.1); /* (150% zoom)*/
            }

        </style>
    </head>
    <body>
        <?php
            include('user_navbar.php');
        ?>
        <br><br><br><br>
        <div class="container">
            <div class="gallery">
                
                    <?php
                        $res=mysqli_query($con,"select *from Test_Details");
                        if(mysqli_num_rows($res)>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $tname=$row['test_name'];
                                $dur=$row['test_duration'];
                                $tid=$row['test_id'];
                                $date=$row['test_date'];
                                $timestamp = strtotime($date);
                                $ndate = date("d-m-Y", $timestamp);
                    ?>
                    <div class="zoom" style="border:2px solid rgb(30, 90, 150);">
                    <figure class="gallery__item gallery__item--1">
                        <a href="instruction.php?<?php echo 'test_id='.$tid?>">
                        <img src="https://media.npr.org/assets/img/2020/09/18/gettyimages-1170941183_wide-2d21d6b4997768cbc79b3b1701ebdc3779972408.jpg?s=1400" class="gallery__img" alt="Image 1">
                        <div class="caption">
                            <p><b><?php echo $row['test_name']; ?></b></p>
                            <p><?php echo "Date : ".$ndate ?></p>
                            <p><?php echo "Duration : ".$row['test_duration']." mins"; ?></p>
                        </div>
                        </a>
                    </div>
                    </figure>
                    <?php
                            }
                        }
                    ?>
            </div>
        </div>
        <br><br>
    </body>
</html>
