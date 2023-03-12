<?php

include 'conn.php';


//insert data into database

$id=$_GET['updateid'];
$sql="SELECT * FROM `voter` WHERE id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

    
    $VNAME=$row['vname'];
    $GENDER=$row['gender'];
    $AGE=$row['age'];
    $CITY=$row['city'];
    $PET=$row['pet_name'];



if($_SERVER["REQUEST_METHOD"] == "POST"){

  $VNAME=$_POST['vname'];
  $GENDER=$_POST['gender'];
  $AGE=$_POST['age'];
  $CITY=$_POST['city'];
  $PET=$_POST['pet'];

  if ($VNAME!="" && $GENDER!="" && $AGE!="" && $CITY!="" && $PET!="") {

    $sql = "UPDATE `voter` SET id=$id, vname='$VNAME',gender='$GENDER',age='$AGE', city='$CITY' , pet_name='$PET' WHERE id=$id";
    
        $result = mysqli_query($conn,$sql);  

        if($result){
            header('location:addvoter.php');
        }



    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include "link_meta.php";?>
    
<title>UPDATE</title>
</head>
<body>

<div class="container">
<a href="addvoter.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-arrow-left"></i></button>
</a>
<a href="welcome.php">
<button type="button" class="btn btn-primary my-4"><i class="bi bi-house-fill"></i></button>
</a>
</div>

<form class="container"  method="post">


<div class="mb-3 my-4">
    <label for="vname" class="form-label">Name</label>
    <input type="text" class="form-control" id="vname" name="vname" aria-describedby="emailHelp"  value="<?php echo $VNAME ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="gender" class="form-label">Gender</label>
    <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp"  value="<?php echo $GENDER ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="age" class="form-label">Age</label>
    <input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp"  value="<?php echo $AGE ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"  value="<?php echo $CITY ?>">
    
  </div>
  <div class="mb-3 my-4">
    <label for="pet" class="form-label">Pet Name</label>
    <input type="text" class="form-control" id="pet" name="pet" aria-describedby="emailHelp" value="<?php echo $PET ?>">
    
  </div>

  
  
  
  <input type="submit" class="btn btn-primary" value="Update">
</form>
</body>
</html>