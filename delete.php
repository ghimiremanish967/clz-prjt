<?php
   $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "inventory";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
include 'a1.php';

$id = $_GET['id'];

$q = " DELETE FROM `items` WHERE `items`.`sno` =$id";

mysqli_query($conn, $q);
 

?>