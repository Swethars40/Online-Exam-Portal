<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="profile.css">

    <style type="text/css">

      table, th, td{
        border: none;
      }
      .hidden {
        display: none;
      }
      .btn{
        margin-left: 50px;
        
        cursor: pointer; 
/*            border: 1px solid #3498db; 
*/      background-color: transparent; 
        height: 50px; 
        width: 150px; 
        color: #3498db; 
        font-size: 1.5em; 
        box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6); 
      }
      /*.score{
        border: none;
        margin-left: 55px;
        margin-right: 55px;
        width: auto;
        height: auto;       
      }*/
      .btn-info{
        text-align: center;
        width: auto;
      }
    </style>
</head>

<body>

  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <h2 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">User profile</h2>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="icon.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">

            <?php
              include ("database.php"); 
              $regno = '19EUCS157';

              $rs1=mysqli_query($con,"select * from user_registration where reg_no='$regno'");

                  if(mysqli_num_rows($rs1)==1)
                  {
                    $row=mysqli_fetch_assoc($rs1);
                    $Name=$row['name'];

                  echo '<span class="mb-0 text-sm  font-weight-bold">'.$Name.'</span>';
                echo '</div>';
              echo '</div>';
            echo '</a>';
            echo '<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">';
               echo '<div class=" dropdown-header noti-title">';
                 echo '<h6 class="text-overflow m-0">Welcome!</h6>';
               echo '</div>';
            echo '</div>';
          echo '</li>';
        echo '</ul>';
      echo '</div>';
    echo '</nav>';

    // <!-- Header -->
    echo '<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-size: cover; background-position: center top;">';
      // <!-- Mask -->
      echo '<span class="mask bg-gradient-default opacity-8"></span>';
      // <!-- Header container -->
      echo '<div class="container-fluid d-flex align-items-center">';
        echo '<div class="row">';
          echo '<div class="col-lg-7 col-md-10">';
            echo '<h1 class="display-2 text-white">Hello '.$Name.' !</h1>';
            echo '<p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you have made with your test and manage your profie informations</p>';
            echo '<a href="" class="btn btn-info" style="background-color:#3498db; text-align:center; color:white">Edit Profile</a>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
    }
  ?>
  <br>
  <br>

  <?php
              include ("database.php"); 
              $regno = '19EUCS157';

              $rs=mysqli_query($con,"select * from user_registration where reg_no='$regno'");

                  if(mysqli_num_rows($rs)==1)
                  {
                    $row=mysqli_fetch_assoc($rs);
                    $Name=$row['name'];
                    $Regno=$row['reg_no'];
                    $Email=$row['email_id'];
                    $Dob=$row['dob'];
                    $Gender=$row['gender'];
                    $City=$row['city'];
                    $Phone=$row['phone_no'];
                  }
            ?>

    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="icon.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <br><br>
            <br><br>
            <br><br>

            
                <div class="text-center">
                <h3 style="font-family:"Times New Roman",Times, serif; font-size: 20px;"><?php 
                  echo $Regno?> <span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"><?php echo $Name?></i>
                </div>
              </div>
          </div>

        <br><br>

        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0" style="font-size:20px;">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4" style="font-size:16px;">User information</h6>
                <div class="pl-lg-4" style="font-size:30px;">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-name">Name</label>
                        <input type="text" id="input-name" class="form-control form-control-alternative" value="<?php echo ($Name);?>" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-regno">Register Number</label>
                        <input type="text" id="input-regno" class="form-control form-control-alternative" value="<?php echo ($Regno);?>" />
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-dob">Date of Birth</label>
                        <input type="text" id="input-dob" class="form-control form-control-alternative" placeholder="yyyy-mm-dd" value="<?php echo ($Dob);?>" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-gender">Gender</label>
                        <input type="text" id="input-gender" class="form-control form-control-alternative" value="<?php echo ($Gender);?>" />
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="abc@example.com" value="<?php echo ($Email);?>" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-phno">Phone Number</label>
                        <input type="text" id="input-phno" class="form-control form-control-alternative" value="<?php echo ($Phone);?>" />
                      </div>
                    </div>
                
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" value="<?php echo ($City);?>" />
                      </div>
                    </div>
                    
                  </div>
                </div>
              </form>
            
            
 
  <hr>
  <h6 class="heading-small text-muted mb-4" style="font-size:16px;">Exam information</h6>

  <button class='btn' onClick='toggleTable()'>SCORE</button> 
  <br><br>

  <center>
  <table id='myTable' style='width:50%; text-align:center;' class='hidden'>
  <tr>
  <th>Test Name</th>
  <th>Test Date</th>
  <th>Marks</th>
  </tr>

        <?php
            include ("database.php"); 
                  $regno = '19EUCS157';
          
                  //$records3 = mysqli_query($con, "SELECT sub_name,marks From score where Reg_no=$regno");
                  
                  
                  $rs2=mysqli_query($con,"select * from result where reg_no='$regno'");
                  // $testid='';
                  // $score='';
                  if(mysqli_num_rows($rs2)>0)
                  {
                    while($row1=mysqli_fetch_assoc($rs2))
                    {

                      $testid=$row1['test_id'];
                      $score=$row1['score'];

                    //echo "<p> testid: ".$testid."</p>";

                      $rs3=mysqli_query($con,"select * from test_details where test_id='$testid'");
                      // $subid="";
                      // $testname="";
                      if(mysqli_num_rows($rs3)>0)
                      {
                        $qrow=mysqli_fetch_assoc($rs3);

                        $subid=$qrow['sub_id'];
                        $testname=$qrow['test_name'];
                        $date=$qrow['test_date'];
                        
                        $rs4=mysqli_query($con,"select * from Subject_details where sub_id='$subid'");
                        //$subname="";
                        if(mysqli_num_rows($rs4)>0)
                        {
                          $row3=mysqli_fetch_assoc($rs4);
                          $subname=$row3['sub_name'];

                        echo "<tr>";
                        echo "<td>  " . $testname . "  </td> " ;
                        echo "<td>  " . $date . "  </td>";
                        echo "<td>  " . $score . "  </td>";
                        echo "</tr>";      
                      
                        
                        }
                      }
                    }
                  }
              ?>
                            </table>
                          </center>
                          <br>
                          <br>

                        </div>
                      </div>
                    </div>    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

       <br><br>    

  <script>
    function toggleTable() {
    document.getElementById("myTable").classList.toggle("hidden");
    }
  </script> 

</body>
</html>