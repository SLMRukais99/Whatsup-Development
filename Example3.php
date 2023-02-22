<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname  = "myDB01";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
echo "connected successfully";

//creating table
$sql = "create table student(id int(5) auto_increment primary key, firstName varchar(30) not null,email varchar(50))";

if($conn->query($sql) === true){
  echo "<br>Table student created succesfully";
}
else{
   echo "<br>Error creating table".$conn->error;
}
mysqli_close($conn);
?>