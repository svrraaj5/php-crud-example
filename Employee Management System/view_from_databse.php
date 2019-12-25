<?php
require_once('Include/DB.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>VIEW FROM DATABASE</title>
  </head>

  <body>
    <div class="container">
    <h2 align="center" style="font-family:monospace;">VIEW FROM DATABASE</h2><br><br>
    <fieldset>
      <form action="view_from_databse.php" method="GET">
        <input type="text" name="search" placeholder="Search by Name and SSN">
        <input type="submit" name="searchbutton" value="Search Record">

      </form>
    </fieldset>
    <?php
    if(isset($_GET['searchbutton']))
    {
    $ConnectingDB;
    $search = $_GET['search'];
    $sql = "SELECT * FROM emp_record WHERE ename = '$search' OR ssn = '$search'";
    $stmt = $ConnectingDB->query($sql);
    while($set = $stmt->fetch_assoc())
    {
      $ID = $set['id'];
      $name = $set['ename'];
      $SSN = $set['ssn'];
      $Dept = $set['dept'];
      $Salary = $set['salary'];
      $HomeAddress = $set['homeaddress'];
    ?>
    <div class="mytab">
      <table style="width:100%" border="3" align = "center">
        <caption>RESULT</caption>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>SSN</th>
          <th>DEPARTMENT</th>
          <th>SALARY</th>
          <th>ADDRESS</th>
          <th>SEARCH AGAIN</th>
        </tr>

      <tr>
        <td><?php echo $ID ?></td>
        <td><?php echo $name?></td>
        <td><?php echo $SSN?></td>
        <td><?php echo $Dept?></td>
        <td><?php echo $Salary?></td>
        <td><?php echo $HomeAddress?></td>
        <td><a href = "view_from_databse.php">SEARCH</td>
      </tr>
    </table>
    </div>

    <?php } ?>
  <?php } ?>

    <h3><?php echo @$_GET['id']; ?></h3>
    <table width = "1000" border="3" align = "center">
      <th>ID</th>
      <th>NAME</th>
      <th>SSN</th>
      <th>DEPARTMENT</th>
      <th>SALARY</th>
      <th>ADDRESS</th>
      <th>UPDATE</th>
      <th>DELETE</th><br>
      <?php
      $sql = "SELECT * FROM emp_record";
      $stmt = $ConnectingDB->query($sql);
      while($set = $stmt->fetch_assoc())
      {
        $EID = $set['id'];
        $Ename = $set['ename'];
        $ESSN = $set['ssn'];
        $EDept = $set['dept'];
        $ESalary = $set['salary'];
        $EHomeAddress = $set['homeaddress'];
       ?>
       <tr>
         <td><?php echo $EID ?></td>
         <td><?php echo $Ename?></td>
         <td><?php echo $ESSN?></td>
         <td><?php echo $EDept?></td>
         <td><?php echo $ESalary?></td>
         <td><?php echo $EHomeAddress?></td>
         <td><a href = "update.php?id=<?php echo $EID ?>">Update</a></td>
         <td><a href = "delete.php?id=<?php echo $EID ?>">Delete</a></td>

       </tr>

     <?php } ?>
    </table>
  </div>
  </body>
</html>
