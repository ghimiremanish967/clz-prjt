<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Itemname = $_POST['Itemname'];
        $Noofitem = $_POST['Itemnumber'];
        $Typeofitem= $_POST['Itemtype'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "inventory";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `items` ( `Itemname`, `Noofitem`, `Typeofitem`, `date`) VALUES ('$Itemname ', '$Noofitem ', ' $Typeofitem', 'current_timestamp()');";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }

    
?>






<form class="form-horizontal" action='a1.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group"  >
       
      <label class="control-label"  for="Itemname">Itemname</label>
      <div class="controls">
        <input type="text" id="Itemname" name="Itemname" placeholder="" class="input-xlarge">
        <p class="help-block">Please insert the name of cloth item here</p>
      </div>
    </div>
 
    <div class="control-group"  >
       
      <label class="control-label" for="">Itemnumber</label>
      <div class="controls">
        <input type="number" id="Itemnumber" name="Itemnumber" placeholder="" class="input-xlarge">
        <p class="help-block">Please write the numbe`r of items</p>
      </div>
     <div  >
      <select  id="Itemtype" name="Itemtype"class="control-group" >
  <option selected>Select the type of cloth</option>
  <option value="summerwear">summerwear</option>
  <option value="winterwear">winterwear</option>
  <option value="jeans">jeans</option>
  </select>
  </div>
    </div>
 
     
 
     
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Add item</button>
      </div>
    </div>
  </fieldset>
</form>
<table class="table">
  <thead>
    <tr>
        <th scope="col">sno</th>
      <th scope="col">Itemname</th>
      <th scope="col">Noofitem</th>
      <th scope="col">Typeofitem</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <tbody>

   <?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "inventory";          

          $conn = mysqli_connect($servername, $username, $password, $database);
          $sql = "SELECT * FROM `items`";
          $result = mysqli_query($conn, $sql);
           
          while($res = mysqli_fetch_array($result)){
             ?>
             echo "<tr>
             <td><?php echo $res['sno'];?></td>
            <td><?php echo $res['Itemname'];?></td>
            <td><?php echo $res['Noofitem'];?></td>
            <td><?php echo $res['Typeofitem'];?></td>
            <td><?php echo $res['date'];?></td>
            <td><button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['sno']; ?>" class="text-white"> Delete </a>  </button>   <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['sno']; ?>" class="text-white"> Update </a> </button>   </td>
             </tr>";
              <?php 
            }
          ?>
 
  </tbody>
</table>