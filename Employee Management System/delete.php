<?php
require_once("Include/DB.php");
$SearchQueryParameter = $_GET["id"];
if(isset($_POST["Submit"]))
{
    $EName = $_POST["EName"];
    $SSN = $_POST["SSN"];
    $Dept = $_POST["Dept"];
    $Salary = $_POST["Salary"];
    $HomeAddress = $_POST["HomeAddress"];
    global $ConnectingDB;
    $sql = "DELETE FROM emp_record WHERE id = '$SearchQueryParameter';";
    $execute = $ConnectingDB->query($sql);
    if ($execute)
    {
      echo '<script>window.open("view_from_databse.php?id=Record Deleted Successfully","_self")</script>';
    }


}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UPDATE</title>
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
    <?php
    $ConnectingDB;
    $sql = "SELECT * FROM emp_record WHERE id = '$SearchQueryParameter'";
    $stmt = $ConnectingDB->query($sql);
    while($set = $stmt->fetch_assoc())
    {
      $EID = $set['id'];
      $Ename = $set['ename'];
      $ESSN = $set['ssn'];
      $EDept = $set['dept'];
      $ESalary = $set['salary'];
      $EHomeAddress = $set['homeaddress'];
    }?>
    <div class="container">

    <div class="jumbotron">
      <h2 align="center" style="font-family:monospace;">DELETE</h2>
      </div>
      <div class="cc">
        <form action = "delete.php?id=<?php echo $SearchQueryParameter; ?>" method = "POST">
          <br>
          Employee Name : <input type="text" name="EName" value="<?php echo $Ename;?>"><br><br>
          Social Security Number : <input type="text" name="SSN" value="<?php echo $ESSN;?>"><br><br>
          Department : <input type="text" name="Dept" value="<?php echo $EDept;?>"><br><br>
          Salary : <input type="text" name="Salary" value="<?php echo $ESalary;?>"><br><br>
          Home Address : <textarea name="HomeAddress" rows="8" cols="80" value="<?php echo $EHomeAddress;?>"></textarea><br><br>
          <span id = "button"><input type="submit" name="Submit" value="DELETE"><br></span>
        </form>
      </div>
    </div>
  </body>
</html>
