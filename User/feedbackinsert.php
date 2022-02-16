<?php
  include('database.php');

  if(isset($_POST['save']))
  {
    $Fname = $_POST["firstname"]; 
    $Gender = $_POST["gender"];
    $Email = $_POST["mailid"];
    $Rating = $_POST["rate"];
    
    $sql = "insert into feedback(name, email_id, gender, rating) 
        values('$Fname', '$Email','$Gender', '$Rating')";

    mysqli_query($con,$sql) or die(mysqli_error($con));
  }
  // include('thank.php');
  header('Location: login.php');
?>
