<?php
require_once("Include/DB.php");
if(isset($_POST["Submit"]))
{
  if(!empty($_POST["EName"])&&!empty($_POST["SSN"]))
  {
    $EName = $_POST["EName"];
    $SSN = $_POST["SSN"];
    $Dept = $_POST["Dept"];
    $Salary = $_POST["Salary"];
    $HomeAddress = $_POST["HomeAddress"];
    global $ConnectingDB;
    $sql = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)VALUES('$EName','$SSN','$Dept','$Salary','$HomeAddress')";
    $stmt = $ConnectingDB->prepare($sql);
    if ($ConnectingDB->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $ConnectingDB->error;
    }

  }
else {
  echo "Please Enter Details Properly";
     }
}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>INCLUDE</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <style>
    .cc
    {
      border:2px solid black;
      border-collapse: separate;
      border-spacing: 15px;
      margin:0;
      padding:0;
      text-align:justify;
    }
    #button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: red;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }

  </style>
  <body>
    <div class="container">

    <div class="jumbotron">
      <h2 align="center" style="font-family:monospace;">Employee Registration</h2>
      </div>
      <div class="cc">
        <form action = "insert_into_database.php" method = "POST">
          <br>
          Employee Name : <input type="text" name="EName" placeholder="Enter Employee Name"><br><br>
          Social Security Number : <input type="text" name="SSN" placeholder="Enter SSN"><br><br>
          Department : <input type="text" name="Dept" placeholder="Enter Department"><br><br>
          Salary : <input type="text" name="Salary" placeholder="Enter Salary"><br><br>
          Home Address : <textarea name="HomeAddress" rows="8" cols="80"></textarea><br><br>
          <span id = "button"><input type="submit" name="Submit" value="SUBMIT"><br></span>
        </form>
      </div>
    </div>
  </body>
</html>
