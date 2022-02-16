<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

if(isset($subid) && isset($testid))
{
	$_SESSION['sid']=$subid;
	$_SESSION['tid']=$testid;
	header("location:quiz.php");
}
if(!isset($_SESSION['sid']) || !isset($_SESSION['tid']))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="quiz.css" rel="stylesheet">

<script type="text/javascript">
		var counter = 61;

		setInterval( function(){
			counter--;

			if(counter >= 0){
				id = document.getElementById("count");
				id.innerHTML = counter;
			}

			if(counter == 0)
			{
				document.getElementById("op1").disabled = true;  
				document.getElementById("op2").disabled = true;  
				document.getElementById("op3").disabled = true;  
				document.getElementById("op4").disabled = true;  
				
			}
		}, 1000);


	</script> 
</head>

<body class="bg-info">

<?php

include('user_navbar.php');
include("styles.css");
?>



<?php
$rs=mysqli_query($con,"select * from question_details where sub_id=$sid",$cn) or die(mysqli_error($con));
if(!isset($_SESSION['qn']))
{
	$_SESSION['qn']=0;
	mysqli_query("delete from user_answer where sess_id='" . session_id() ."'") or die(mysqli_error($con));
	$_SESSION['trueans']=0;
	
}
else
{	
		if($submit=='Next Question')
		{
			if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into user_answer(sess_id, reg_no, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."','$reg_no', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($con));
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}
			}
			$_SESSION['qn']=$_SESSION['qn']+1;
		}
		else if($submit=='Submit Test')
		{
			if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION['qn']);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($con,"insert into user_answer(sess_id, reg_no, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."','$reg_no', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($con));
				if($ans==$row[7])
				{
							$_SESSION['trueans']=$_SESSION['trueans']+1;
				}

				$_SESSION['qn']=$_SESSION['qn']+1;
				$d=date("Y/m/d");
				$val=($_SESSION['trueans']/$_SESSION['qn'])*100;
                $query="insert into Result values('$reg_no','$tid','$d','$val')"; 
				mysqli_query($con,$query) or die(mysqli_error());
				?>
				<br><br><br>
				<h1 class="headr">Test Submitted Successfully</h1>
				<br><br><br>
				<?php 
					include("feedback.php"); 
				?>
				<?php
				unset($_SESSION['qn']);
				unset($_SESSION['sid']);
				unset($_SESSION['tid']);
				unset($_SESSION['trueans']);
				exit;
			}
			else
			{
				$_SESSION['qn']=$_SESSION['qn']+1;
				$d=date("Y/m/d");
				$val=($_SESSION['trueans']/$_SESSION['qn'])*100;
                $query="insert into Result values('$reg_no','$tid','$d','$val')"; 
				mysqli_query($con,$query) or die(mysqli_error($con));
				?>
				<br><br><br>
				<h1 class="headr">Submitted Successfully</h1>
				<?php 
					include("feedback.php"); 
				?>
				<?php
				unset($_SESSION['qn']);
				unset($_SESSION['sid']);
				unset($_SESSION['tid']);
				unset($_SESSION['trueans']);
				exit;
			}
				
		}
}

$rs=mysqli_query($con,"select * from question_details where sub_id=$sid",$cn) or die(mysqli_error($con));
if($_SESSION['qn']>mysqli_num_rows($rs)-1)
{
unset($_SESSION['qn']);
echo "<center>";
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";
echo "</center>";
exit;
}
mysqli_data_seek($rs,$_SESSION['qn']);
$row= mysqli_fetch_row($rs);

echo "<form method=post action=quiz.php>";
$n=$_SESSION['qn']+1;
echo "<div class='wrapper'>";
	echo "<div class='quiz'>";
		echo "<div class='quiz_header'>";
			echo "<div class='quiz_user'>";
				echo "<h4>Welcome!!<b> ".$reg_no."</b></h4>";
			echo "</div>";

			echo "<div class='quiz_timer'>";
				echo "<span id='count' class='time'>--</span>";
			echo "</div>";
		echo "</div>";
		echo "<div class='quiz_body'>";
			echo "<table> <tr> <td width=30>&nbsp;<td> <table>";
			echo "<tr><td><span class='style2 ques'><b>Q".  $n .": $row[2]</b>";
			echo "<div class='option_group'>";
				echo "<div class='flex'>"; 
				echo "<tr><td class='option'><li><input type='radio' name='ans' id='op1' value='1'>  $row[3]</li>";
				echo "</div>";
				echo "<div class='flex'>";
				echo "<tr><td class='option'><li><input type='radio' name='ans' id='op2' value='2'>  $row[4]</li>";
				echo "</div>";
				echo "<div class='flex'>";
				echo "<tr><td class='option'><li><input type='radio' name='ans' id='op3' value='3'>  $row[5]</li>";
				echo "</div>";
				echo "<div class='flex'>";
				echo "<tr><td class='option'><li><input type='radio' name='ans' id='op4' value='4'>  $row[6]</li>";
				echo "</div>";
			echo "</div>";
		echo "</div>";

			if($_SESSION['qn']<mysqli_num_rows($rs)-1)
			{
				echo "<tr><td><input class='btn btn-primary' type=submit name=submit value='Next Question'>"?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "<input class='btn btn-primary' type=submit name=submit value='Submit Test'></form>";
			}
			
			else
				echo "<tr><td><input class='btn btn-primary' type=submit name=submit value='Submit Test'></form>";
			echo "</table></table>";
			
	echo "</div>";
echo "</div>";
echo "</div>";

?>
<br><br>

</body>
</html>