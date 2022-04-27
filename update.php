<?php

 include 'a1.php';
$servername = "localhost";
      $username = "root";
      $password = "";
      $database = "inventory";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);

 if(isset($_POST['done'])){

 $id = $_GET['id'];
       $Itemname = $_POST['Itemname'];
        $Noofitem = $_POST['Itemnumber'];
        $Typeofitem= $_POST['Itemtype'];
 $q = " update crudtable set sno=$id, username='$username', password='$password' where id=$id  ";

 $query = mysqli_query($conn,$q);

 header('location:a1.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>
 <?php
    echo "you are editing $id";
  ?>
 <label> Itemname: </label>
 <input type="text" name="Itemname" class="form-control"> <br>

 <label> Itemnumber: </label>
 <input type="text" name="Itemnumber" class="form-control"> <br>

 <label>Itemtype: </label>
 <input type="text" name="Itemtype " class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>