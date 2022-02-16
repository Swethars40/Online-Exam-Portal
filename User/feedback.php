<?php
session_start();
include('database.php');
?>

<!DOCTYPE html>    
<html>    
<head>    
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" type="text/css" href="ratingstyle.css"> 
<style>    
*{    
  box-sizing: border-box;

}    
    
input[type=text], select, textarea {    
  width: 100%;    
  padding: 12px;    
  border: 1px solid rgb(70, 68, 68);    
  border-radius: 4px;    
  resize: vertical;    
}    

input[type=email], select, textarea {    
  width: 100%;    
  padding: 12px;    
  border: 1px solid rgb(70, 68, 68);    
  border-radius: 4px;    
  resize: vertical;    
}    
    
label {    
  padding: 12px 12px 12px 0;    
  display: inline-block;    
}    
    
input[type=submit] {    
  /* background-color: rgb(37, 116, 161);     */
  color: black;    
  padding: 12px 20px;    
  border: none;    
  border-radius: 4px;    
  cursor: pointer;    
  float: right;    
}    
    
input[type=submit]:hover {    
  background-color: #3399ff;    
}    
    
.container {    
  color: white;
  border-radius: 10px;    
  border-color: 2px solid black;
  background-color: rgb(30, 90, 150);    
  padding: 80px; 
  margin-top: 30px; 
  margin-bottom: 30px;  
  width: 50%;
  height: 95%;
}    
    
.col-25 {    
  float: left;    
  width: 25%;    
  margin-top: 6px;   
  margin-left: 50px;
  font-family: "Times New Roman", Times, serif; 
}    
    
.col-75 {    
  color: black;
  float: left;    
  width: 50%;    
  margin-top: 8px;    
} 

.col{
  float: left;
  margin-top: 0px;
  margin-left: 5px;
}

h2
{
  font-family: "Times New Roman", Times, serif;
}
    
/* Clear floats after the columns */    
.row:after {    
  content: "";    
  display: table;    
  clear: both;    
}    
    
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */    

/*----------------*/
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:white;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>    
</head>    
<body >  

<center>
<h2><b>FEED BACK FORM</b></h2>
<div class='container'>
  <form method="post" action='feedbackinsert.php'>    
    <div class='row'>    
      <div class='col-25'>    
        <b><label for='fname'>Name</label></b>
      </div>    
      <div class='col-75'>    
        <input type='text' id='fname' name='firstname' placeholder='Your name..''>    
      </div>    
    </div> 
    <br><br>   
    <div class='row'>    
      <div class='col-25'>    
        <b><label for='gender'>Gender</label></b>   
      </div> 
      <br>   
      <div class='col'>    
        <input type='radio' id='gender' name='gender' value='male'> Male
        <input type='radio' id='gender' name='gender' value='female'> Female    
      </div>    
    </div> 
    <br><br> 
    <div class='row'>    
        <div class='col-25'>    
          <b><label for='email'>Mail Id</label></b> 
        </div>    
        <div class='col-75'>    
          <input type='email' id='email' name='mailid' placeholder='Your mail id..'>    
        </div>    
      </div>  
    <br><br>  
    <div class='row'>
      <div class='col-25'>    
        <b><label for='rating'>Rate your Experience</label></b>    
      </div>    
    <div class='rate'>
    <input type='radio' id='star5' name='rate' value='5' />
    <label for='star5' title='text'>5 stars</label>
    <input type='radio' id='star4' name='rate' value='4' />
    <label for='star4' title='text'>4 stars</label>
    <input type='radio' id='star3' name='rate' value='3' />
    <label for='star3' title='text'>3 stars</label>
    <input type='radio' id='star2' name='rate' value='2' />
    <label for='star2' title='text'>2 stars</label>
    <input type='radio' id='star1' name='rate' value='1' />
    <label for='star1' title='text'>1 star</label>
    </div>
  </div>
  <br><br>   
  <div class='row'>    
      <input class="btn btn-light" type='submit' name='save' value='Submit'>    
    </div>    
  </form>    
</div>    
    </center>

</body>    
</html>

