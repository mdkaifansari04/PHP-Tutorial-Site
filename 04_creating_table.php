<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "demo4";
$table = "emp";

$conn = mysqli_connect($server, $username, $password, $database);



// $sql = "CREATE TABLE `emp3` (
// `emp_id` INT NOT NULL  AUTO_INCREMENT,
// `name` VARCHAR(12) NOT NULL , 
// `work` VARCHAR(12) NOT NULL ,
// `salary` INT NOT NULL,
// PRIMARY KEY (`emp_id`)
// )";

// $result = mysqli_query($conn, $sql);

$sql = "INSERT INTO `emp`
(`name`, `work`, `salary`)
VALUES 
('Some', 'Developer', 12000)
";

$result = mysqli_query($conn, $sql);

$sql_findAll = 'SELECT * FROM `emp`';
if ($result) {
  echo "Values inserted successfully<br><br>";
  $values = mysqli_query($conn, $sql_findAll);
  echo "All values" . var_dump($values);
} else {
  die("Values not inserted successfully : " . mysqli_error($conn));
}

?>