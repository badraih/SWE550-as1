<?php

if (!empty($_GET['act'])) {

getenv('MYSQL_DBHOST') ? $db_host=getenv('MYSQL_DBHOST') : $db_host="localhost";
getenv('MYSQL_DBPORT') ? $db_port=getenv('MYSQL_DBPORT') : $db_port="3306";
getenv('MYSQL_DBUSER') ? $db_user=getenv('MYSQL_DBUSER') : $db_user="root";
getenv('MYSQL_DBPASS') ? $db_pass=getenv('MYSQL_DBPASS') : $db_pass="secret";
getenv('MYSQL_DBNAME') ? $db_name=getenv('MYSQL_DBNAME') : $db_name="db";

if (strlen( $db_name ) === 0)
  $conn = new mysqli("$db_host:$db_port", $db_user, $db_pass);
else
  $conn = new mysqli("$db_host:$db_port", $db_user, $db_pass, $db_name);


if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$query = "SELECT * FROM names ";
$result = mysqli_query($conn, $query);
$x = 0;
while($row = mysqli_fetch_row( $result )){
 echo $row[0]."<br />";
}
//$result -> free_result();
$conn->close();


}

?>