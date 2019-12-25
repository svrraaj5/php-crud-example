<!-- Create a Database : employee
Table : emp_record
SQL : CREATE TABLE `record`.`emp_record` ( `id` INT(20) NOT NULL AUTO_INCREMENT ,
 `ename` INT(60) NOT NULL , `ssn` INT(20) NOT NULL ,
 `dept` INT(20) NOT NULL , `salary` INT(20) NOT NULL , `homeaddress` INT(70) NOT NULL ,
 PRIMARY KEY (`id`)) ENGINE = InnoDB;-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "record";

// Create connection
$ConnectingDB = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($ConnectingDB->connect_error) {
    die("Connection failed: " . $ConnectingDB->connect_error);
}
?>
